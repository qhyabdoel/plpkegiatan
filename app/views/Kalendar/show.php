<html>
<head></head>

<body>
	
	<?php 
	$infokegiatans = $kalendar->infokegiatans;
	foreach ($infokegiatans as $infokegiatan) {
		?>
		<dl>
			<dt><?php echo $infokegiatan->pelkegiatan->kegiatan->title; ?></dt>									
			<dd><?php echo $infokegiatan->pelkegiatan->kegiatan->detail; ?></dd>
		</dl>
		<?php							
	}
	?>											
	
</body>
</html>