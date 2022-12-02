//remitter section (Mobile number)
const rm_mobile = document.querySelector("#rm_mobile");
const rm_mobile_input = window.intlTelInput(rm_mobile, {preferredCountries: [ "gh", "gb" ]});

$(document).ready(function() {
$('.rm_number').click(function() { 
  var countryCode = $('.rm_number .iti__selected-flag').attr('title');
  var countryCode = countryCode.replace(/[^0-9]/g,'');
  $('#rm_mobile').val("");
  $('#rm_mobile').val("+"+countryCode+ $('#rm_mobile').val());
});
});

//beneficiary section (Telephone number)
const bf_mobile = document.querySelector("#bf_mobile");
const bf_mobile_input = window.intlTelInput(bf_mobile, {preferredCountries: [ "gh", "gb" ]});

$(document).ready(function() {
$('.bf_number').click(function() { 
  var countryCode = $('.bf_number .iti__selected-flag').attr('title');
  var countryCode = countryCode.replace(/[^0-9]/g,'');
  $('#bf_mobile').val("");
  $('#bf_mobile').val("+"+countryCode+ $('#bf_mobile').val());
});
});

//transaction section (Mobile money number)
const tr_mobile = document.querySelector("#mobile_money_number");
const tr_mobile_input = window.intlTelInput(tr_mobile, {preferredCountries: [ "gh", "gb" ]});

$(document).ready(function() {
$('.mobile_money').click(function() { 
  var countryCode = $('.mobile_money .iti__selected-flag').attr('title');
  var countryCode = countryCode.replace(/[^0-9]/g,'');
  $('#mobile_money_number').val("");
  $('#mobile_money_number').val("+"+countryCode+ $('#mobile_money_number').val());
});
});