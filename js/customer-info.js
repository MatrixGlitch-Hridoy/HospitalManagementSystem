function myFunction() {

    //Name
    var name = document.getElementById("cName").value;


    if (name == null || name == "") {
        alert("Name can't be blank");
    }

    // Email

    var email = document.getElementById("cEmail").value;

    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
        console.log("Valid Email");
    } else if (email == null || email == "") {
        alert("Email can't be blank");

    } else
        alert("You have entered an invalid email address!")

    //Mobile No

    var mobile = document.getElementById("cMobile").value;

    if (/^(?:\+88|88)?(01[3-9]\d{8})$/.test(mobile)) {
        console.log("Valid mobile");
    } else if (mobile == null || mobile == "") {
        alert("Mobile number can't be blank");

    } else
        alert("invalid number!")


    //Address

    var address = document.getElementById("cAddress").value;

    if (name == null || name == "") {
        alert("Address can't be blank");

    }

    var city = document.getElementById("cCity").value;

    if (name == null || name == "") {
        alert("City can't be blank");

    }
}