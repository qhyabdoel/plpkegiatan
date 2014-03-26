<html>
<head>		
	<script>
	$(document).ready(function()
	{
		$('#simpan').click(function()
		{						
			if($('#nama').val()=='')
			{
				$('#nama').addClass('error');
				$('#namaError').addClass('error');
			}
			
			if($('#deskripsi').val()=='')
			{
				$('#deskripsi').addClass('error');
				$('#deskripsiError').addClass('error');								
			}						

			if($('#nama').val()!=''&&$('#deskripsi').val()!='')
			{
				$('#nama').removeClass('error');
				$('#deskripsi').removeClass('error');
				$('#namaError').removeClass('error');
				$('#deskripsiError').removeClass('error');					

				$('#submit').click();
			}	

			$('#username').focus(function()
			{
				$('#username').removeClass('error');								
				$('#usernameError').removeClass('error');					
			});

			$('#email').focus(function()
			{
				$('#email').removeClass('error');								
				$('#emailError').removeClass('error');					
				$('#emailError2').removeClass('error');					
			});

			$('#password').focus(function()
			{
				$('#password').removeClass('error');								
				$('#passwordError').removeClass('error');					
			});			
		});
	});		
	</script>

	<!-- foundation datepicker start -->
	<script src="/js/foundation-datepicker.js"></script>
	<link rel="stylesheet" href="/css/foundation-datepicker.css">
	<!-- foundation datepicker end -->
</head>
<body>

	<div class="row">
		<div class="large-12 columns">     			

			<form>
				<fieldset>			

					<div class="row collapse">
						<div class="small-2 columns">
							<label>Nama:</label>
						</div>
						<div class="small-10 columns">
							<input type="text" name="nama" placeholder="Nama Info" id="nama"></input>
							<small id="namaError" hidden>Anda belum mengisikan nama info!</small>
						</div>						
					</div>					

					<div class="row collapse">
						<div class="small-2 columns">
							<label>Deskripsi:</label>
						</div>
						<div class="small-10 columns">
							<input type="text" name="deskripsi" placeholder="Deskripsi Info" id="deskripsi"></input>							
							<small id="deskripsiError" hidden>Anda belum mengisikan deskripsi info!</small>							
						</div>						
					</div>					

					<br>
					<div class="row collapse">					

						<div class="small-12 columns">																			
							<div class="row collapse">
								<div class="small-2 columns">
									<label class="inline">Mulai</label>
								</div>

								<div class="small-7 columns">
									<input type="text" id="startDate" value=<?php echo date('d-m-Y'); ?> readonly>
								</div>

								<div class="small-2 columns">
									<button data-date-format="yyyy-mm-dd" data-date=<?php echo date('Y-m-d'); ?> class="small" id="dp3">
										Ubah
									</button>
								</div>
							</div>													
						</div>							

						<div class="small-12 columns">																			
							<div class="row collapse">
								<div class="small-2 columns">
									<label class="inline">Akhir</label>
								</div>

								<div class="small-7 columns">
									<input type="text" id="endDate" value=<?php echo date('d-m-Y'); ?> readonly>
								</div>

								<div class="small-2 columns">
									<button data-date-format="yyyy-mm-dd" data-date=<?php echo date('Y-m-d'); ?> class="small" id="dp4">
										Ubah
									</button>
								</div>
							</div>						
						</div>

					</div>

				</div>

				<div class="row" align="right">
					<div class="large-12 columns">
						{{ Form::open(array('url' => 'infolains/simpan', 'method' => 'post')) }}
							
							<input id="namaInput" hidden>
							<input id="deskripsiInput" hidden>
							<input id="awalInput" hidden>
							<input id="akhirInput" hidden>
							<a class="small button secondary" id="simpan">Simpan</a>
							<button id="submit" hidden></button>
						
						{{ Form::close() }}
					</div>					
				</div>			

			</fieldset>
		</form>		

		<!-- End Data modal -->

		<script src="/js/changedate.js"></script>

	</div>
</div>	

</body>
</html>