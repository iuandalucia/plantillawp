<!DOCTYPE html>
<html>
<head>
	<title><?php is_front_page() ? bloginfo('name') : wp_title('•', true, ''); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
	You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->

<!-- HEADER -->
<header class="container iu-header">
  <div class="row">
    <div class="col-md-12" >
     <?php if ( 'blank' != get_header_textcolor() ) : ?>
      <div class="iutitle"> <h1> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> </h1> <span class="iudes"> <?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?> </span> </div>
    <?php endif; ?>
    <?php if ( get_header_image() ) : ?>
     <a class="hidden-xs navbar-brand-image" itemprop="headline" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
      <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
     </a>
    <?php else: ?>
         <a class="navbar-brand" itemprop="headline" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    <?php endif; ?>
    </div>
  </div>
</header>

<nav class="iuand  navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <?php
          $args = array(
            'theme_location' => 'top-bar',
            'depth' => 0,
            'container'	=> false,
            'fallback_cb' => false,
            'menu_class' => 'nav navbar-nav',
            'walker' => new BootstrapNavMenuWalker()
          );
          wp_nav_menu($args);
      ?>
	  </div><!-- /.navbar-collapse -->
      <ul class="iusocial">
      <span class="text"> Síguenos: </span>
     <a href="https://twitter.com/">   <i class="fa fa-twitter"></i> </a>
      <a href="https://www.facebook.com/">     <i class="fa fa-facebook"></i> </a>
       <a href="https://www.youtube.com/">    <i class="fa fa-youtube"></i>  </a>
       <a href="<?php bloginfo('rss2_url'); ?>">  <i class="fa fa-rss"></i>  </a>
      </ul>
  </div>
</nav>


</div>
