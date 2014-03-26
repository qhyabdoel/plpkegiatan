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
	.ui-helper-hidden-accessible
	{
		display:none;
	}
	h4.h2a
	{
		color: #c60f13;
	}

	</style>

	<script src="/js/vendor/custom.modernizr.js"></script>
	
	<!-- script tambhan -->
	<script src="/js/perkaform1.js"></script>
	<!-- end script tambhan -->

	<!-- foundation datepicker start -->
	<script src="/js/foundation-datepicker.js"></script>
	<link rel="stylesheet" href="/css/foundation-datepicker.css">
	<!-- foundation datepicker end -->
	
</head>
<body>

	<?php 

	if(isset($dokumen))
	{
		$id = $dokumen->id;
		$dokumen_id = $id;

		$status = 'Ditolak';

		$nama = '"'.$dokumen->pelkegiatan->kegiatan->title.'"';
		$deskripsi = $dokumen->pelkegiatan->kegiatan->detail;	

		$max = $dokumen->pelkegiatan->infokegiatans()->max('id');
		$tanggalMax = $dokumen->pelkegiatan->infokegiatans()->find($max)->Kalendar->tanggal;

		$akhir = strtotime($tanggalMax);

		$min = $dokumen->pelkegiatan->infokegiatans()->min('id');
		$tanggalMin = $dokumen->pelkegiatan->infokegiatans()->find($min)->Kalendar->tanggal;
		
		$mulai = strtotime($tanggalMin);
		
		$upload = 'Upload Revisi';		

		$pdf = '"/pdf/'.$dokumen->id.'.pdf#toolbar=0&view=fitH" type="application/pdf"';	

		$url = 'dokumens/edit';
	}
	else
	{

		$id = '_';
		$dokumen_id = 0;

		$status = 'Baru';

		$nama = '""';
		$deskripsi = '';

		$mulai = strtotime(date('d-m-Y'));
		$akhir = strtotime(date('d-m-Y'));

		$upload = 'Upload';

		$pdf = '"/pdf/kosong.pdf#toolbar=0&view=fitH" type="application/pdf"';

		$url = 'dokumens/submit';		
	}

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

							<div class="large-3 columns">							
								<h5 class="subheader">ID: <?php echo $id; ?></h5>							
							</div>

							<div class="large-6 columns">
								<h5 class="subheader">Jenis: Proposal</h5>
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
								<input type="text" placeholder="Nama Kegiatan" value=<?php echo $nama; ?> id="inputNamaKegiatan"></input>
								<small id="getNamaKegiatanError" hidden>Anda belum mengisikan nama kegiatan!</small>								
							</div>
						</div>

						<div class="row collapse">
							<div class="small-2 columns">
								<label>Deskripsi:</label>
							</div>
							<div class="small-12 columns">
								<textarea placeholder="Deskripsi" id="inputDeskripsiKegiatan"><?php echo $deskripsi; ?></textarea>
								<small id="getDeskripsiKegiatanError" hidden>Anda belum mengisikan deskripsi kegiatan!</small>
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
											<label class="inline">Mulai</label>
										</div>

										<div class="small-7 columns">
											<input type="text" id="startDate" value=<?php echo date('d-m-Y', $mulai); ?> readonly>
										</div>

										<div class="small-2 columns">
											<button data-date-format="yyyy-mm-dd" data-date=<?php echo date('Y-m-d', $mulai); ?> class="small" id="dp3">
												Ubah
											</button>
										</div>
									</div>						
								</div>

							</div>							

							<div class="small-12 columns">												

								<div class="small-5 columns">
									<div class="row collapse">
										<div class="small-2 columns">
											<label class="inline">Akhir</label>
										</div>

										<div class="small-7 columns">
											<input type="text" id="endDate" value=<?php echo date('d-m-Y', $akhir); ?> readonly>
										</div>

										<div class="small-2 columns">
											<button data-date-format="yyyy-mm-dd" data-date=<?php echo date('Y-m-d', $akhir); ?> class="small" id="dp4">
												Ubah
											</button>
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
								<br />

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
									
									<a data-reveal-id="myModal4" class="button radius small secondary">Perbesar</a>
									
									<button id="setUpload" hidden></button>

									<?php echo Form::close(); ?>
								</div>	
							</div>

							<div class="large-5 columns">
								<label>Catatan:</label>
								<hr />
								<input value=<?php echo $dokumen_id; ?> id="getDokumenId" hidden>
								<textarea placeholder="isi catatan" id="getCatatan"></textarea>

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

					<?php $jeni = Jeni::find(Jeni::min('id'))->id; ?>

					<input name="jeni" id="jeni" value=<?php echo $jeni; ?> hidden>

					<input id="count" hidden>

					<a href="#" data-reveal-id="myModal6" id="aa" hidden></a>

					<div class="large-12 columns" align="center">									
						
						<?php echo Form::open(array('url' => $url)); ?>
						
						<input name="id" value=<?php echo $dokumen_id; ?> hidden>

						<input id="postFileKegiatan" name="fileKegiatan" hidden>
						<input id="postNamaKegiatan" name="namaKegiatan" hidden>

						<textarea id= "postDeskripsiKegiatan" name="deskripsiKegiatan" hidden></textarea>
						
						<input id="postTanggalAwal" name="tanggalAwal" hidden>
						<input id="postTanggalAkhir" name="tanggalAkhir" hidden>
						
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

				<div id="myModal7" class="reveal-modal small" align="center">
					<h5 class="subheader">
						Pengajuan dokumen....
					</h5>
					<br>
					<img src="/img/load.gif" class="img1" id="img1">
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
	var dataTags = new Array();

	<?php 
	$counter = 0;
	foreach ($kegiatans as $kegiatan) 
	{			
		echo "dataTags[".$counter."]='".$kegiatan->title."';";
		$counter = $counter + 1;
	}
	?>		

	$(function() {		
		$( "#inputNamaKegiatan" ).autocomplete({
			source: dataTags
		});
	});		
	</script>

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

	$('#getFoundationJS').remove();
	$('.ui-autocomplete').addClass('f-dropdown');	
	</script>

	<script src="/js/changedate.js"></script>
</body>
</html>