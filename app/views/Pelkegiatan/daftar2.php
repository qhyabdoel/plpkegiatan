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

	<div class="row">
		<div class="large-12 columns">			

			<!-- Header Content -->						

				<h5 class="subheader">Daftar pelaksanaan kegiatan di PKN dan STMIK LPKIA</h5>
				<hr>
				<table border="0">					  
					<tbody>
						<tr>
							<th>ID</th>
							<th>Nama Kegiatan</th>
							<th>Pelaksana</th>
							<th>Waktu</th>									
						</tr>
						<?php 
						foreach ($pelkegiatans as $pelkegiatan) 
						{
							$tanggal = array();

							$i = 0;

							foreach ($pelkegiatan->infokegiatans as $infokegiatan) 
							{
								$tanggal[$i] = $infokegiatan->kalendar->tanggal;

								$i++;
							}

							$mulai = date('d-m-Y', strtotime(min($tanggal)));
							$akhir = date('d-m-Y', strtotime(max($tanggal)));

							echo '<tr>';
							echo '<td>'.$pelkegiatan->id.'</td>';
							echo '<td>'.$pelkegiatan->kegiatan->title.'</td>';
							echo '<td>'.$pelkegiatan->kegiatan->perka->hakakse->user->name.'</td>';
							echo '<td>'.$mulai.' s/d '.$akhir.'</td>';
							echo '</tr>';
						}
						?>						
					</tbody>
				</table>	
				<div align="center">
					<a class="button small radius secondary" onClick="prev()" id="prev"> << Halaman Sebelumnya </a>
					<a class="button small radius secondary" onClick="next()" id="next"> Halaman Berikut >> </a>			
				</div>

				<hr>
				<form class="custom">
					<div class="row collapse" id="search">							
						<div class="large-3 columns">
							<span class="prefix">Cari Berdasarkan</span>
						</div>
						<div class="large-3 columns" id="select">
							<select id="customDropdown">
								<option value="Nama Kegiatan">Nama Kegiatan</option>
								<option value="Pelaksana">Pelaksana</option>
								<option value="Waktu">Waktu</option>
								<option value="Tempat">Tempat</option>
							</select>
						</div>								
						<div class="large-5 columns">
							<input type="text" placeholder="Kata Kunci">
						</div>
						<div class="large-1 columns">
							<a href="#" class="button secondary prefix"><i class="foundicon-search besar"></i></a>
						</div>														
					</div>							 
				</form>



			<!-- End Header Content -->     		

		</div>
	</div>
	
	<script src="/js/foundation.min.js"></script>  
	<script>
	$(document).foundation();	
	</script>

</body>
</html>