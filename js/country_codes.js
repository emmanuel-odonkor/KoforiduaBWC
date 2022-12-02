$(function () {
    var code = "+233"; // Default mobile number
    $('#bf_mobile').val(code);
    $('#mobile_money_number').val(code);
    
  //  $('#bf_mobile').intlTelInput({
   //     autoHideDialCode: true,
   //     autoPlaceholder: "ON",
  //      dropdownContainer: document.body,
  //      formatOnDisplay: true,
  //      hiddenInput: "full_number",
  //      initialCountry: "auto",
  //      nationalMode: true,
  //      placeholderNumberType: "MOBILE",
  //      preferredCountries: ['US'],
   //     separateDialCode: true
  //  });

    $('#mobile_money_number').intlTelInput({
        autoHideDialCode: false,
        dropdownContainer: document.body,
        hiddenInput: "full_number",
        formatOnDisplay: true,
        separateDialCode: true

        
        
    });

});