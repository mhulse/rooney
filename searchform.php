<form class="form" method="get" action="<?=home_url('/')?>" role="search">
	
	<label class="x4">
		<span class="off">Search:</span>
		<input type="search" name="s" placeholder="&hellip; search &hellip;" value="<?=(isset($_GET['s']) ? $_GET['s'] : '')?>">
		<!--<button type="button">Go</button>-->
	</label>
	
</form>
