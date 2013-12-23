<article>
	
	<header>
		
		<?php $category = get_the_category(); ?>
		
		<?php if ( ! empty($category)): ?>
			
			<?php
				
				$category_id = $category[0]->cat_ID;
				$category_name = $category[0]->cat_name;
				
			?>
			
			<h3 class="label"><a href="<?=esc_url(get_category_link($category_id))?>"><?=$category_name?></a></h3>
			
		<?php endif; ?>
		
		<?php if (is_single()): ?>
			
			<?=the_title('<h1 class="h3">', '</h1>')?>
			
		<?php else: ?>
			
			<?=the_title('<h1 class="h3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>')?>
			
		<?php endif; ?>
		
		<?php if (has_deck()): ?>
			
			<h2 class="sh4"><?=get_deck()?></h2>
			
		<?php endif; ?>
		
		<!--
		<h4 style="font-size:1em;font-family:serif;text-transform:none;">
			
			<a style="border-top:2px solid gray;display:inline-block;padding:5px 10px;">
				
				<?=get_the_date('M j')?>
				
				<?php $year = get_the_date('Y'); ?>
				
				<?php if ($year != date('Y')): ?>
					
					, <?=$year?>
					
				<?php endif; ?>
				
			</a>
			
		</h4>
		-->
		
	</header>
	
	<?php if (is_single()): ?>
		
		<div class="body">
			
			<?=the_content()?>
			
		</div> <!-- /.body -->
		
		<?php comments_template(); ?>
		
	<?php else: ?>
		
		<p><?=the_excerpt()?></p>
		
		<p><i class="fa fa-eye"></i> <a href="get_permalink()">Read more</a></i> | <i class="fa fa-comment"></i> <a href="<?=get_permalink()?>#comments">Comment</a></i><?=edit_post_link('Edit', ' | <i class="fa fa-pencil"></i> ')?></p>
		
	<?php endif; ?>
	
</article>
