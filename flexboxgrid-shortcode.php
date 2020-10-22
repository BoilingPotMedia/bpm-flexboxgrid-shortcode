<?php
/*
Plugin Name: FlexBox Grid Shortcode
Description: Use FlexBox Grid (flexboxgrid.com) in WordPress content areas.
Author: Boiling Pot Media
Version: 2.0
License: 
*/


/* FlexBoxGrid_Classes_Helper
 */	   
function FlexBoxGrid_Classes_Helper( $atts ){
	/* start class output with col every time */
	$classes = 'col ';		
	/* foreach arg */
	foreach ($atts as $key => $value ):
		/* if key string lenght is two, we have a col width */
		if ( strlen($key) == 2 && $value != NULL ):				
			/* add the col width class */
			$classes .= 'col-'.$key.'-'.$value.' ';	
		/* if key string lenght is nine, we have a col offset */
		elseif ( strlen($key) == 9 && $value != NULL ):			
			/* add the col offset */
			$classes .= 'col-'.$key.'-'.$value.' ';					
		/* if key string lenght neither two or nine (other), we have a class */				
		elseif( $value != NULL ):
			/* add the class - could be 'class' or 'reorder' */	
			if( $key == 'class' || $key == 'reorder' ):
				$classes .= $value.' ';
			endif;
		endif;			
	endforeach;  		
	return $classes;
}


class FlexBoxGrid {


    public function __construct( $uri = false ){
    	$this->FlexBoxGrid_Shortcodes();
    }


    public function FlexBoxGrid_Shortcodes(){
        add_shortcode('row', array( $this, 'FlexBoxGrid_Row_Shortcode'));    
        add_shortcode('col', array( $this, 'FlexBoxGrid_Column_Shortcode'));    
    }


 	/* FlexBoxGrid_Classes_Constructor
	 */	   
    public function FlexBoxGrid_Classes_Constructor( $atts ){
		return FlexBoxGrid_Classes_Helper($atts);
    }


 	/* FlexBoxGrid_Row_Shortcode
	 *
	 * [row &params ]
	 *
	 * @ class			- (optional) 
	 * @ halign			- (optional) start-[col], center-[col], end-[col]
	 * @ valign			- (optional) top-[col], middle-[col], bottom-[col] 
	 * @ distribute		- (optional) around-[col], between-[col] 
	 * @ reverse		- (optional) reverse	
	 */	   
    public function FlexBoxGrid_Row_Shortcode( $atts, $content = NULL ){
		
		/* shortcode attributes */		
		$atts = shortcode_atts( array(
			'class'			=> NULL,
			'halign'		=> NULL, // 
			'valign'		=> NULL, // 
			'distribute'	=> NULL, // 
			'reverse'		=> NULL, // 	
		), $atts );

		/* set variables */
		$classes  = $atts['class'] ?? '';
		$classes .= $atts['halign'] ?? '';
		$classes .= $atts['valign'] ?? '';
		$classes .= $atts['distribute'] ?? '';

		/* begin output bufffer */					
		ob_start();	?>		    
		<div class="row <?php echo $classes; ?>"><?php echo do_shortcode($content); ?></div>
		<?php return ob_get_clean(); ?>
	<?php
	}

	
 	/* FlexBoxGrid_Column_Shortcode
	 *
	 * [col &params ]
	 *
	 * @ class		- (optional) any custom CSS class
	 * @ xs			- (optional) such as: xs="12"
	 * @ sm			- (optional) such as: sm="6"
	 * @ md			- (optional) such as: md="4"
	 * @ lg			- (optional) such as: lg="3"
	 * @ xs-offset	- (optional) such as: xs-offset="1"
	 * @ sm-offset	- (optional) such as: sm-offset="3"
	 * @ md-offset	- (optional) such as: md-offset="4"
	 * @ lg-offset	- (optional) such as: lg-offset="6"
	 * @ reorder	- (optional) first-[col] or last-[col]
	 */	   
    public function FlexBoxGrid_Column_Shortcode( $atts, $content = NULL ){
		
		/* shortcode attributes */		
		$atts = shortcode_atts( array(
			'class'		=> NULL,
			'xs'		=> NULL,
			'sm'		=> NULL,
			'md'		=> NULL,
			'lg'		=> NULL,	
			'xs-offset'	=> NULL,
			'sm-offset'	=> NULL,
			'md-offset'	=> NULL,
			'lg-offset'	=> NULL,
			'reorder'	=> NULL, 			
		), $atts );

		/* set variables */
		$classes = $this->FlexBoxGrid_Classes_Constructor($atts);

		/* begin output bufffer */					
		ob_start();	?>
		<div class="<?php echo $classes; ?>">
			<div class="box">
				<?php echo do_shortcode($content); ?>
			</div>
		</div>		 
		<?php return ob_get_clean(); ?>
	<?php
	}
}


new FlexBoxGrid();
?>