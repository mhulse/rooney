<?php if (is_home() && current_user_can('publish_posts')): ?>
	
	<p><?=sprintf('Ready to publish your first post? <a href="%1$s">Get started here</a>.', admin_url('post-new.php'))?></p>
	
<?php elseif (is_search()): ?>
	
	<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
	
<?php else: ?>
	
	<p class="warn x3">Nuthin' here. Check back later.</p>
	
<?php endif; ?>
