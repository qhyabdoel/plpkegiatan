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

			$rowlink = 0;

			foreach ($notifs as $notif) 
			{				
				$time = date('d-m-Y H:i', strtotime($notif->created_at));						

				$approver = $notif->dokumen->pelkegiatan->kegiatan->perka->jalurs->pengajuans()
				->where('jeni_id', $notif->dokumen->jeni_id)
				->where('level_id', $notif->dokumen->level->id)->first()->approver->hakakse->user->name;						

				$title = $notif->dokumen->pelkegiatan->kegiatan->title;

				$link = '/kegiatans/edit/'.$notif->dokumen->id;

				$jenis = $notif->dokumen->jeni->nama;				

				if($notif->dokumen->status==0)
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
								Dokumen <b><?php echo $jenis; ?></b> kegiatan <b><?php echo $title; ?></b> tidak disetujui oleh <b><?php echo $approver; ?></b>. 
								Klik link ini untuk memperbaikinya!
							</a>
						</td>
					</tr>
					<?php
				}
				elseif($notif->dokumen->status==1)
				{
					$row++;

					?>
					<tr>
						<td>								
							<?php echo $time; ?>								
						</td>
						<td>		
							Dokumen <b><?php echo $jenis; ?></b> kegiatan <b><?php echo $title; ?></b> telah diajukan kepada <b><?php echo $approver; ?></b>.
						</td>
					</tr>
					<?php
				}
				elseif ($notif->dokumen->status==2) 
				{
					$count = $notif->dokumen->pelkegiatan->dokumens()->where('status', 3)->count();					

					if($count==0)
					{
						$row++;

						if($rowlink==0)
						{
							$link = '/kegiatans/add/baru';

							?>
							<tr>
								<td>
									<a href=<?php echo $link; ?>>
										<?php echo $time; ?>
									</a>
								</td>
								<td>
									<a href=<?php echo $link; ?>>
										Dokumen <b><?php echo $jenis; ?></b> kegiatan <b><?php echo $title; ?></b> 
										telah disetujui oleh <b><?php echo $approver; ?></b>. 
										Klik link ini untuk membuat dokumen baru!
									</a>
								</td>
							</tr>
							<?php
						}
						else
						{
							?>
							<tr>
								<td>							
									<?php echo $time; ?>								
								</td>
								<td>									
									Dokumen <b><?php echo $jenis; ?></b> kegiatan <b><?php echo $title; ?></b> 
									telah disetujui oleh <b><?php echo $approver; ?></b>. 																			
								</td>
							</tr>
							<?php	
						}						

						$rowlink++;
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
								Dokumen <b><?php echo $jenis; ?></b> kegiatan <b><?php echo $title; ?></b> 
								telah disetujui oleh <b><?php echo $approver; ?></b>.								
							</td>
						</tr>
						<?php
					}					
				}
				elseif ($notif->dokumen->status==3) 
				{
					$row++;
					?>
					<tr>
						<td>								
							<?php echo $time; ?>								
						</td>
						<td>								
							Dokumen <b><?php echo $jenis; ?></b> kegiatan <b><?php echo $title; ?></b> 
							telah disetujui oleh <b><?php echo $approver; ?></b>. Ini berarti semua dokumen telah disetujui 
							dan anda dapat mengajukan pelaksanaan kegiatan 								
						</td>
					</tr>
					<?php	
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