$(function()
{

  //Get api key
  key=$('#secret').val();

  //Collect Wallet Amount

  $.get( "http://localhost/payment_gateway/php/api/v1/getamount.php?key="+key, function( data ) {
  $('.balance').text(data.wallet);
},'json');

//collect transactions
$.get("http://localhost/payment_gateway/php/api/v1/transactions.php?key="+key
, function( data ) {

  $.each(data, function(key,value) {
     $('.transaction').append(value[0]+"----->"+value[1]+"----->"+value[5]+"<br>");
  console.log(value);
  });
},'json');





$('.refund-submit').click(function(){

  //Refund
  var to=$('.refund_to').val();
  var amount=$('.refund_amount').val();

  $.get("http://localhost/payment_gateway/php/api/v1/refund.php?key="+key+"&to="+to+"&amount="+amount
  , function( data ) {
  alert('Refunded');
  },'json');
});

});
