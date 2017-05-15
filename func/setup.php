<?php

function bst_setup() {
  add_editor_style('css/editor-style.css');
  add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 265, 185);
  update_option('medium_size_w', 470);
  update_option('large_size_w', 970);
//tamaño fotos portada de iuandalucia.org
  add_image_size( 'frontpage-thumb', 265 , 185, true ); 

  // Custom Header
  $header_args = array(
    'uploads'       => true,
    'default-text-color' => '#fff',
    'header-text'   => true
  );
  add_theme_support( 'custom-header', $header_args);

}
add_action('init', 'bst_setup');

if (! isset($content_width))
	$content_width = 600;

function bst_search_form( $form ) {
    $form = '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="form-group">
		    <input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" />
    </div>
		<button type="submit" id="searchsubmit" value="'. esc_attr__('Buscar') .'" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Buscar</button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'bst_search_form' );

function bst_excerpt_readmore() {
    return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; Sigue leyendo <i class="glyphicon glyphicon-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'bst_excerpt_readmore');

?>
