<?php while (have_posts()): ?>
	
	<?=the_post()?>
	
	 <?=get_template_part('includes/content', get_post_format())?>
	
	<?php if (($wp_query->current_post + 1) != $wp_query->post_count): ?>
		
		<hr>
		
	<?php endif; ?>
	
<?php endwhile; ?>
