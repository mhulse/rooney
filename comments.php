<?php if (post_type_supports(get_post_type(), 'comments') && comments_open()): ?>
		
	<hr>
	
	<section id="comments">
		
		<p class="warn">
			The owner of this site doesn't necessarily condone the comments here, nor do they review every post.
			<br>
			<b><a href="http://help.disqus.com/customer/portal/topics/215154/articles" target="_blank">Not seeing your comment</a></b>? Disqus users, <b><a href="http://help.disqus.com/customer/portal/articles/960202-verifying-your-disqus-account" target="_blank">have you verified your account</a></b>?
		</p>
		
		<div id="disqus_thread" class="x6"></div>
		<script>var disqus_shortname='mhulse',disqus_title='<?=the_title()?>',disqus_identifier='post_<?=the_ID()?>',disqus_url='<?=the_permalink()?>';(function(){var dsq=document.createElement('script');dsq.type='text/javascript';dsq.async=true;dsq.src='http://'+disqus_shortname+'.disqus.com/embed.js';(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(dsq);})();</script>
		
	</section>
	
<?php endif; ?>
