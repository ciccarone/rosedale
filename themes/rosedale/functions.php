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


function persona_boxes( $atts )
{
	$atts = shortcode_atts(
  array(
      'null' => '',
  ), $atts, 'persona_boxes' );

	$the_query = new WP_Query( array(
	    'post_type' => 'persona',
	) );

	$ret .= '<div class="tabby">';
	while ( $the_query->have_posts() ) :
	    $the_query->the_post();
	    $ret .= '<a class="tabby__item" href="'.get_the_permalink().'">';
				$ret .= '<div class="tabby__inner">';
					$ret .= '<strong>'.get_the_title().'</strong>';
					$ret .= '<i class="fa-solid fa-gear"></i>';
				$ret .= '</div>';
	    $ret .= '</a>';
	endwhile;
	$ret .= '</div>';

	return $ret;
}

add_shortcode('persona_boxes', 'persona_boxes');


function program_cards( $atts )
{
	$atts = shortcode_atts(
  array(
      'null' => '',
  ), $atts, 'program_cards' );

	$the_query = new WP_Query( array(
	    'post_type' => 'program',
	) );

	$ret .= '<div class="program-cards">';
	while ( $the_query->have_posts() ) :
	    $the_query->the_post();
	    $ret .= '<a class="program-cards__item" href="'.get_the_permalink().'" style="background-image:url('.get_the_post_thumbnail_url().')">';
				$ret .= '<div class="program-cards__inner">';
					$ret .= '<strong>'.get_the_title().'</strong>';
				$ret .= '</div>';
	    $ret .= '</a>';
	endwhile;
	$ret .= '</div>';

	return $ret;
}

add_shortcode('program_cards', 'program_cards');


function stat_bubbles_top( $atts )
{
	$atts = shortcode_atts(
  array(
      'null' => '',
  ), $atts, 'stat_bubbles_top' );

	$the_query = new WP_Query( array(
	    'post_type' => 'stat',
			'post__in' => array( 180, 181 )
	) );

	$ret .= '<div class="stat-bubble stat-bubble--top">';
	while ( $the_query->have_posts() ) :
	    $the_query->the_post();
	    $ret .= '<div class="stat-bubble__item">';
				$ret .= '<div class="stat-bubble__inner">';
					$ret .= '<div>'.get_field('prefix').'</div>';
					$ret .= '<div>'.get_field('stat').'</div>';
					$ret .= '<div>'.get_field('suffix').'</div>';
				$ret .= '</div>';
	    $ret .= '</div>';
	endwhile;
	$ret .= '</div>';

	return $ret;
}

add_shortcode('stat_bubbles_top', 'stat_bubbles_top');

function stat_bubbles_bottom( $atts )
{
	$atts = shortcode_atts(
  array(
      'null' => '',
  ), $atts, 'stat_bubbles_bottom' );

	$the_query = new WP_Query( array(
	    'post_type' => 'stat',
			'post__in' => array( 182, 183, 184 )
	) );

	$ret .= '<div class="stat-bubble stat-bubble--bottom">';
	while ( $the_query->have_posts() ) :
	    $the_query->the_post();
	    $ret .= '<div class="stat-bubble__item">';
				$ret .= '<div class="stat-bubble__inner">';
					$ret .= '<div>'.get_field('prefix').'</div>';
					$ret .= '<div>'.get_field('stat').'</div>';
					$ret .= '<div>'.get_field('suffix').'</div>';
				$ret .= '</div>';
	    $ret .= '</div>';
	endwhile;
	$ret .= '</div>';

	return $ret;
}

add_shortcode('stat_bubbles_bottom', 'stat_bubbles_bottom');
