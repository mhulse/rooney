<aside role="complementary">
	
	<section>
		
		<h1></h1>
		
		<form class="form" method="get" action="<?=home_url('/')?>" role="search">
			
			<label class="x4">
				<span class="off">Search:</span>
				<input type="search" name="s" placeholder="&hellip; search &hellip;" value="<?=(isset($_GET['s']) ? $_GET['s'] : '')?>">
			</label>
			
		</form>
		
	</section>
	
</aside>

<hr>
