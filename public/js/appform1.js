$(document).ready(function()
{
	$('#getbuton').click(function()
	{
		var varCatatan = $('#getCatatan').val();
		var varPdf = $('#pdf').attr('data');				
		var varId = $('#getDokumenId').val();

		if (varPdf != "/pdf/kosong.pdf#toolbar=0&view=fitH")
		{
			if (varCatatan=="")
			{
				$('#getCatatan').addClass('error');
				$('#getCatatanError').addClass('error');				
			}
			else
			{
				$.post('/catatans/add', 
				{
					catatan : varCatatan,
					id : varId
				}, 
				function(data){					

					var a = "<h6>"+data.user_name+", "+data.waktu+"</h6>";
					var b = $(a).addClass("subheader cat2");

					var a2 = "<p>"+data.getCatatan+"</p>";				
					var b2 = $(a2).addClass("cat");

					var b3 = "<hr />";				

					$(b3).prependTo("#catatan2").hide().fadeIn();
					$(b2).prependTo("#catatan2").hide().fadeIn();
					$(b).prependTo("#catatan2").hide().fadeIn();

				});

				$('#getCatatan').val("");
				$('#getCatatan').removeClass('error');
				$('#getCatatanError').removeClass('error');				
			}					
		}
		else
		{
			$('#getCatatan').addClass('error');
			$("#getCatatanError2").addClass('error');			
		}
	});

	$('#getCatatan').focus(function()
	{				
		$('#getCatatanError').removeClass('error');
		$('#getCatatan').removeClass('error')							
	});

	$('#myModal2').bind('opened', function() 
	{
		$('#pdf').hide();
	});

	$('#myModal3').bind('opened', function() 
	{
		$('#pdf').hide();
	});

	$('#myModal4').bind('opened', function()
	{
		$('#pdf').hide();
	});

	$('#myModal2').bind('closed', function() 
	{
		$('#pdf').show();
	});

	$('#myModal3').bind('closed', function() 
	{
		$('#pdf').show();
	});

	$('#myModal4').bind('closed', function()
	{
		$('#pdf').show();
	});

	$(':radio').change(function()
	{
		$('#getFSStatusError').removeClass('fset1');
		$('#getFSStatusError').removeClass('error');
		$('#getStatusError').removeClass('error');
	});

	$('#getApprove').click(function()
	{
		var varStatus = $('#status:checked').val();		

		if(varStatus===undefined)
		{
			$('#getFSStatusError').addClass('fset1');
			$('#getFSStatusError').addClass('error');
			$('#getStatusError').addClass('error');
		}
		else
		{			
			$('#doc').hide();
			$('#doc2').show();

			$('#setSubmit').click();
		}
	});	

	$('#getDownload').click(function()
	{
		var varPdf = $('#pdf').attr('data');
		var varPdf2 = varPdf.split('/');
		var varPdf3 = varPdf2[2].split('.');				

		$('#inputDownload').val(varPdf3[0]);
		$('#postDownload').click();		
	});	

	function bulan(b)
	{
		if(b=='01')
		{
			bIndo = 'Januari';
		}
		else if(b=='02')
		{
			bIndo = 'Februari';
		}
		else if(b=='03') 
		{
			bIndo = 'Maret';
		}
		else if(b=='04')
		{
			bIndo = 'April';
		}
		else if(b=='05')
		{
			bIndo = 'Mei';
		}
		else if(b=='06')
		{
			bIndo = 'Juni'
		}
		else if(b=='07')
		{
			bIndo = 'Juli'
		}
		else if(b=='08')
		{
			bIndo = 'Agustus'
		}
		else if(b=='09')
		{
			bIndo = 'Septmeber'
		}
		else if(b=='10')
		{
			bIndo = 'Oktober'
		}
		else if(b=='11')
		{
			bIndo = 'November'
		}
		else if(b=='12')
		{
			bIndo = 'Desember'
		}

		return bIndo;
	}

	var awal = $('#awal').text().slice(1);
	var hAwal = awal.slice(9,11);
	var bAwal = awal.slice(6,8);
	var tAwal = awal.slice(1,5);
	$('#awal').text(': '+hAwal+' '+bulan(bAwal)+' '+tAwal);

	var akhir = $('#akhir').text().slice(1);
	var hAkhir = akhir.slice(9,11);
	var bAkhir = akhir.slice(6,8);
	var tAkhir = akhir.slice(1,5);
	$('#akhir').text(': '+hAkhir+' '+bulan(bAkhir)+' '+tAkhir);
});