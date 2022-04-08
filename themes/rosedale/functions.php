<?php

/**
 * @author Divi Space
 * @copyright 2022
 */

if ( ! defined('ABSPATH') ) {
	die();
}

add_action('wp_enqueue_scripts', 'ds_ct_enqueue_parent');

function ds_ct_enqueue_parent() {
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style( 'slick-styles', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array());
  wp_enqueue_style( 'animate-styles', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array());
  wp_enqueue_style( 'slick-theme-styles', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', array());

  wp_enqueue_script( 'slick-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array());


  wp_enqueue_script( 'fontawesome-script', 'https://kit.fontawesome.com/11031dbfde.js', '1', true );
}

add_action('wp_enqueue_scripts', 'ds_ct_loadjs');

function ds_ct_loadjs() {
	wp_enqueue_script('ds-theme-script', get_stylesheet_directory_uri() . '/ds-script.js', array('jquery'));
}


function hero_text( $atts )
{

	$a = shortcode_atts( array(
    'word' => '',
  ), $atts );

  $h3 = 'The Future of the Trades Starts with You';
  $h2 = 'Find your <div class="animate__animated animate__zoomIn animate__delay-1s">'.$a['word'].'</div> at Rosedale';

  $b1 = '<a href="#" class="btn btn--blue">Apply to Rosedale Today</a>';
  $b2 = '<a href="#" class="btn btn--green">Explore a Career in the Trades</a>';

  $ret .= '<div class="hero--front__inner">';
    $ret .= '<h3>'.$h3.'</h3>';
    $ret .= '<h2>'.$h2.'</h2>';
    $ret .= '<div class="hero--front__buttons">';
      $ret .= $b1 . $b2;
    $ret .= '</div>';
  $ret .= '</div>';

  return $ret;
}

add_shortcode('hero_text', 'hero_text');
