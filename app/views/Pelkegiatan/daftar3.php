<html>
<head>	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />	

	<link rel="stylesheet" href="/css/normalize.css" />
	<link rel="stylesheet" href="/css/foundation.css" />  

	<script src="js/vendor/custom.modernizr.js"></script> 	
</head>
<body>
	<div id="result"></div>
	<script>
		$(document).ready(function()
		{			
			$('#result').html('<div align="center"><img src="/img/load.gif"></div>');
			$('#result').load('pelkegiatans/daftar', function()
			{
				$('#search').removeAttr('hidden');
			});		
		})
	</script>
</body>
</html>