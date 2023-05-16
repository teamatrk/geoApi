var ADDRESS = "";
$(document).ready(function(){
	$("#main_form").on('submit' , function(e){
		$("#result").addClass('d-none');
		e.preventDefault();
		var address = ADDRESS = $("#address").val();
		address = encodeURI(address);

		sendAddress(address);
	});
});


function sendAddress(address)
{
	showLoader(1);
	$.ajax({
		method: "POST",
		url: ACTION_URL,
		dataType: "json",
		data: { address: address,action:'coordinates'}
	})
	.done(function( res ) {
		showLoader(0);
		if(parseInt(res.status)==1&&Object.keys(res.data).length>0)
		{
			drawResult(res);
		}
		else
		{
			show_error();
		}
	});
}
function drawResult(res)
{
	$("#result .list").html('');
	$("#result").removeClass('d-none');
	$("#address_dispaly").text(ADDRESS);
	$.each(res.data , function(key,val){
		$("#result .list").append(getCoordinateBox(val));
	});
}
function showLoader(ref = 1)
{
	if(ref==1)
	$("#loader").removeClass('d-none');
	else
	$("#loader").addClass('d-none');
}
function getCoordinateBox(data)
{
	var boxClass = (typeof data.coordinates=="undefined")?"error":"success";
	var msg = (typeof data.coordinates=="undefined")?`<p>`+data.message+`</p>`:"";
	var coordinates = (typeof data.coordinates=="undefined")?"":`<p>`+data.coordinates.lat+` , `+data.coordinates.lng+`</p>`;
	var box = `<div class="col-md-6">
		<div class="card `+boxClass+`">
			<div class="card-body">
				<div class="card-title">`+data.api_name+`</div>
				`+msg+coordinates+`
			</div>
		</div>
	</div>`;
	return box;
}
function show_error(msg = 'Something went wrong, please try again.')
{
	$('#error_box').text(msg);
	$('#error_box').slideDown();
	setTimeout(function(){$('#error_box').slideUp();} , 5000);
}