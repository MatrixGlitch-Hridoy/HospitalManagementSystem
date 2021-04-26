function Patientvalidate() {
    var name = document.forms["patientform"]["username"].value;
    if(name==""){
      alert("Please enter the name");
      return false;
    }
    if(name.length < 4)
    {
      alert("atleast 4 charecter");
      return false;
    }
    else{
      var re = /^[a-zA-Z ]*$/;
      var x=re.test(name);
      if(x){
      }
      else{
        alert("Only letter allowed");
        return false;
      } 
    }  
    var email = document.forms["patientform"]["email"].value;
    if(email=="")
    {
      alert("Please enter email");
      return false;
    }
    else{
      var re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/;
      var x=re.test(email);
      if(x){
      }
      else{
        alert(" Invalid email format");
        return false;
      }
    }

    var password = document.forms["patientform"]["password"].value;
    if(password==""){
      alert("Please enter password");
      return false;
    }
    if(password.length < 6)
    {
      alert("atleast 6 charecter");
      return false;
    }
    else{
      var pass = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/;
      var x=pass.test(password);
      if(x){
      }
      else{
        alert("password does not meet the requirements\nmust contain @,$,%,*[1-9][A-z]");
        return false;
      } 
    }
    var passwordconf = document.forms["patientform"]["passwordConf"].value;
    if(password!=passwordconf)
    {
      alert("Password didn't match");
      return false;
    }
}
function doctorvalidate() {
  var name = document.forms["doctorform"]["username"].value;
  if(name==""){
    alert("Please enter the name");
    return false;
  }
  if(name.length < 4)
  {
    alert("atleast 4 charecter");
    return false;
  }
  else{
    var re = /^[a-zA-Z ]*$/;
    var x=re.test(name);
    if(x){
    }
    else{
      alert("Only letter allowed");
      return false;
    } 
  }  
  var email = document.forms["doctorform"]["email"].value;
  if(email=="")
  {
    alert("Please enter email");
    return false;
  }
  else{
    var re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/;
    var x=re.test(email);
    if(x){
    }
    else{
      alert(" Invalid email format");
      return false;
    }
  }
  var phone = document.forms["doctorform"]["phone"].value;
  if(phone.length!=11 )
  {
    alert("Not a valid phone Number");
    return false;
  }
  else{
    var re = /[0-9]/;
    var x=re.test(phone);
    if(x){
    }
    else{
      alert("Only number allowed");
      return false;
    } 
  }
  var password = document.forms["doctorform"]["password"].value;
  if(password==""){
    alert("Please enter password");
    return false;
  }
  if(password.length < 6)
  {
    alert("atleast 6 charecter");
    return false;
  }
  else{
    var pass = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/;
    var x=pass.test(password);
    if(x){
    }
    else{
      alert("password does not meet the requirements\nmust contain @,$,%,*[1-9][A-z]");
      return false;
    } 
  }

}
function Pharmacistvalidate() {
  var name = document.forms["pharmacistform"]["username"].value;
  if(name==""){
    alert("Please enter the name");
    return false;
  }
  if(name.length < 4)
  {
    alert("atleast 4 charecter");
    return false;
  }
  else{
    var re = /^[a-zA-Z ]*$/;
    var x=re.test(name);
    if(x){
    }
    else{
      alert("Only letter allowed");
      return false;
    } 
  }  
  var email = document.forms["pharmacistform"]["email"].value;
  if(email=="")
  {
    alert("Please enter email");
    return false;
  }
  else{
    var re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/;
    var x=re.test(email);
    if(x){
    }
    else{
      alert(" Invalid email format");
      return false;
    }
  }
  var phone = document.forms["pharmacistform"]["phone"].value;
  if(phone.length!=11 )
  {
    alert("Not a valid phone Number");
    return false;
  }
  else{
    var re = /[0-9]/;
    var x=re.test(phone);
    if(x){
    }
    else{
      alert("Only number allowed");
      return false;
    } 
  }

  var password = document.forms["pharmacistform"]["password"].value;
  if(password==""){
    alert("Please enter password");
    return false;
  }
  if(password.length < 6)
  {
    alert("atleast 6 charecter");
    return false;
  }
  else{
    var pass = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/;
    var x=pass.test(password);
    if(x){
    }
    else{
      alert("password does not meet the requirements\nmust contain @,$,%,*[1-9][A-z]");
      return false;
    } 
  }

}