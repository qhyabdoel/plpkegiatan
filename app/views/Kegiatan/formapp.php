<html>
<head>
	<title>LPKIA</title>
	
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.form.js"></script>
	<script src="/js/jquery.ui.js"></script>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />		
	
	<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
	<link rel="stylesheet" href="/css/normalize.css" />
	<link rel="stylesheet" href="/css/foundation.css" />
	<link rel="stylesheet" href="/css/foundation-icon.css">
	<!-- <link rel="stylesheet" href="/css/jquery-ui.css"> -->	

	<style>	
	div.scroll
	{
		height: 550px;
		overflow: auto;
	}	
	
	object.pdf
	{
		height: 800px;		
		width: 100%;
	}
	
	.pdf2
	{
		height: 1000px;		
		width: 100%;	
	}
	
	p.cat
	{
		font-size:12px;		
	}
	
	h6.cat2
	{
		font-size:13px;
	}
	
	textarea
	{ 
		resize:vertical;
		height: 100px;		
	}	
	
	fieldset.fset1
	{
		border-color: #c60f13;
		color: #c60f13;
	}	
	</style>

	<script src="/js/vendor/custom.modernizr.js"></script>
	
	<!-- script tambhan -->	
	<script src="/js/appform1.js"></script>
	<!-- end script tambhan -->
	
</head>
<body>

	<?php
	
	$statusCode = $dokumen->status;

	$jenis = $dokumen->jeni->nama;

	if($statusCode==1)
	{
		$status = 'Diajukan';
	}

	$max = $dokumen->pelkegiatan->infokegiatans()->max('id');
	$tanggalMax = $dokumen->pelkegiatan->infokegiatans()->find($max)->Kalendar->tanggal;

	$min = $dokumen->pelkegiatan->infokegiatans()->min('id');
	$tanggalMin = $dokumen->pelkegiatan->infokegiatans()->find($min)->Kalendar->tanggal;	

	$pdf = '/pdf/'.$dokumen->id.'.pdf#toolbar=0&view=fitH';

	$nama = '"'.$dokumen->pelkegiatan->kegiatan->title.'"';
	?>

	<div class="row">
		<div class="large-12 columns" id="doc">

			<!-- Navigation -->

			<nav class="top-bar">
				<ul class="title-area">
					<!-- Title Area -->
					<li class="name">
						<h1><a href="#">Pengajuan Kegiatan Kemahasiswaan </a></h1>
					</li>
					<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
					<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
				</ul>

				<section class="top-bar-section">

					<!-- Right Nav Section -->
					<ul class="right">
						<li class="divider"></li>
						<li class="active"><a href="/perkas">Beranda</a></li>	
						<li class="divider"></li>		      
						<li><a href="#" data-reveal-id="myModal2" id="navKegiatan">Kegiatan</a></li>		      
					</ul>
				</section>

			</nav>		

			<!-- End Navigation -->

			<!-- Header Content -->

			<div class="row">          
				
				<div class="large-12 columns">
					<div class="panel">
						<div class="row">

							<div class="large-12 columns">					  
								<h5 class="subheader">Diajukan Oleh: <?php echo $dokumen->pelkegiatan->kegiatan->perka->hakakse->user->name; ?></h5>
								<hr />					   
							</div>

							<div class="large-3 columns">							
								<h5 class="subheader">ID: <?php echo $dokumen->id; ?></h5>							
							</div>

							<div class="large-6 columns">
								<h5 class="subheader">Jenis: <?php echo $jenis; ?></h5>
							</div>	

							<div class="large-3 columns">
								<h5 class="subheader">Status: <?php echo $status; ?></h5>
							</div>

						</div>

						<hr />

						<div class="row collapse">
							<div class="small-2 columns">
								<label>Nama Kegiatan:</label>
							</div>
							<div class="small-12 columns ui-widget">
								<input type="text" value=<?php echo $nama; ?> id="inputNamaKegiatan" disabled>
							</div>
						</div>

						<div class="row collapse">
							<div class="small-2 columns">
								<label>Deskripsi:</label>
							</div>
							<div class="small-12 columns">
								<textarea id="inputDeskripsiKegiatan" disabled><?php echo $dokumen->pelkegiatan->kegiatan->detail; ?></textarea>								
							</div>						
						</div>

						<br />
						<div class="row collapse">

							<div class="small-2 columns">
								<label>Waktu Kegiatan:</label>
								<br />
							</div>

							<div class="small-12 columns">												

								<div class="small-5 columns">
									<div class="row collapse">
										<div class="small-2 columns">
											<h6 class="subheader">Mulai</h6>							
										</div>

										<div class="small-10 columns">
											<h6 class="subheader" id="awal">: <?php echo $tanggalMin; ?></h6>
										</div>										
									</div>						
								</div>

							</div>							

							<div class="small-12 columns">												

								<div class="small-5 columns">
									<div class="row collapse">
										<div class="small-2 columns">
											<h6 class="subheader">Akhir</h6>							
										</div>

										<div class="small-10 columns">
											<h6 class="subheader" id="akhir">: <?php echo $tanggalMax; ?></h6>
										</div>										
									</div>						
								</div>					

							</div>														

						</div>
						<br />						
						<br />
						<hr />

						<div class="row">
							<div class="large-7 columns">
								<label>Dokumen:</label>
								<div class="row">
									<div class="large-12 columns" id="divPdf">
										<object class="pdf" id="pdf" data=<?php echo $pdf; ?> type="application/pdf">

										</object>
									</div>
								</div>		

								<div class="large-11 large-offset-1 columns">															
									<br><a data-reveal-id="myModal4" class="button radius small secondary" id="perbesar">Perbesar</a>								
									<a id="getDownload" class="button radius small secondary">Download</a>
									
									<?php echo Form::open(array('url' => '/dokumens/download', 'id' => 'formDownload')); ?>
									<input id="inputDownload" name="pdf" hidden>
									<button id="postDownload" hidden></button>
									<?php echo Form::close(); ?>
								</div>							

							</div>

							<div class="large-5 columns">
								<label>Catatan:</label>
								<hr />

								<textarea placeholder="isi catatan" id="getCatatan"></textarea>

								<input value=<?php echo $dokumen->id; ?> id="getDokumenId" hidden>

								<small id="getCatatanError" hidden>
									Anda belum mengisikan catatan! 
									Isi catatan dan tekan tombol "Add" kembali untuk menambahkan catatan!
								</small>								

								<div class="large-11 large-offset-1 columns">				
									<button class="button radius small" id="getbuton">Add</button>
								</div>

								<hr />
								<div class="scroll">
									<div id="catatan2"></div>
									
									<?php 
									foreach ($catatans as $catatan) 
									{
										$date = date('d-m-Y H:i', strtotime($catatan->created_at));

										echo '<h6 class="subheader cat2">'.$catatan->user->name.', '.$date.'</h6>';
										echo '<p class="cat">'.$catatan->isi.'</p>';
										echo '<hr />';
									}
									?>
									
								</div>																																			

							</div>																	

						</div>												   
					</div>		

					<div class="large-12 columns">									
						<?php echo Form::open(array('url' => 'dokumens/approve', 'class' => 'custom'));?>						
						<input value=<?php echo $dokumen->id; ?> name="id" hidden>

						<div class="large-7 columns large-centered">
							<div class="row">
								<div class="large-7 columns">								
									<fieldset id="getFSStatusError">			
										<legend>Tindakan</legend>
										<div class="large-6 small-6 columns">
											<label for="radio1">
												<input name="status" class="radio1" type="radio" id="status" value="1">
												<span class="custom radio"></span> 
												Setujui
											</label>
										</div>
										<div class="large-6 small-6 columns">
											<label for="radio1">
												<input name="status" class="radio1" type="radio" id="status" value="0">
												<span class="custom radio"></span> 
												Tolak
											</label>
										</div>													
									</fieldset>
									<small id="getStatusError" hidden>Anda belum melakukan tindakan pengujian dokumen!</small>
								</div>
								<div class="large-5 columns">
									<br><br><br>
									<a class="button radius success" id="getApprove">Submit</a>	
								</div>
							</div>						
						</div>
						
						<button id="setSubmit" hidden></button>
						<?php echo Form::close();
						?>
					</div>										

				</div>

				<!-- End Header Content -->      	  		

				<!-- Footer -->

				<footer class="row">
					<div class="large-12 columns"><hr />
						<div class="row">

							<div class="large-6 columns">
								<p>Copyright &copy; 2013 Kiki Abdulloh.</p>
							</div>

							<div class="large-6 columns">
								<ul class="inline-list right">
									<li><a href="#">Tentang</a></li>
									<li><a href="#">Bantuan</a></li>                  
								</ul>
							</div>

						</div>
					</div>
				</footer>

				<!-- End Footer -->

				<!-- Data modal -->	
				<div id="myModal2" class="reveal-modal small" align="center">          
					<a href="#" class="button radius secondary" data-reveal-id="myModal3">Daftar</a><br />
					<a href="#" class="button radius secondary">Kalender</a><br />	   
				</div>    

				<div id="myModal3" class="reveal-modal small" align="center">
					<a href="#" class="button radius secondary">Daftar Kegiatan</a><br />
					<a href="#" class="button radius secondary">Daftar Pelaksanaan Kegiatan</a>
				</div>	

				<div id="myModal4" class="reveal-modal xlarge" align="center">
					<object id="pdf2" class="pdf2" data=<?php echo $pdf; ?> type="application/pdf">

					</object>
				</div>

				<div id="myModal5" class="reveal-modal" align="center">
					<h2>Form Pengujian Dokumen</h2>
				</div>
				<!-- End Data modal -->

			</div>
		</div>	

		<div class="large-12 columns" id="doc2" align="center">
			<br><br><br><br><br><br>
			<h5 class="subheader">
				Pengajuan dokumen....
			</h5>
			<br>
			<img src="/img/load.gif" class="img1" id="img1">
		</div>
	</div>	

	<script>
	document.write('<script src=' +
		('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
		'.js><\/script>')
	</script>

	<script src="/js/foundation.min.js" id="getFoundationJS"></script>  

	<script>
	$(document).foundation(function()
	{
		$('#pdf').hide();

		$('#myModal5').foundation('reveal', 'open');			

		$('#myModal5').bind('closed', function()
		{
			$('#pdf').show();
		});

		$('#doc2').hide();
	});	
	</script>

</body>
</html>