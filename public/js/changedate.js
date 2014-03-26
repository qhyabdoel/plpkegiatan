function dp3(ev)
{
	var endD1 = $('#endDate').val();
	var endD2 = endD1.slice(0,2);
	var endD3 = endD1.slice(3,5);
	var endD4 = endD1.slice(6,10);
	var endD5 = endD4+"-"+endD3+"-"+endD2;
	var endD6 = Date.parse(endD5);
	if (ev.date.valueOf() <= endD6.valueOf()) {
	startDate = new Date(ev.date);
	var endD1b = $('#dp3').data('date');
	var endD2b = endD1b.slice(8,10);
	var endD3b = endD1b.slice(5,7);
	var endD4b = endD1b.slice(0,4);
	var endD5b = endD2b+"-"+endD3b+"-"+endD4b;
	$('#startDate').val(endD5b);
}
$('#dp3').fdatepicker('hide');
}

function dp4(ev)
{
	var endD1 = $('#startDate').val();
	var endD2 = endD1.slice(0,2);
	var endD3 = endD1.slice(3,5);
	var endD4 = endD1.slice(6,10);
	var endD5 = endD4+"-"+endD3+"-"+endD2;
	var endD6 = Date.parse(endD5);
	if (ev.date.valueOf() >= endD6.valueOf()) {
	endDate = new Date(ev.date);			
	var endD1b = $('#dp4').data('date');
	var endD2b = endD1b.slice(8,10);
	var endD3b = endD1b.slice(5,7);
	var endD4b = endD1b.slice(0,4);
	var endD5b = endD2b+"-"+endD3b+"-"+endD4b;
	$('#endDate').val(endD5b);
}
$('#dp4').fdatepicker('hide');
}

$('#dp3').fdatepicker().on('changeDate', dp3);	
$('#dp4').fdatepicker().on('changeDate', dp4);