<aside class="sidebar col-md-12">
 <?php if(is_single() ) { ?>

  <?php if ( has_post_thumbnail()) {
   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
   echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
   echo get_the_post_thumbnail($post->ID, array(292,200), array('class'=> 'img-responsive')); 
   echo '</a>'; 
} ?>
  <div class="post tags"><?php the_tags('<p><i class="fa fa-tags"></i> Etiquetas:</p>',' • ',''); ?></div>
  
  <?php dynamic_sidebar('sidebar-widget-area-internal'); ?>

<?php } elseif(is_page()||is_category()||is_tag()||is_search()) { ?>
	
  <?php dynamic_sidebar('sidebar-widget-area-internal'); ?>

<?php } ; ?>


</aside>
