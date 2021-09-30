function check() {
    var data = new Array();
    data[0] = document.getElementById('firstname').value;
    data[1] = document.getElementById('lastname').value;
    data[2] = document.getElementById('username').value;
    data[3] = document.getElementById('password').value;
    data[4] = document.getElementById('password2').value;
    data[5] = document.getElementById('email').value;
    data[6] = document.getElementById('phonenumber').value;

    var myerror = new Array();
    myerror[0] = "<span style='color: red'>What's your firstname?</span>";
    myerror[1] = "<span style='color: red'>what's your lastname?</span>";
    myerror[2] = "<span style='color: red'>Username for Login</span>";
    myerror[3] = "<span style='color: red'>You haven't entered a password</span>";
    myerror[4] = "<span style='color: red'>Password mismatch</span>";
    myerror[5] = "<span style='color: red'>You haven't entered an email</span>";
    myerror[6] = "<span style='color: red'>Password mismatch</span>";

    var nearby = new Array("z-firstname", "z-lastname", "z-username", "z-password", "z-password2", "z-email", "z-phonenumber");

    for (i in data) {
        var error = myerror[i];
        var div = nearby[i];

        if (data[i] == "") {
            document.getElementById(div).innerHTML = error;
        } else {
            document.getElementById(div).innerHTML = "";
        }
    }
}

function checkpassword() {
    var pw = document.getElementById("password").value;
    var pw2 = document.getElementById("password2").value;

    if (pw == pw2) {
        document.getElementById('z-password2').innerHTML = "";
    } else {
        document.getElementById('z-password2').innerHTML = "<span style='color: red'>* Password mismatch</span>";
    }
}

$(document).ready(function () {
    window.onscroll = function () { myFunction() };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
})
