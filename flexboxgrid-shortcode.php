<?php
/*
Plugin Name: FlexBox Grid Shortcode
Description:
Author: 
Version: 1.0
License: 
*/


	add_shortcode( 'row', 'bpm_flexbox_row_shortcode' );
	function bpm_flexbox_row_shortcode($atts, $content = null) {

		/**
		 * OPTIONAL MODULE STYLE
		 *
		 */
		if ( !defined('bpm___flexboxgrid_shortcode_row_style___defined') ){
			function bpm___flexboxgrid_shortcode_row_style(){
				echo'
				<style>
						.row.middle-xs .box,
						.row.middle-sm .box {
							text-align: center;
						}						
					@media only screen and (min-width: 48rem) { /* Styles that apply to COL-XS */ }
					@media only screen and (min-width: 64rem) { /* Styles that apply to COL-SM */ }
					@media only screen and (min-width: 80rem) { /* Styles that apply to COL-LG */ }
				</style>';
			}	
			add_action( 'wp_footer', 'bpm___flexboxgrid_shortcode_row_style', 50 );	
			define('bpm___flexboxgrid_shortcode_row_style___defined', TRUE);
		}	
		
		
		$a = shortcode_atts( array( 
			'class' => '',
			'halign' => '', 	// .start- , .center- , .end-
			'valign' => '', 	// .top- , .middle- , .bottom- 
			'distribute' => '', // .around- , .between- 
			'reverse' => '', 	// .reverse
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

		
		/**
		 * OPTIONAL MODULE STYLE
		 *
		 */
		if ( !defined('bpm___flexboxgrid_shortcode_col_style___defined') ){
			function bpm___flexboxgrid_shortcode_col_style(){
				echo'
				<style>					
					@media only screen and (min-width: 48rem) { /* Styles that apply to COL-XS */ }
					@media only screen and (min-width: 64rem) { /* Styles that apply to COL-SM */ }
					@media only screen and (min-width: 80rem) { /* Styles that apply to COL-LG */ }
				</style>';
			}	
			add_action( 'wp_footer', 'bpm___flexboxgrid_shortcode_col_style', 50 );	
			define('bpm___flexboxgrid_shortcode_col_style___defined', TRUE);
		}	


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
					$classes .= $value.' ';	
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