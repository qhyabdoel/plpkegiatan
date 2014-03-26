<html>
<head>
	<title></title>
</head>
<body>
	<h5 class="subheader">Notifikasi</h5>							
	<hr />
	<table>
		<tbody>
			<?php 

			$row = 0;

			foreach ($notifs as $notif) 
			{											
				$time = date('d-m-Y H:i', strtotime($notif->created_at));						

				$perka = $notif->dokumen->pelkegiatan->kegiatan->perka;

				$name = $perka->hakakse->user->name;

				$approver = $perka->jalurs->pengajuans()->where('jeni_id', $notif->dokumen->jeni_id)
				->where('level_id', $notif->dokumen->level->id)->first()
				->approver->hakakse->user->name;						

				$title = $notif->dokumen->pelkegiatan->kegiatan->title;

				$link = '/kegiatans/approve/'.$notif->dokumen->id;

				$jenis = $notif->dokumen->jeni->nama;

				$dokumenAppId = $perka->jalurs->pengajuans()->where('jeni_id', $notif->dokumen->jeni_id)
				->where('level_id', $notif->dokumen->level->id)
				->first()->approver->id;

				if($notif->dokumen->status==0)
				{						
					if($dokumenAppId==$approver_id)
					{
						$row++;
						?>
						<tr>
							<td>								
								<?php echo $time; ?>								
							</td>
							<td>															
								Anda telah menolak dokumen kegiatan berupa <b><?php echo $jenis; ?></b> 
								yang dikirimkan oleh <b><?php echo $name; ?></b> .
							</td>
						</tr>
						<?php
					}
					else
					{
						$row++;
						?>
						<tr>
							<td>								
								<?php echo $time; ?>								
							</td>
							<td>															
								<b><?php echo $approver; ?></b> telah menolak dokumen kegiatan berupa <b><?php echo $jenis; ?></b> 
								yang dikirimkan oleh <b><?php echo $name; ?></b> .
							</td>
						</tr>
						<?php
					}
				}
				elseif($notif->dokumen->status==1)
				{
					if($dokumenAppId==$approver_id)
					{
						$row++;
						?>
						<tr>
							<td>
								<a href=<?php echo $link; ?>>
									<?php echo $time; ?>
								</a>
							</td>
							<td>
								<a href=<?php echo $link; ?>>
									<b><?php echo $name; ?></b> 
									mengirimkan dokumen kegiatan berupa <b><?php echo $jenis; ?></b>. 
									Klik link ini untuk melakukan pengujian dokumen!
								</a>
							</td>
						</tr>
						<?php
					}
					else
					{
						$row++;
						?>
						<tr>
							<td>									
								<?php echo $time; ?>									
							</td>
							<td>									
								<b><?php echo $name; ?></b> 
								mengirimkan dokumen kegiatan berupa <b><?php echo $jenis; ?></b>
								kepada <b><?php echo $approver; ?></b>									
							</td>
						</tr>
						<?php
					}
				}
				elseif ($notif->dokumen->status==2) 
				{
					if($dokumenAppId==$approver_id)
					{
						$row++;
						?>
						<tr>
							<td>								
								<?php echo $time; ?>								
							</td>
							<td>															
								Anda telah menyetujui dokumen kegiatan berupa <b><?php echo $jenis; ?></b> 
								yang dikirimkan oleh <b><?php echo $name; ?></b> .
							</td>
						</tr>
						<?php
					}
					else
					{
						$row++;
						?>
						<tr>
							<td>								
								<?php echo $time; ?>								
							</td>
							<td>															
								<b><?php echo $approver; ?></b> telah menyetujui dokumen kegiatan berupa <b><?php echo $jenis; ?></b> 
								yang dikirimkan oleh <b><?php echo $name; ?></b> .
							</td>
						</tr>
						<?php
					}
				}
				elseif ($notif->dokumen->status==3) 
				{
					if($dokumenAppId==$approver_id)
					{
						$row++;
						?>
						<tr>
							<td>								
								<?php echo $time; ?>								
							</td>
							<td>								
								Anda telah menyetujui dokumen kegiatan berupa <b><?php echo $jenis; ?></b> 
								yang dikirimkan oleh <b><?php echo $name; ?></b> .
							</td>
						</tr>
						<?php
					}
					else
					{
						$row++;
						?>
						<tr>
							<td>								
								<?php echo $time; ?>								
							</td>
							<td>															
								<b><?php echo $approver; ?></b> telah menyetujui dokumen kegiatan berupa <b><?php echo $jenis; ?></b> 
								yang dikirimkan oleh <b><?php echo $name; ?></b> .
							</td>
						</tr>
						<?php
					}					 
				}
			}

			if($row==0)
			{
				echo '<h5 class="subheader">Belum ada notifikasi</h5>';
			}
			?>					
		</tbody>
	</table>	

	<div align="center">
		<a class="button small radius secondary" onClick="prev()" id="prev"> << Halaman Sebelumnya </a>
		<a class="button small radius secondary" onClick="next()" id="next"> Halaman Berikut >> </a>			
	</div>		
</body>
</html>