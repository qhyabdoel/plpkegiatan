
<html>
<head>		
	<style>

	a.b1
	{
		width: 300px;
	}

	</style>
</head>
<body>

	<div class="row">
		<div class="large-12 columns">
			<h5 class="subheader">Lihat jalur pengajuan pada jenis dokumen:</h5><br>
			<div align="center">
				<?php 

					foreach ($jenis as $jeni) 
					{
						echo '<a href="/jalurs/lihat/'.$id.'/'.$jeni->id.'" data-reveal-id="myModalSmall2" data-reveal-ajax="true" 
						class="button small secondary radius b1">'.$jeni->nama.'</a>';
					}

				?>
			</div>		
		</div>
	</div>

	<script src="/js/foundation.min.js"></script>  
	<script>
	$(document).foundation();	
	</script>	

</body>
</html>