<!doctype html>
<html>

<head>
	
	<meta charset="utf-8">
	
	<title></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	
	<meta name="viewport" content="width=device-width">
	
	<!--[if !IE]><!-->
	
	<link rel="stylesheet" href="//static.mhulse.com<?=rooney_build()?>/css/picard.min.css">
	
	<link rel="stylesheet" href="//fonts.mhulse.com/hulse/hulse.css?v=20131214">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
	
	<!--<![endif]-->
	
	<!-- Use when not on mhulse.com: -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="//mhulse.com/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="//mhulse.com/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="//mhulse.com/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="//mhulse.com/apple-touch-icon-57x57-precomposed.png">
	<link rel="shortcut icon" href="//mhulse.com/favicon.ico">
	<meta name="msapplication-TileImage" content="//mhulse.com/apple-touch-icon-144x144-precomposed.png">
	<meta name="msapplication-TileColor" content="#ffffff">
	
	<!-- Use photo if one exists, otherwise use this as a default: -->
	<link rel="image_src" href="//mhulse.com/apple-touch-icon-144x144-precomposed.png">
	
	<link rel="canonical" href="">
	
	<?=wp_head()?>
	
</head>
<body ontouchstart>
	
	<header role="banner">
		
		<h1 id="flag"><a href="http://mhulse.com">M<span>HULSE.com</span></a></h1>
		
	</header>
	
	<hr>
	
	<nav role="navigation">
		
		<ul class="x3"<?=rooney_get_nav_menu('primary')?><?=rooney_get_category_menu()?>></ul>
		
	</nav>
	
	<aside role="complementary">
		
		<section>
			
			<h1></h1>
			
			<?=get_search_form()?>
			
		</section>
		
	</aside>
	
	<hr>
	
	<main role="main">
		
		<?php if (have_posts()): ?>
			
			<?php while (have_posts()): ?>
				
				<?=the_post()?>
				
				<?php if (is_single()): ?>
					
					<?=the_title('<h1 class="h3">', '</h1>')?>
					
				<?php else: ?>
					
					<?=the_title('<h1 class="h3"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>')?>
					
				<?php endif; ?>
				
				<?=the_content()?>
				
			<?php endwhile; ?>
			
		<?php endif; ?>
	
	</main>
	
	<hr>
	
	<footer role="contentinfo">
		
		<p class="boring">
			<span><i class="fa fa-github-alt"></i> <a href="http://github.com/mhulse">GitHub</a> (<a href="https://gist.github.com/mhulse">Gists</a>)</span>
			<span><span>&nbsp;/&nbsp;</span> <i class="fa fa-stack-exchange"></i> <a href="http://stackexchange.com/users/560173/mhulse">StackExchange</a> <span>&nbsp;/&nbsp;</span></span>
			<span><i class="fa fa-star"></i> <a href="https://github.com/mhulse/picard">Picard</a></span>
			<small><span>Copyright &copy; <a href="http://mhulse.com">mhulse.com</a> 2013-14.</span> <span>All rights reserved.</span></small>
		</p>
		
	</footer>
	
	<!--[if !IE]><!-->
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script>if(!window.jQuery){document.write('<script src="//ajax.aspnetcdn.com/ajax/jquery/jquery-2.0.3.min.js"><\/script>');}</script>
	
	<script src="//static.mhulse.com<?=rooney_build()?>/scripts/picard.min.js"></script>
	
	<!--<![endif]-->
	
	<?=wp_footer()?>
	
</body>
</html>
