$(document).ready(function()
{				
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

	$('#myModal6').bind('opened', function()
	{
		$('#pdf').hide();
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
			if(data.count=="kosong")
			{
				$('#aa').click();
			}
			else
			{				
				var varPDFKegiatan = $('#pdf').attr('data');

				if(varPDFKegiatan == "/pdf/kosong.pdf#toolbar=0&view=fitH")
				{			
					$("#getPDFKegiatanError").addClass('error');	

					$('#getSubmit').removeClass('disabled');
					$('#getSubmit').on('click', submit);
				}		
				else
				{			
					$('#setSubmit').click();	

					$('#doc2').show();
					$('#doc').hide();
				}			
			}
		});
	};		
});