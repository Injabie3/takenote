
$("#signupform").submit(function(event){
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){

                $("#snackbar").html(data);
                toast();
            }
        },
        error: function(){
            $("#snackbar").html("There was an error with the Ajax Call. Please try again later.");
            toast();
        }
    });
});

//Ajax Call for the login form
//Once the form is submitted
$("#signinform").submit(function(event){
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){

            if(data === "success"){
                console.log("(success) The data being returned is: " + data);
                window.location = "loggedin.php";
            }else{
                console.log("(failure) The data being returned is: " + data);
                $("#snackbar").html(data);
                toast();
            }
        },
        error: function(){
            $("#snackbar").html("There was an error with the Ajax Call. Please try again later.");
            toast();

        }

    });

});

function toast() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")
    //Change to proper message

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 3000);
}



//REMEMBER ME
var rememberMe = false;

$('#rememberMe').click(function(){
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    if(rememberMe === false) {
        rememberMe = true;
        $("#snackbar").html("Your details will be remembered!");
        //Change to proper message

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
        return;
    } else if(rememberMe === true) {
        rememberMe = false;
        $("#snackbar").html("Your details will be dsaf dsf anot remembered!");
        //Change to proper message

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
        return;
    }

});
