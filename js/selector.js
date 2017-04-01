$(document).ready(function(){
$('#status').keyup(function(){
var len	=	$('#status').val().length;

if(len<1)
{
$('.view_status').text('Strength indicator');
$('.view_status').addClass('gray-strength');
$('.view_status').removeClass('red-strength');
$('.view_status').removeClass('orange-strength');
$('.view_status').removeClass('green-strength');
$('.view_status').removeClass('yellowgreen-strength');
}

else if(len<=4)
{
$('.view_status').text('weak');
$('.view_status').addClass('red-strength');
$('.view_status').removeClass('gray-strength');
$('.view_status').removeClass('orange-strength');;
$('.view_status').removeClass('yellowgreen-strength');
$('.view_status').removeClass('green-strength')
}

else if(len<=8)
{
$('.view_status').text('Good');
$('.view_status').addClass('orange-strength');
$('.view_status').removeClass('gray-strength');
$('.view_status').removeClass('red-strength');
$('.view_status').removeClass('yellowgreen-strength');
$('.view_status').removeClass('green-strength');
}

else if(len<=12)
{
$('.view_status').text('Strong');
$('.view_status').addClass('yellowgreen-strength');
$('.view_status').removeClass('gray-strength');
$('.view_status').removeClass('red-strength');
$('.view_status').removeClass('orange-strength');
$('.view_status').removeClass('green-strength');
}

else
{
$('.view_status').text('Very Strong');
$('.view_status').addClass('green-strength');
$('.view_status').removeClass('gray-strength');
$('.view_status').removeClass('red-strength');
$('.view_status').removeClass('orange-strength');
$('.view_status').removeClass('yellowgreen-strength');

}

});
});