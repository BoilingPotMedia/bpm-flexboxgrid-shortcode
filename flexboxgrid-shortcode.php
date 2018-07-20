<?php
/*
Plugin Name: FlexBox Grid Shortcode
Description:
Author: 
Version: 1.0
License: 
*/

	//add_action('wp_footer', 'bpm_site_funk');
	function bpm_site_funk() {
		if( !is_admin()){ 
			wp_enqueue_style('bpm-site-function-css', plugin_dir_url(__FILE__) . 'css/bpm-site-function.css');
		}
	}	

	//add_action('wp_footer', 'bpm_site_scripts');
	function bpm_site_scripts() {
		if( !is_admin()){ 
			wp_enqueue_script('bpm-site-function-js', plugin_dir_url(__FILE__) . 'js/bpm-site-function.js', array('jquery'), '', true );
		}
	}

	// Shortcodes
	require plugin_dir_path( __FILE__ ) . 'shortcodes/typography_shortcodes.php';



	add_shortcode( 'row', 'bpm_flexbox_row_shortcode' );
	function bpm_flexbox_row_shortcode($atts, $content = null) {

		$a = shortcode_atts( array( 
			'class' => '',
			'halign' => '', // .start- , .center- , .end-
			'valign' => '', // .top- , .middle- , .bottom- 
			'distribute' => '', // .around- , .between- 
			'reverse' => '', // .reverse
		), $atts );
		
		// Class
		$classes='';

		if ( isset($atts['class']) && $atts['class'] != '') {
			$classes .= $atts['class'];
		}
	
		return '<div class="row '.$classes.'">'.do_shortcode($content).'</div>';

	}

	add_shortcode( 'col', 'bpm_flexbox_col_shortcode' );
	function bpm_flexbox_col_shortcode($atts, $content = null) {

		$a = shortcode_atts( array(
			'class' => '',
			'xs' => '',
			'sm' => '',
			'md' => '',
			'lg' => '',	
			'xs-offset' => '',
			'sm-offset' => '',
			'md-offset' => '',
			'lg-offset' => '',
			'reorder' => '', // .first- , .last-		
		), $atts );
		
		// Class
		$classes = 'col ';
	
		foreach ($atts as $key => $value ){	
			if ( strlen($key) == 2 ){
				$classes .= 'col-'.$key.'-'.$value.' ';	
			} elseif ( strlen($key) == 9 ){
				$classes .= 'col-'.$key.'-offset-'.$value.' ';	
			} else {
				if ( $key == 'class' ){
					$classes .= ' '.$value;	
				}
			}
		}
		return '
		<div class="'.$classes.'">
			<div class="box">
				'.do_shortcode($content).'
			</div>
		</div>';

	}


































?>