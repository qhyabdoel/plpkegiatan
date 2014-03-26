<html>
<head>
	
</head>
<body>
	<?php echo Form::open(array('url' => '/users/hapus')); ?>

	<input name="id" value=<?php echo $id; ?> hidden>
	
	<h4 class="subheader">Apakah anda yakin menghapus data user ini?</h4>
	
	<br>
	
	<div class="large-6 large-offset-6 columns">
		<div class="row">
			<button class="button radius small">Ya</button>
			<a href="#" id="close" class="button radius small secondary">Tidak</a>
		</div>
	</div>	

	<script>
    $('#close').click(function()
    {
      $('#myModalSmall').foundation('reveal', 'close');
    });
  	</script>

	<?php echo Form::close(); ?>
</body>
</html>