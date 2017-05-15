<?php
 
// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
  die ('Por favor no cargues está página directamente.'); }
if ( post_password_required() ) { ?>
  <div class="alert alert-warning">
    <?php _e('Este artículo está protegido con contraseña.', 'bst'); ?>
  </div>
<?php
  return; 
}
// End do not delete section
 
if (have_comments()) : ?>

<h3>Comentarios</h3>
<p class="text-muted" style="margin-bottom: 20px;">
 <i class="glyphicon glyphicon-comment"></i>&nbsp; Comentarios: <?php comments_number('Ninguno', '1', '%'); ?>
</p>
  
<ol class="commentlist">
  <?php wp_list_comments('type=comment&callback=bst_comment');?>
</ol>

<ul class="pagination">
  <li class="older"><?php previous_comments_link() ?></li>
  <li class="newer"><?php next_comments_link() ?></li>
</ul>

<?php
  else :
	  if (comments_open()) :
  echo"<p class='alert alert-warning'>Sé el primero en escribir un comentario.</p>";
		else :
		//	echo"<p class='alert alert-warning'>Comments are closed for this post.</p>";
		endif;
	endif;
?>

<?php if (comments_open()) : ?>
<section id="respond">
  <h3><?php comment_form_title(__('Tu respuesta', 'bst'), __('Responder a %s', 'bst')); ?></h3>
  <p><?php cancel_comment_reply_link(); ?></p>
  <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
  <p><?php printf(__('Debes estar <a href="%s">logueado</a> para escribir un comentario.', 'bst'), wp_login_url(get_permalink())); ?></p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if (is_user_logged_in()) : ?>
    <p>
      <?php printf(__('Logueado como <a href="%s/wp-admin/profile.php">%s</a>.', 'bst'), get_option('siteurl'), $user_identity); ?>
      <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Salir de la sesión', 'bst'); ?>"><?php _e('Salir <i class="glyphicon glyphicon-arrow-right"></i>', 'bst'); ?></a>
    </p>
    <?php else : ?>
    <div class="form-group">
      <label for="author"><?php _e('Tu nombre', 'bst'); if ($req) _e(' <span class="text-muted">(obligatorio)</span>', 'bst'); ?></label>
      <input type="text" class="form-control" name="author" id="author" placeholder="Nombre" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
    </div>
    <div class="form-group">
      <label for="email"><?php _e('Email', 'bst'); if ($req) _e(' <span class="text-muted">(required, pero no será publicado)</span>', 'bst'); ?></label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
    </div>
    <div class="form-group">
      <label for="url"><?php _e('Página web <span class="text-muted">Si tienes (no es obligatorio)</span>', 'bst'); ?></label>
      <input type="url" class="form-control" name="url" id="url" placeholder="URL de la página web" value="<?php echo esc_attr($comment_author_url); ?>">
    </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="comment"><?php _e('Comentario', 'roots'); ?></label>
      <textarea name="comment" class="form-control" id="comment" placeholder="Comentario" rows="8" aria-required="true"></textarea>
    </div>
    <p><input name="submit" class="btn btn-default" type="submit" id="submit" value="<?php _e('Enviar comentario', 'bst'); ?>"></p>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; ?>
</section>
<?php endif; ?>
