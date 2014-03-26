<html>
<head>		
	
</head>
<body>	

	<div class="row">
		<div class="large-12 columns">
			
			<?php echo Form::open(array('url' => '/jalurs/add', 'method' => 'post', 'class' => 'custom')); ?>

			<form>
				<fieldset>			

					<div class="row collapse">
						<div class="small-6 columns">
							<label>Perancang Kegiatan:</label>
						</div>
						<div class="small-12 columns">
							<select name="perkaid" class="medium">
								<?php

								foreach ($perkas as $perka) 
								{
									$count = $perka->jalurs()->count();

									if($count==0)
									{																			
										echo '<option value="'.$perka->id.'">'.$perka->hakakse->user->name.'</option>';
									}
								}

								?>																
							</select>
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