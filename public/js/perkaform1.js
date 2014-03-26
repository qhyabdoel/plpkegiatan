$(document).ready(function()
{			
	$('#inputNamaKegiatan').focus(function()
	{
		$('#getFoundationJS').remove();
		$('.ui-autocomplete').addClass('f-dropdown');
	})		
	
	$('#inputNamaKegiatan').autocomplete(
	{	
		close : function()
		{			
			$.post('/kegiatans/nama',
			{
				nama : $('#inputNamaKegiatan').val()
			},
			function(data)
			{
				if(data.deskripsi == 'kosong')
				{					
					$('#inputDeskripsiKegiatan').prop('disabled', false);										
				}
				else
				{
					$('#inputNamaKegiatan').prop('disabled', true);
					$('#inputDeskripsiKegiatan').val(data.deskripsi);
					$('#inputNamaKegiatan').prop('disabled', false);
					$('#inputDeskripsiKegiatan').prop('disabled', true);			
				}
			});			
		}		
	});

	$('#inputNamaKegiatan').focusout(function()
	{
		$.post('/kegiatans/nama',
		{
			nama : $('#inputNamaKegiatan').val()
		},
		function(data)
		{
			if(data.deskripsi == 'kosong')
			{					
				$('#inputDeskripsiKegiatan').prop('disabled', false);						
			}
			else
			{
				$('#inputNamaKegiatan').prop('disabled', true);
				$('#inputDeskripsiKegiatan').val(data.deskripsi);
				$('#inputNamaKegiatan').prop('disabled', false);
				$('#inputDeskripsiKegiatan').prop('disabled', true);	
			}
		});		
	});

	$('#getUpload').click(function()
	{
		$('#getFile1').click();
	});

	$('#getFile1').change(function()
	{
		var ekstensiPDF = $('#getFile1').val().split('.').pop();
		if (ekstensiPDF == 'pdf')
		{
			$('#getPDFEkstensiError').removeClass('error');
			$('#setUpload').click();
			$('#postFileKegiatan').val($('#getFile1').val());
		}
		else
		{
			$('#getPDFEkstensiError').addClass('error');
		}	
	});

	$('#uploadForm').ajaxForm(function(data) 
	{ 
		$("#pdf").attr('data', '/pdf/baru.pdf#toolbar=0&view=fitH');
		$("#pdf2").attr('data', '/pdf/baru.pdf#toolbar=0&view=fitH');
		$("#getUpload").text('Upload Revisi');		
		$("#getCatatan").removeClass('error');		
		$("#getCatatanError2").removeClass('error');	
		$('#getPDFKegiatanError').removeClass('error');
	});			

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

	$('#inputNamaKegiatan').focus(function()
	{
		$('#getNamaKegiatanError').removeClass('error');
		$('#inputNamaKegiatan').removeClass('error');		
	});

	$('#inputDeskripsiKegiatan').focus(function()
	{
		$('#getDeskripsiKegiatanError').removeClass('error');
		$('#inputDeskripsiKegiatan').removeClass('error');
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

	$('#myModal6').bind('opened', function()
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

	$('#myModal6').bind('closed', function()
	{
		$('#pdf').show();

		$('#getSubmit').removeClass('disabled');
		$('#getSubmit').on('click', submit);
	});		

	$('#getSubmit').on('click', submit);

	function submit()
	{
		$('#getSubmit').addClass('disabled');
		$('#getSubmit').off('click');

		$.post('/jalurs/cek',
		{
			jeni : $('#jeni').val()
		},
		function(data)
		{
			var varNamaKegiatan = $('#inputNamaKegiatan').val();
			var varDeskripsiKegiatan = $('#inputDeskripsiKegiatan').val();
			var varPDFKegiatan = $('#pdf').attr('data');
			var varJalur = data.count;

			if(data.count=="kosong")
			{
				$('#aa').click();
			}
			else
			{
				if(varNamaKegiatan=="")
				{
					$('#inputNamaKegiatan').addClass('error');
					$("#getNamaKegiatanError").addClass('error');

					$('#getSubmit').removeClass('disabled');
					$('#getSubmit').on('click', submit);
				}	

				if(varDeskripsiKegiatan=="")
				{
					$('#inputDeskripsiKegiatan').addClass('error');
					$("#getDeskripsiKegiatanError").addClass('error');	

					$('#getSubmit').removeClass('disabled');
					$('#getSubmit').on('click', submit);
				}

				if(varPDFKegiatan == "/pdf/kosong.pdf#toolbar=0&view=fitH")
				{			
					$("#getPDFKegiatanError").addClass('error');	

					$('#getSubmit').removeClass('disabled');
					$('#getSubmit').on('click', submit);
				}		

				if(varNamaKegiatan!="" && varDeskripsiKegiatan!="" && varPDFKegiatan!="/pdf/kosong.pdf#toolbar=0&view=fitH")
				{
					$('#postNamaKegiatan').val(varNamaKegiatan);
					$('#postDeskripsiKegiatan').val(varDeskripsiKegiatan);

					$('#postTanggalAwal').val($('#startDate').val());
					$('#postTanggalAkhir').val($('#endDate').val());

					$('#setSubmit').click();	

					$('#doc').hide();
					$('#doc2').show();
				}				
			}
		});	
	}
});