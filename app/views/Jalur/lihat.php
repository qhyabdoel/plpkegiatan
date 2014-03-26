<html>
<head>
	
</head>
<body>
	
	<h5 class="subheader">Jalur Pengajuan</h5>
	<hr>
	<?php 
	if($count==0)
	{
		echo '<h6 class="subheader">Belum ada data level dan approver';
	}
	else
	{
		?>
		<table>
			<tbody>
				<tr>
					<th>Level</th>
					<th>Approver</th>
				</tr>
				<?php 
				
				$row = 0;

				foreach ($pengajuans as $pengajuan) 
				{
					$row++;
					echo '<tr>';
					echo '<td>'.$pengajuan->level->id.'</td>';
					echo '<td>'.$pengajuan->approver->hakakse->user->name.'</td>';
					echo '</tr>';
				}				
				?>
			</tbody>
		</table>
		<div class="row" align="right">
			<div class="large-12 columns">							
				<a class="small button secondary" href=<?php echo '"/levels/cut/'.$jalur_id.'/'.$jeni_id.'"'; ?>>Kurangi Level</a>
			</div>					
		</div>			
		<?php		
	}	

	?>
	
	<script src="js/foundation.forms.js"></script>

</body>
</html>