<html>
<head>	
	<link rel="stylesheet" type="text/css" href="/css/date.css">		

	<style>
	div.result
	{
		height: 250px;
	}		
	</style>
</head>

<body>	
	<div class="row">
		<div class="large-6 columns">
			<div class="result" id="result" align="center">
				<br><br><br><br><br><img src="/img/load.gif" class="img1" id="img1">
			</div>
		</div>

		<div class="large-6 columns">
			<div align="center"><h3 class="subheader">Info</h3></div>
			<hr>
			<div id="result2"></div>
		</div>
	</div>
	<script>$('#result').load('kalendars/kalendar');</script>	
</body>
</html>