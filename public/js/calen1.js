$(document).load(function()
{
	$(".today").html("Hello <b>world</b>!");
	$(".event").html("Hello <b>world</b>!");
});

function goLastMonth(month, year)
{
	if(month == 1) {
		--year;
		month = 13;
	}
	--month
	var monthstring= ""+month+"";				
	var monthlength = monthstring.length;				
	if(monthlength <=1){				
		monthstring = "0" + monthstring;					
	}
	$('#result').empty();
	$('#result').html('<br><br><br><br><br><img src="/img/load.gif" class="img1" id="img1">');
	$('#result').load("kalendars/kalendar?month="+monthstring+"&year="+year);	
}

function goNextMonth(month, year)
{
	if(month == 12) {
		++year;
		month = 0;
	}
	++month
	var monthstring= ""+month+"";
	var monthlength = monthstring.length;
	if(monthlength <=1){
		monthstring = "0" + monthstring;
	}
	$('#result').empty();
	$('#result').html('<br><br><br><br><br><img src="/img/load.gif" class="img1" id="img1">');
	$('#result').load("kalendars/kalendar?month="+monthstring+"&year="+year);
}

function getInfo(id)
{
	$('#result2').empty();	
	$('#result2').load("kalendars/show/"+id);	
}