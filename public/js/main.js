$(document).ready(function(){
    $('.email-validation').keyup(function(){
        let email = $(this).val();
    
        console.log("Email value");
    
        let testEmail = ValidateEmail(email);
    
        if (testEmail == false) {
            $('.email-error').text('Invalid email address!');
        } else {
            $('.email-error').text('');
        }
    });
});

function ValidateEmail(email) 
{
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
       return true;
    }

    return false;
}