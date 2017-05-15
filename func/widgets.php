<?php

function bst_widgets_init() {

  	/*
    Sidebar (one widget area)
     */
    register_sidebar( array(
        'name' => __( 'Sidebar Frontpage', 'bst' ),
        'id' => 'sidebar-widget-area',
        'description' => __( 'Página principal', 'bst' ),
        'before_widget' => '<section class="%1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

   register_sidebar( array(
        'name' => __( 'Sidebar Internal', 'bst' ),
        'id' => 'sidebar-widget-area-internal',
        'description' => __( 'En las páginas interiores', 'bst' ),
        'before_widget' => '<section class="%1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

  	/*
    Footer (three widget areas)
     */
    register_sidebar( array(
        'name' => __( 'Footer Col 1', 'bst' ),
        'id' => 'footer-widget-area-1',
        'description' => __( 'The footer widget area 1', 'bst' ),
        'before_widget' => '<div class="%1$s %2$s col-sm-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

        /*
    Footer (three widget areas)
     */
    register_sidebar( array(
        'name' => __( 'Footer Col 2', 'bst' ),
        'id' => 'footer-widget-area-2',
        'description' => __( 'The footer widget area 2', 'bst' ),
        'before_widget' => '<div class="%1$s %2$s col-sm-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );


    /*
    Footer (three widget areas)
     */
    register_sidebar( array(
        'name' => __( 'Footer Col 3 ', 'bst' ),
        'id' => 'footer-widget-area-3',
        'description' => __( 'Datos de la asamblea', 'bst' ),
        'before_widget' => '<div class="%1$s %2$s col-sm-4">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer">',
        'after_title' => '</h3>',
    ) );


}
add_action( 'widgets_init', 'bst_widgets_init' );

?>