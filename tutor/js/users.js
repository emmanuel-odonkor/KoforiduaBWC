
function profilevalidation(){

	//grab username 
	var Name = document.getElementById("uid").value;


	//grab email address
	var Email = document.getElementById("eid").value;


  //grab student_ID
  var Studentid = document.getElementById("sid").value;

  //grab contact
  var Contact = document.getElementById("cid").value;



	//define regex for username 
	var TestName =  new RegExp(/[~`0-9!#$%\^&*@+=\\[\]\\';,/{}|\\":<>\?]/);

	//write an if condition to test validation
	if(TestName.test(Name)){
        //prevent form submission and alert error
        event.preventDefault();
        alert("Enter Alphabets only in the Username Section");
     
        return false;
      }


      //define regex for email address
      var EmailName =  new RegExp(/[a-z]+[.]+[a-z]*@[ashesi]+\.edu\.gh/);

      if(!EmailName.test(Email)){
        //prevent form submission and alert error
        event.preventDefault();
        alert("Enter a valid Ashesi Email Address");
     
        return false;
      }


      //define regex for student_id
      var TestSID =  new RegExp(/[~`a-zA-Z!#$%\^&*@+=\\[\]\\';,/{}|\\":<>\?]/);

  //write an if condition to test validation
  if(TestSID.test(Studentid)){
        //prevent form submission and alert error
        event.preventDefault();
        alert("Enter a valid Student ID Alphabets only in the Student ID section");
     
        return false;
      }



      var TestContact =  new RegExp(/[~`a-zA-Z!#$%\^&*@+=\\[\]\\';,/{}|\\":<>\?]/);

  //write an if condition to test validation
  if(TestContact.test(Contact)){
        //prevent form submission and alert error
        event.preventDefault();
        alert("Enter a valid Contact Details in the Contact section");
     
        return false;
      }



}

//function to validate resource topic in forms
function resourcevalidation(){

  //grab resource topic
  var Name = document.getElementById("uid").value;

  //define regex for resource topic  
  var TestName =  new RegExp(/[~`0-9!#$%\^&*@+=\\[\]\\';,/{}|\\":<>\?]/);

  //write an if condition to test validation
  if(TestName.test(Name)){
        //prevent form submission and alert error
        event.preventDefault();
        alert("Enter Alphabets only in the Resource Topic Section");
     
        return false;
      }



}

