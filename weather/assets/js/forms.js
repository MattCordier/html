$(document).ready(function() {

    $("#dp").datepicker({
        onSelect: function(dateText, inst) {
            
        },
    });

    $("#datepicker").click(function() {
        $("#dp").datepicker("show");

    });
    $('#favorite').on('click', function(){
        if ($( '#dp' ).val() === "" || $( '#address' ).val() === ""){
            alert('please select a date and location to add to your favorite\'s list');
    } else {
       
        var dpick = $( '#dp' ).val();
        var addy = $( '#address' ).val();
        var hi = $( '#hi-temp' ).text();
        var lw = $( '#lo-temp' ).text();
        var smry = $( '#summary' ).text();

        var report = {
            "dpick" : dpick,
            "addy" : addy,
            "hi" : hi,
            "lw" :lw,
            "smry" : smry
        }
        console.log(report);
        $.ajax({
            type : "POST",
            url : 'save-weather.php',
            data : report,
            success : function(data){
                $('#alert').html(data).show().delay(1750).fadeOut(); 
            }
        });
    }
    });
    $('.btn-remove').on('click', function(){
        var id = this.id;
        var tr = $(this).closest('tr');
        // alert(this.id);
        $.ajax({
            type : "POST",
            url : 'remove-forecast.php',
            data : { id : id },
            success : function(data){
                $(tr).find('td').fadeOut(1000, function(){
                    $(tr).remove();
                    alert("Forecast Removed");
                });
                
            }
        });
    })
});

function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, uid, email, password, conf) {
     // Check each field has a value
    if (uid.value == ''         || 
          email.value == ''     || 
          password.value == ''  || 
          conf.value == '') {
 
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        return false;
    }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
        form.password.focus();
        return false;
    }
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";
 
    // Finally submit the form. 
    form.submit();
    return true;
}


