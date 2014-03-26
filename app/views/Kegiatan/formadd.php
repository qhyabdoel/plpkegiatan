<html>
<head>
	<title>LPKIA</title>
	
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.form.js"></script>	

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />		
	
	<!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
	<link rel="stylesheet" href="/css/normalize.css" />
	<link rel="stylesheet" href="/css/foundation.css" />	
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
	h4.h2a
    {
      color: #c60f13;
    }
	</style>

	<script src="/js/vendor/custom.modernizr.js"></script>
	
	<!-- script tambhan -->
	<script src="/js/addform1.js"></script>
	<!-- end script tambhan -->
	
</head>
<body>

	<?php

	if(!isset($pelkegiatan))
	{
		$id = $dokumen->id;

		$pelkegiatan = $dokumen->pelkegiatan;

		$jenis = $dokumen->jeni;

		$pdf = '"/pdf/'.$dokumen->id.'.pdf#toolbar=0&view=fitH"';		

		$url = 'dokumens/addedit';

		$dokumen_id = $dokumen->id;

		$upload = 'Upload Revisi';

		$status = 'Ditolak';
	}
	else
	{
		$id = '_';

		$max = $pelkegiatan->dokumens()->max('id');	
		
		$jeniLevel = $pelkegiatan->dokumens()->where('id', $max)->first()->jeni->level+1;

		$jenis = Jeni::where('level', $jeniLevel)->first();

		$pdf = '"/pdf/kosong.pdf#toolbar=0&view=fitH"';

		$url = 'dokumens/add';

		$dokumen_id = 0;

		$upload = 'Upload';

		$status = 'Baru';
	}	
	
	$max = $pelkegiatan->infokegiatans()->max('id');
	$tanggalMax = $pelkegiatan->infokegiatans()->find($max)->Kalendar->tanggal;

	$min = $pelkegiatan->infokegiatans()->min('id');
	$tanggalMin = $pelkegiatan->infokegiatans()->find($min)->Kalendar->tanggal;		

	$nama = '"'.$pelkegiatan->kegiatan->title.'"';

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
						<li><a href="#" data-reveal-id="myModal2" id="buttonKegiatan">Kegiatan</a></li>		      
					</ul>
				</section>

			</nav>		

			<!-- End Navigation -->

			<!-- Header Content -->

			<div class="row">          				

				<div class="large-12 columns">
					<div class="panel">
						<div class="row">							

							<div class="large-3 columns">							
								<h5 class="subheader">ID: <?php echo $id; ?></h5>							
							</div>

							<div class="large-6 columns">
								<h5 class="subheader">Jenis: <?php echo $jenis->nama; ?></h5>
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
								<textarea id="inputDeskripsiKegiatan" disabled><?php echo $pelkegiatan->kegiatan->detail; ?></textarea>
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
										<object class="pdf" id="pdf" data=<?php echo $pdf; ?> type="application/pdf" type="application/pdf">

										</object>
									</div>
								</div>		

								<div class="row">
									<div class="large-12 columns">
										<small id="getPDFKegiatanError" hidden>Anda belum memiliki dokumen kegiatan!</small>
										<small id="getPDFEkstensiError" hidden>Anda harus memilih file dengan ekstensi "pdf"!</small>
									</div>
								</div>

								<div class="large-11 large-offset-1 columns">						
									<?php 
									echo Form::open(array('url' => 'dokumens/upload', 'files' => true, 'id' => 'uploadForm'));
									?>

									<br />							
									
									<input name="dokumenId1" value=<?php echo $dokumen_id; ?> hidden>
									<input type="file" id="getFile1" name="getFile1" hidden>
									
									<a class="button radius small" id="getUpload">
										<?php echo $upload; ?>
									</a>
									
									<a data-reveal-id="myModal4" class="button radius small secondary" id="perbesar">Perbesar</a>
									
									<button id="setUpload" hidden></button>

									<?php echo Form::close(); ?>
								</div>	

							</div>

							<div class="large-5 columns">
								<label>Catatan:</label>
								<hr />

								<textarea placeholder="isi catatan" id="getCatatan"></textarea>

								<input value="0" id="getDokumenId" hidden>

								<small id="getCatatanError" hidden>
									Anda belum mengisikan catatan! 
									Isi catatan dan tekan tombol "Add" kembali untuk menambahkan catatan!
								</small>								

								<small id="getCatatanError2" hidden>
									Belum ada dokumen untuk diberikan catatan!
								</small>

								<div class="large-11 large-offset-1 columns">				
									<button class="button radius small" id="getbuton">Add</button>
								</div>

								<hr />
								<div class="scroll">
									<div id="catatan2"></div>	

									<?php 
									if(isset($catatans))
									{
										foreach ($catatans as $catatan) 
										{
											$date = date('d-m-Y H:i', strtotime($catatan->created_at));

											echo '<h6 class="subheader cat2">'.$catatan->user->name.', '.$date.'</h6>';
											echo '<p class="cat">'.$catatan->isi.'</p>';
											echo '<hr />';
										}
									}									
									?>

								</div>																																			

							</div>																	

						</div>												   
					</div>		

					<input id="jeni" value=<?php echo $jenis->id; ?> hidden>

					<div class="large-12 columns" align="center">	

					<a href="#" data-reveal-id="myModal6" id="aa" hidden></a>								
						
						<?php 

						echo Form::open(array('url' => $url));						

						if(isset($dokumen))
						{
							echo '<input name="dokumenId" value='.$dokumen->id.' hidden>';
						}
						else
						{
							echo '<input name="id" value='.$pelkegiatan->id.' hidden>';
						}

						?>						

						<input name="jenis" value=<?php echo $jenis->id; ?> hidden>

						<input id="postFileKegiatan" name="fileKegiatan" hidden>
						
						<a class="button radius success" id="getSubmit">Submit</a>	
						
						<button id="setSubmit" hidden></button>
						
						<?php echo Form::close(); ?>

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
					<h2>Form Pengajuan Dokumen</h2>
				</div>

				<div id="myModal6" class="reveal-modal small">
					<h4 class="subheader h2a">
						Belum ada approver untuk menguji dokumen ini!
					</h4>
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