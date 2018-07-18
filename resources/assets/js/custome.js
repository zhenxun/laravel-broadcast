$(document).ready(function(){
  console.log($('.card-body-message')[0].scrollHeight);
  $('.card-body-message').scrollTop($('.card-body-message')[0].scrollHeight);

});