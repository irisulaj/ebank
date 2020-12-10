function formvalid() {
    var fname=document.getElementById("firstname").value;
    var lname=document.getElementById("lastname").value;
    var pw=document.getElementById("password").value;

    if(firstname.length<3) {
        document.getElementById("fn").innerHTML = "Name must at least contain three characters!";
        return false;
    }

    if(lastname.length<3) {
        document.getElementById("ln").innerHTML = "Lastname must at least contain three characters!";
        return false;
    }

    if(password.length<3) {
        document.getElementById("pass").innerHTML = "Password is too short!";
        return false;
    }
    
}