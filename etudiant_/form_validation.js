function validateNames(in_,inmsg){
    var regex = new RegExp('^([a-zA-Z]{1,}( |-)?)+[a-zA-Z]{1,}$','g');
    var txt = document.getElementById(in_).value;
    if(regex.test(txt) == true)
    {
        document.getElementById(in_).setAttribute("class","form-control is-valid");
        document.getElementById(inmsg).innerHTML = "format respecte";   
        document.getElementById(inmsg).setAttribute("class","valid-feedback");   
    }
    else
    {
        document.getElementById(in_).setAttribute("class","form-control is-invalid");
        document.getElementById(inmsg).innerHTML = "lettre majuscule et minuscule, espace et -";   
        document.getElementById(inmsg).setAttribute("class","invalid-feedback");   
    }
}

function validateEmail(in_,inmsg){
    var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var txt = document.getElementById(in_).value;
        if(regex.test(txt) == true)
        {
            document.getElementById(in_).setAttribute("class","form-control is-valid");
            document.getElementById(inmsg).innerHTML = "format respecte";   
            document.getElementById(inmsg).class = "valid-feedback";   
        }
        else
        {
            document.getElementById(in_).setAttribute("class","form-control is-invalid");
            document.getElementById(inmsg).innerHTML = "doit comporter @ et .com";   
            document.getElementById(inmsg).setAttribute("class","invalid-feedback");   
        }
}

function validatePassword(in1,in1msg){
    var regex = new RegExp('^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])\\w{9,}$','g');

    var txt = document.getElementById(in1).value;
    if(regex.test(txt) == true)//password is valid
    {
        document.getElementById(in1).setAttribute("class","form-control is-valid");
        document.getElementById(in1msg).innerHTML = "format respecte";     
        document.getElementById(in1msg).setAttribute("class","valid-feedback");   
    }
    else//password is in valid
    {
        document.getElementById(in1).setAttribute("class","form-control is-invalid");
        document.getElementById(in1msg).innerHTML = "9 - 12 charactere, 1 majuscule et 1 nombre 0 - 9";
        document.getElementById(in1msg).setAttribute("class","invalid-feedback");
    }
}

function validateCheckBox(in1,in2)
{
if(document.getElementById(in1).checked == true)
{
    document.getElementById(in2).checked = false;
}
if(document.getElementById(in2).checked == true)
{
    document.getElementById(in1).checked = false;
}
}

function validatePasswords(in1,in2,in2msg){
    var str1 = document.getElementById(in1).value;
    var str2 = document.getElementById(in2).value;
    if(str1.localeCompare(str2) == 0)
    {
        document.getElementById(in2).setAttribute("class","form-control is-valid");
        document.getElementById(in2msg).innerHTML = "les mots de passe concordent";
        document.getElementById(in2msg).setAttribute("class","valid-feedback");
    }
    else
    {
        document.getElementById(in2).setAttribute("class","form-control is-invalid");
        document.getElementById(in2msg).innerHTML = "les mots de passe ne concordent pas";
        document.getElementById(in2msg).setAttribute("class","invalid-feedback");
    }
}