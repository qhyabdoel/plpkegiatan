<html>
<head>		
	
</head>
<body>

	<div class="row">
		<div class="large-12 columns">
			
			<?php echo Form::open(array('url' => '/levels/add', 'method' => 'post', 'class' => 'custom')); ?>

			<form>
				<fieldset>			

					<div class="row collapse">
						<div class="small-4 columns">
							<label>Level:</label>
						</div>
						<div class="small-8 columns">
							<label><?php echo $level; ?></label>
							<input name="level" value=<?php echo $level; ?> hidden></input>
							<input name="jalurid" value=<?php echo $jalurId; ?> hidden></input>
							<input name="jeniid" value=<?php echo $jeniId; ?> hidden></input>
						</div>						
					</div>															

					<br>

					<div class="row collapse">
						<div class="small-4 columns">
							<label>Approver:</label>
						</div>
						<div class="small-12 columns">
							<select name="approverid" class="medium">
								<?php

								foreach ($approvers as $approver) 
								{
									$count = Jalur::find($jalurId)->pengajuans()->where('jeni_id', $jeniId)
									->where('approver_id', $approver->id)->count();

									if($count==0)
									{																			
										echo '<option value="'.$approver->id.'">'.$approver->hakakse->user->name.'</option>';
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