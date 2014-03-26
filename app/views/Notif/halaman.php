<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />  

	<link rel="stylesheet" href="/css/normalize.css" />
	<link rel="stylesheet" href="/css/foundation.css" />  

	<script src="/js/vendor/custom.modernizr.js"></script>		
</head>
<body>	
	<div class="row">
		<div class="large-12 columns" id="result">
			
		</div>
		<script>
		$('#result').html('<div align="center"><img src="/img/load.gif"></div>');
		$('#result').load('/notifs/index');		
	</script>
	</div>
</body>
</html>