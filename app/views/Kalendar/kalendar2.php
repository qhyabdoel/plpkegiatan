<html>
<head></head>

<body>
	<?php	
	$timezone = "Asia/Jakarta"; 
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);

	if (isset($_GET['day'])){
		$day = $_GET['day'];
	} else {
		$day = date("j");
	}
	if(isset($_GET['month'])){
		$month = $_GET['month'];
	} else {
		$month = date("n");
	}
	if(isset($_GET['year'])){
		$year = $_GET['year'];
	}else{
		$year = date("Y");
	}
	$currentTimeStamp = strtotime( "$day-$month-$year");
	$monthName = date("F", $currentTimeStamp);
	$numDays = date("t", $currentTimeStamp);
	$counter = 0;
	?>

	<div align="center">
		<table class="table-condensed">
			<tr>
				<td>
					<a class="small button round" value='<'name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)">
						&laquo;
					</a>
				</td>
				<td align="center" colspan='5'><?php echo $monthName.", ".$year; ?></td>
				<td>
					<a class="small button round" value='>'name='nextbutton' onclick ="goNextMonth(<?php echo $month.",".$year?>)">
						&raquo;
					</a>
				</td>
			</tr>	
			<tr>
				<td width='50px'>Sun</td>
				<td width='50px'>Mon</td>
				<td width='50px'>Tue</td>
				<td width='50px'>Wed</td>
				<td width='50px'>Thu</td>
				<td width='50px'>Fri</td>
				<td width='50px'>Sat</td>
			</tr>
			
			<?php
			echo "<tr>";
			for($i = 1; $i < $numDays+1; $i++, $counter++)
			{
				$timeStamp = strtotime("$year-$month-$i");
				if($i == 1) 
				{
					$firstDay = date("w", $timeStamp);
					for($j = 0; $j < $firstDay; $j++, $counter++) {
						echo "<td>&nbsp;</td>";
					}
				}
				if($counter % 7 == 0) 
				{
					echo"</tr><tr>";
				}
				$monthstring = $month;
				$monthlength = strlen($monthstring);
				$daystring = $i;
				$daylength = strlen($daystring);
				if($monthlength <= 1)
				{
					$monthstring = "0".$monthstring;
				}
				if($daylength <=1)
				{
					$daystring = "0".$daystring;
				}
				$todaysDate = date("d-m-Y");
				$dateToCompare = $daystring . '-' . $monthstring. '-' . $year;
				echo "<td align='center' ";			
				if ($todaysDate == $dateToCompare)
				{
					echo "class ='today'";			
				}
				else
				{
					$a=0;
					foreach($kalendars as $kalendar)
					{						
						$x[$a]= date("d-m-Y", strtotime($kalendar->tanggal));
						$a=$a+1;
						if (date("d-m-Y", strtotime($kalendar->tanggal))==$dateToCompare){
							echo "class ='event'";						
						}
					}
				}
				if (isset($x)) 
				{
					if (in_array($dateToCompare, $x, true)) {
						foreach($kalendars as $kalendar)
						{
							if (date("d-m-Y", strtotime($kalendar->tanggal))==$dateToCompare)
							{
								echo "><a href='#' onclick='getInfo(". $kalendar->id .")'>" .$i. "</a></td>";
							}
						}
					}else{
						echo ">".$i."</td>";
					}
				}
				else
				{
					echo ">".$i."</td>";
				}
				
			}
			echo "</tr>";
			
			?>
		</table>
	</div>
</body>
</html>