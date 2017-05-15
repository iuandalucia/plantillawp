<!-- <hr /> -->
<?php
$is = 0;
$grid = intval(12/$columns);
$offset = '';
if(12%$columns != 0)
    $offset = 'col-md-offset-1';
?>
<div class="gallery rows <?php echo $selector; ?>">
<?php foreach ( $images as $image ):
    $is++
?>
    <div class="col-xs-6 col-md-<?= $grid; ?> <?= ($is==1? $offset: ''); ?>">
		<a href="<?php echo $image['src_full'][0]; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>" class="thumbnail">
			<?php echo wp_get_attachment_image($image['id'], $size); ?>
		</a>
    </div>
<?php endforeach; ?>
</div>
