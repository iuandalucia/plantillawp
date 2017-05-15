<div class="gallery row <?php echo $selector; ?>">
<?php foreach ( $images as $image ): ?>
		<div class="col-md-12 gallery-content <?php ($image[2]>$image[1]? ' vertical-photo': ''); ?>">
			<?php echo wp_get_attachment_image($image['id'], 'large'); ?><br/>
			<p><?php echo $image['alt']; ?></p>
		</div>
<?php endforeach; ?>
</div>