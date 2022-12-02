window.onload = function () {
    //Reference the DropDownList.
    var ddlYears = document.getElementById("card_expiry_year");

    //Determine the Current Year.
    var currentYear = (new Date()).getFullYear();


    //Loop and add the Year values to DropDownList.
    for (var i = currentYear; i <= 2050; i++) {
        var option = document.createElement("OPTION");
        option.innerHTML = i;
        option.value = i;
        ddlYears.appendChild(option);
        
    }
};