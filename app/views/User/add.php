<html>
<head>		
	<script>
	$(document).ready(function()
	{
		$('#simpan').click(function()
		{			
			var emailReg = /\S+@\S+\.\S+/;						

			if($('#username').val()=='')
			{
				$('#username').addClass('error');
				$('#usernameError').addClass('error');
			}
			
			if($('#email').val()=='')
			{
				$('#email').addClass('error');
				$('#emailError2').addClass('error');
				$('#emailError').removeClass('error');
			}
			
			if($('#password').val()=='')
			{
				$('#password').addClass('error');
				$('#passwordError').addClass('error');
			}
			
			if($('#email').val()!=''&&emailReg.test($('#email').val())==false)
			{
				$('#email').addClass('error');
				$('#emailError').addClass('error');
				$('#emailError2').removeClass('error');
			}

			if($('#username').val()!=''&&$('#email').val()!=''&&$('#password').val()!=''&&emailReg.test($('#email').val())!=false)
			{
				$('#username').removeClass('error');
				$('#email').removeClass('error');
				$('#password').removeClass('error');
				$('#usernameError').removeClass('error');	
				$('#emailError').removeClass('error');
				$('#passwordError').removeClass('error');
				$('#emailError2').removeClass('error');

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
</head>
<body>

	<div class="row">
		<div class="large-12 columns">
			<?php 
				if(isset($user))
				{
					$name = '"'.$user->name.'"';
					$email = '"'.$user->email.'"';

					$admin = $user->hakakses()->where('peran', 1)->count();
					$perka = $user->hakakses()->where('peran', 2)->count();
					$approver = $user->hakakses()->where('peran', 3)->count();

					$url = 'users/edit';

					$id = $user->id;
				}
				else
				{
					$name = '""';
					$email = '""';

					$admin = 0;
					$perka = 0;
					$approver = 0;

					$url = 'users/simpan';

					$id = 0;
				}
			

			echo Form::open(array('url' => $url, 'method' => 'post', 'class' => 'custom')); ?>

			<form>
				<fieldset>			

					<input name="id" value=<?php echo $id; ?> hidden>

					<div class="row collapse">
						<div class="small-2 columns">
							<label>Username:</label>
						</div>
						<div class="small-10 columns">
							<input type="text" name="username" value=<?php echo $name; ?> placeholder="Username" id="username"></input>
							<small id="usernameError" hidden>Anda belum mengisikan username!</small>
						</div>						
					</div>					

					<div class="row collapse">
						<div class="small-2 columns">
							<label>Email:</label>
						</div>
						<div class="small-10 columns">
							<input type="text" name="email" value=<?php echo $email; ?> placeholder="Email" id="email"></input>
							<small id="emailError" hidden>Alamat email yang anda masukan tidak valid!</small>							
							<small id="emailError2" hidden>Anda belum mengisikan alamat email!</small>							
						</div>						
					</div>					

					<?php 
					if(!isset($user))
					{
						?>
						<div class="row collapse">
							<div class="small-2 columns">
								<label>Password:</label>
							</div>
							<div class="small-10 columns">
								<input type="text" name="password" placeholder="Password" id="password"></input>
								<small id="passwordError" hidden>Anda belum mengisikan password!</small>
							</div>						
						</div>		
						<?php
					}					
					?>

					<div class="row collapse">
						<div class="small-2 columns">
							<label>Peran:</label>
						</div>
						
						<div class="small-4 columns">
							<label for="checkbox1">
								<?php
								if($perka!=0)
								{
									echo '<input type="checkbox" CHECKED id="checkbox1" style="display: none;" name="peran[]" value="2">';
									echo '<span class="custom checkbox checked"></span> Perancang Kegiatan';
								}
								else
								{
									echo '<input type="checkbox" id="checkbox1" style="display: none;" name="peran[]" value="2">';
									echo '<span class="custom checkbox"></span> Perancang Kegiatan';
								}
								?>								
							</label>
						</div>		

						<div class="small-3 columns">
							<label for="checkbox1">
								<?php
								if($approver!=0)
								{
									echo '<input type="checkbox" id="checkbox1" CHECKED style="display: none;" name="peran[]" value="3">';
									echo '<span class="custom checkbox checked"></span> Approver';
								}
								else
								{
									echo '<input type="checkbox" id="checkbox1" style="display: none;" name="peran[]" value="3">';
									echo '<span class="custom checkbox"></span> Approver';
								}
								?>								
							</label>
						</div>

						<div class="small-3 columns">
							<label for="checkbox1">
								<?php
								if($admin!=0)
								{
									echo '<input type="checkbox" id="checkbox1" CHECKED style="display: none;" name="peran[]" value="1">';
									echo '<span class="custom checkbox checked"></span> Admin';
								}
								else
								{
									echo '<input type="checkbox" id="checkbox1" style="display: none;" name="peran[]" value="1">';
									echo '<span class="custom checkbox"></span> Admin';
								}
								?>								
							</label>
						</div>

					</div>		

					<br>

					<div class="row" align="right">
						<div class="large-12 columns">
							<a class="small button secondary" id="simpan">Simpan</a>
							<button id="submit" hidden></button>
						</div>					
					</div>			

				</fieldset>
			</form>

			<?php echo Form::close(); ?>

			<!-- End Data modal -->

		</div>
	</div>	

</body>
</html>