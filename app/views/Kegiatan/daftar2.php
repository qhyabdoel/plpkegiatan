<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<link rel="stylesheet" type="text/css" href="/css/foundation-icon.css">
	<style>
	dd
	{
		font-size: 12px;
	}
	i.besar
	{
		font-size: 25px;
	}
	</style>
</head>
<body>	

	<h5 class="subheader">Kegiatan yang pernah dilaksanakan di PKN dan STMIK LPKIA</h5>							
	<hr />
	<?php 
	$i=0;

	foreach ($kegiatans as $kegiatan) {
		?>
		<br />
		<dl>
			<h6><?php echo $kegiatan->title; ?></h6>
			<dt>
				<h6 class="subheader">
					Pelaksana: <?php echo $kegiatan->perka->hakakse->user->name; ?>
				</h6>
			</dt>
			<dd>
				<?php echo $kegiatan->detail; ?>
			</dd>
		</dl>
		<?php
		
		$kegiatans_id[$i] = $kegiatan->id;
		$i++;
	}

	$min_id = $kegiatans_id[0];
	$max_id = $kegiatans_id[$i-1];
	?>

	<br />
	<div align="center">
		<?php 
		if($min_id==$min&&$max_id!=$max)
		{
			?>
			<a class="button small radius secondary disabled" onClick="prev()" id="prev"> << Halaman Sebelumnya </a>
			<a class="button small radius secondary" onClick="next()" id="next"> Halaman Berikut >> </a>			
			<?php
		}
		elseif ($max_id==$max&&$min_id!=$min) 
		{
			?>
			<a class="button small radius secondary" onClick="prev()" id="prev"> << Halaman Sebelumnya </a>
			<a class="button small radius secondary disabled" onClick="next()" id="next"> Halaman Berikut >> </a>			
			<?php
		}
		elseif ($max_id==$max&&$min_id==$min) 
		{
			?>
			<a class="button small radius secondary disabled" onClick="prev()" id="prev"> << Halaman Sebelumnya </a>
			<a class="button small radius secondary disabled" onClick="next()" id="next"> Halaman Berikut >> </a>			
			<?php
		}
		else
		{
			?>
			<a class="button small radius secondary" onClick="prev()" id="prev"> << Halaman Sebelumnya </a>
			<a class="button small radius secondary" onClick="next()" id="next"> Halaman Berikut >> </a>			
			<?php
		}
		?>				
		<hr>
		<form class="custom">
			<div class="row collapse" id="search" hidden>							
				<div class="large-6 columns">
					<span class="prefix">Cari Berdasarkan</span>
				</div>
				<div class="large-6 columns">
					<select id="customDropdown">
						<option value="Nama Kegiatan">Nama Kegiatan</option>
						<option value="Pelaksana">Pelaksana</option>
						<option value="Waktu">Waktu</option>
						<option value="Tempat">Tempat</option>
					</select>
				</div>								
				<div class="large-10 columns">
					<input type="text" placeholder="Kata Kunci">
				</div>
				<div class="large-2 columns">
					<a href="#" class="button secondary prefix">
						<i class="foundicon-search besar"></i>
					</a>
				</div>														
			</div>							 
		</form>
	</div>									

	<script src="/js/foundation.min.js"></script>  

	<script>	
	$(document).foundation();		
	
	$('#search').removeAttr('hidden');
	</script>

</body>
</html>