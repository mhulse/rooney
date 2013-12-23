<?=get_header()?>

<?php if (have_posts()): ?>
	
	<?=get_template_part('includes/posts')?>
	
<?php else: ?>
	
	<?=get_template_part('includes/posts', 'none')?>
	
<?php endif; ?>

<?=get_footer()?>
