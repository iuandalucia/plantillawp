<?php
/*
All the functions are in the PHP pages in the func/ folder.
*/

require_once locate_template('/func/cleanup.php');
require_once locate_template('/func/setup.php');
require_once locate_template('/func/enqueues.php');
require_once locate_template('/func/navbar.php');
require_once locate_template('/func/widgets.php');
require_once locate_template('/func/feedback.php');

function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[1][0];

    if(!empty($first_img))
        $first_img = substr_replace(' class="img-responsive" ', $first_img, 4);

    return $first_img;
}

/**
 * Gallery shortcode [gallery ...]
 *
 * Codigo para personalizar la galería de los posts
 * 
 * TODO
 * [] - Add when 'link' => 'post' (and not javasript)
 * [] - Add when 'orderby' => 'rand'
 * 
 *
 * Require:
 *    - bst_gallery_shortcode_template.php
 *    - bst_gallery_shortcode_onecolumn_template.php
 *    - Magnific popup javascript (http://dimsemenov.com/plugins/magnific-popup/)
 */
function bst_gallery_shortcode($attr) {
    //global $post, $wp_locale;
    static $instance = 0;
    static $js = 0;
    
    $instance++;
        
    $defaults = array(
        'columns' => 4,
        'size' => 'thumbnail',
        'link' => 'file',
        'ids' => '',
        'orderby' => ''
    );
        
    $attr = shortcode_atts($defaults, $attr);
    extract($attr); // extraigo las variables del array
    
    // Comprobamos que el shortcode tiene las ids ed las imagenes,
    // si no la tuviera habría que coger todas las imagens adjuntas al artículo
    if(!empty($ids)) { 
        $ids = explode(',', $ids); // extraigo los ids de las imagenes
    }
    
    $images = _bst_gallery_shortcode_get_images($ids);

    $selector = "gallery-{$instance}";
        
    ob_start();
    if($columns>1) {
        // Javascript
        if(!$js) {
            wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/js/magnific-popup/magnific-popup.css' );
            wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/magnific-popup/jquery.magnific-popup.min.js', null, '0.8.8', true);
            add_action('wp_footer', '_bst_gallery_shortcode_js', 55);
            $js++;
        }
        
        include(get_template_directory().'/parts/bst_gallery_shortcode_template.php');
    } else
        include(get_template_directory().'/parts/bst_gallery_shortcode_onecolumn_template.php');
    
    $output = ob_get_clean();
    
    return $output;
}

function _bst_gallery_shortcode_get_images($ids = '') {
    global $post;
    
    // Comprobamos que el shortcode tiene las ids ed las imagenes,
    // si no la tuviera habría que coger todas las imagens adjuntas al artículo
    if(empty($ids)) {
        // Busco todas las imagenes adjuntas al post
        $attachments = get_children(array(
                            'post_parent' => $post->ID, 
                            'post_status' => 'inherit', 
                            'post_type' => 'attachment', 
                            'post_mime_type' => 'image') 
                    );
    
        if (!empty($attachments)) {
            $ids = array();
            foreach ( $attachments as $id => $attachment ) {
                $ids[] = $id;
            }
        }
    } // end if empty $ids
    
    $image_sizes = get_intermediate_image_sizes(); // Obtengo todos los tamanyos disponibles de imagenes
    
    $images = array();
    foreach($ids as $id) {
        $image = array (
            'id' => $id,
            'alt' => get_post_meta($id,'_wp_attachment_image_alt', true),
            'src_full' => wp_get_attachment_image_src($id, 'full')
        );
        
        foreach($image_sizes as $sizes)
            $image['src_'.$sizes] = wp_get_attachment_image_src($id, $sizes);
        
        $images[] = $image;
    }
    
    return $images;
}

function _bst_gallery_shortcode_js() {
    global $instance;
    echo "<script type=\"text/javascript\">$('.gallery').magnificPopup({
          delegate: 'a', // child items selector, by clicking on it popup will open
          type: 'image',
          fixedContentPos: true, // fix problem of gallery with android
          gallery: {
            enabled: true, // set to true to enable gallery
            preload: [0,2], // read about this option in next Lazy-loading section
            navigateByImgClick: true,
            arrowMarkup: '<button title=\"%title%\" type=\"button\" class=\"mfp-arrow mfp-arrow-%dir%\"></button>', // markup of an arrow button
            tCounter: '' // markup of counter
        },
        image: {
            titleSrc: 'title' // options for image content type
        }
    });</script>";
}


remove_shortcode('gallery');
add_shortcode('gallery', 'bst_gallery_shortcode');

/** END GALLERY SHORTCODE **/



?>
