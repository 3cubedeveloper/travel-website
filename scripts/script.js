function contactFormValidation() {
    let submitContactForm = document.getElementById("contact-form");
    let firstName = document.getElementById("first-name");
    let lastName = document.getElementById("last-name");
    let message = document.getElementById("message");

    submitContactForm.addEventListener('click', function() {
    
        if(firstName.value == ""){
            //alert("Please fill the first name");
            document.getElementById("first-name-error").style.visibility = "visible";
            document.getElementById("first-name-error").style.color = "red";
            return false;
        } else if (lastName == "") {
            document.getElementById("last-name-error").style.visibility = "visible";
            document.getElementById("last-name-error").style.color = "red";
            return false;
        } else if (message == "") {
            document.getElementById("message-error").style.visibility = "visible";
            document.getElementById("message-error").style.color = "red";
            return false;
        } else {
            document.getElementById("first-name-error").style.visibility = "hidden";
            document.getElementById("first-name-error").style.visibility = "hidden";
            document.getElementById("message-error").style.visibility = "hidden";
            return true;
        }
    });
}

