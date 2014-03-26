<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>	

	<script>
	var counterLink = 1;

	function next()
	{
		if($('#next').attr('class')=='button small radius secondary')
		{
			counterLink++;
			$('#result').empty();
			$('#result').html('<div align="center"><img src="/img/load.gif"></div>');
			$('#result').load('/kegiatans/halaman/?page='+counterLink);	
		}			
	}

	function prev()
	{
		if($('#prev').attr('class')=='button small radius secondary')
		{
			counterLink--;
			$('#result').empty();
			$('#result').html('<div align="center"><img src="/img/load.gif"></div>');
			$('#result').load('/kegiatans/halaman/?page='+counterLink);
		}			
	}
	</script>

</head>
<body>

	<div class="row">
		<div class="large-12 columns">      

			<!-- Header Content -->

			<div class="row">								
				<div id="result"></div>				
			</div>      														

			<!-- End Header Content -->     	  

		</div>
	</div>
	
	

	<script>
	$('#result').html('<div align="center"><img src="/img/load.gif"></div>');
	$('#result').load('/kegiatans/halaman');	
	</script>		

	

	<script>			
	$('#search').removeAttr('hidden');
	</script>
	
</body>
</html>