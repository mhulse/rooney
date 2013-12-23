<!doctype html>
<html>

<head>
	
	<meta charset="<?=strtolower(bloginfo('charset'))?>">
	
	<title><?=get_template_part('includes/head', 'title')?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	
	<meta name="viewport" content="width=device-width">
	
	<?php if (is_404()): ?>
		
		<meta name="robots" content="noindex, noarchive">
		
	<?php endif; ?>
	
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
	
	<!-- Webmaster tools: -->
	<meta name="google-site-verification" content="SYMpWtYbtUSVzHAhKnQ9whZfer-bXhI7-cZE8rFI_UU">
	<meta name="msvalidate.01" content="B46559147E88568614EBEBCB2BEF258C">
	
	<link rel="canonical" href="">
	
	<?=wp_head()?>
	
</head>
<body ontouchstart>

<header role="banner">
	
	<h1 id="flag"><a href="<?=home_url('/')?>">M<span>HULSE.com</span></a></h1>
	
</header>

<hr>

<nav role="navigation">
	
	<ul class="x3"<?=rooney_get_nav_menu('primary')?><?=rooney_get_category_menu()?>></ul>
	
</nav>

<?=get_sidebar()?>

<main role="main">
	
	<section>
		
		<h1></h1>
