<html>
<head>		
	
</head>
<body>	

	<div class="row">
		<div class="large-12 columns">
			
			<?php 

			if(isset($jeni))
			{
				$url = '/jenis/edit';

				$input = '<input type="text" name="nama" value="'.$jeni->nama.'" placeholder="Nama Dokumen">
				<input name="id" value="'.$jeni->id.'" hidden>';

				$level = $jeni->level;
			}
			else
			{
				$url = '/jenis/add';

				$input = '<input type="text" name="nama" placeholder="Nama Dokumen">';	
			}

			echo Form::open(array('url' => $url, 'method' => 'post', 'class' => 'custom')); 

			?>

			<form>
				<fieldset>			

					<div class="row collapse">
						<div class="small-4 columns">
							<label>Level:</label>
						</div>
						<div class="small-8 columns">
							<label><?php echo $level; ?></label>
							<input name="level" value=<?php echo $level; ?> hidden></input>							
						</div>						
					</div>															

					<br>

					<div class="row collapse">
						<div class="small-12 columns">
							<label>Nama Dokumen:</label>
						</div>
						<div class="small-12 columns">
							<?php echo $input; ?>
						</div>						
					</div>																									

					<br>

					<div class="row" align="right">
						<div class="large-12 columns">
							<button class="small button secondary">Simpan</button>
						</div>					
					</div>			

				</fieldset>
			</form>

			<?php echo Form::close(); ?>

			<!-- End Data modal -->

		</div>
	</div>

	<script src="/js/foundation.min.js"></script>  
	<script>
	$(document).foundation();	
	</script>		

</body>
</html>