//function to validate form details
function uservalidation(){

    
    $("#submit").on("click", function () {

        //Validation for Section 1 Source/Destination Country
        var transfer_type = document.getElementById("transfer_type")
    
        if(transfer_type.value == "" )
        {
            event.preventDefault();
            $("#trans_type_alert").show();
            return false;
        }

        var transfer_purpose = document.getElementById("transfer_purpose")

        if(transfer_purpose.value == "" )
        {
            event.preventDefault();
            $("#trans_purpose_alert").show();
            return false;
        }

        var income = document.getElementById("income")

        if(income.value == "" )
        {
            event.preventDefault();
            $("#income_alert").show();
            return false;
        }


        var WordsTest =  new RegExp(/[~`0-9!#$%\^&*@+=\\[\]\\';,/{}|\\":<>\?]/);
        var NumbersTest =  new RegExp(/[~`a-zA-Z!#$%\^&*@+=\\[\]\\';,/{}|\\":<>\?]/);

        //Sender Details Validation
        var sender_f = document.getElementById("fid")
        var sender_l = document.getElementById("lid")
        var sender_c = document.getElementById("txtPhone")

        if(sender_f.value == "" || sender_l.value == ""){
            event.preventDefault();
            $("#sender_flalert").show();
            return false;
        }

        if(WordsTest.test(sender_f.value) || WordsTest.test(sender_l.value)){
            event.preventDefault();
            $("#sender_flregexalert").show();
            return false;
        }

        if(NumbersTest.test(sender_c.value)){
            event.preventDefault();
            $("#sender_cregexalert").show();
            return false;
        }

        if(sender_c.value == ""){
            event.preventDefault();
            $("#sender_calert").show();
            return false;
        }


        //Beneficiary Details Validation
        var beneficiary_f = document.getElementById("fid1")
        var beneficiary_l = document.getElementById("lid2")
        var beneficiary_m = document.getElementById("mid")
        var beneficiary_c = document.getElementById("txtPhone1")
        var beneficiary_address = document.getElementById("aid")
        var beneficiary_city = document.getElementById("cid")
        var beneficiary_state = document.getElementById("sid")
     
        if(beneficiary_f.value == "" || beneficiary_l.value == ""){
            event.preventDefault();
            $("#beneficiary_flalert").show();
            return false;
        }

        if(WordsTest.test(beneficiary_f.value) || WordsTest.test(beneficiary_l.value) || WordsTest.test(beneficiary_m.value) ){
            event.preventDefault();
            $("#beneficiary_flmregexalert").show();
            return false;
        }

        if(NumbersTest.test(beneficiary_c.value)){
            event.preventDefault();
            $("#beneficiary_cregexalert").show();
            return false;
        }

        if(beneficiary_c.value == ""){
            event.preventDefault();
            $("#beneficiary_calert").show();
            return false;
        }

        if(beneficiary_address.value == "" || beneficiary_city.value == ""){
            event.preventDefault();
            $("#beneficiary_acalert").show();
            return false;
        }

        if(WordsTest.test(beneficiary_city.value) || WordsTest.test(beneficiary_state.value)){
            event.preventDefault();
            $("#beneficiary_csregexalert").show();
            return false;
        }


        //Transaction Details Validation
        var source_amt = document.getElementById("s_amountid")
        var destination_amt = document.getElementById("d_amountid")
        var transaction_c = document.getElementById("txtPhone2")
        var momo_network = document.getElementById("momo_net")

        if(source_amt.value == "" || destination_amt.value == ""){
            event.preventDefault();
            $("#transaction_sdalert").show();
            return false;
        }

        if(NumbersTest.test(source_amt.value) || NumbersTest.test(destination_amt.value)){
            event.preventDefault();
            $("#transaction_sdregexalert").show();
            return false;
        }


        if(NumbersTest.test(transaction_c.value)){
            event.preventDefault();
            $("#transaction_mregexalert").show();
            return false;
        }

        if(transaction_c.value == ""){
            event.preventDefault();
            $("#transaction_malert").show();
            return false;
        }
      
    
        if(momo_network.value == "" )
        {
            event.preventDefault();
            $("#transaction_mlalert").show();
            return false;
        }












    
        
    
    });

}







