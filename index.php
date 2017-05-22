<?php
session_start();
include('connection.php');

//logout
include('logout.php');
//remember me
include('remember.php');
?>

<?php
    #Site definitions
    require_once("includes/site-definitions.php");
?>

    <?php
  $bg = array('bg-01.jpg', 'bg-02.jpg', 'bg-03.jpg', 'bg-04.jpg', 'bg-05.jpg', 'bg-06.jpg', 'bg-07.jpg' ); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require_once($sitedef_bootstrapHeader); ?>
                <meta name="description" content="">
                <meta name="author" content="">
            <title>Take Note!</title>
                <link rel="icon" href="/favicon.ico">
                <link rel="stylesheet" href="/styling.css">
            <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
                <style type="text/css">
                    body {
                        background: url(<?php echo $selectedBg; ?>) repeat;
                    }

                </style>
            
                
                <script src='https://www.google.com/recaptcha/api.js'></script>
                <!--Temporary script hard code because I dont know how to link js to html. ASK LUI  -->
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script>
            
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

//Contact us Ajax call
// Ajax Call for Contact Us Form
$("#contactusform").submit(function(event){
    
    //prevent default php processing
    event.preventDefault();
    $('#contact').modal('toggle');
    //collect user inputs
    var datatopost = $(this).serializeArray();
    //send them to login.php using AJAX
    console.log(datatopost);
    $.ajax({
        url: "contactus.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data === "success") {
             $("#snackbar").html("<div class='alert alert-success'>Your message has been successfully sent to our team!</div>");
            toast();
            } else {
                $("#snackbar").html("<div class='alert alert-danger'>"+data+"</div>");
            toast();
            }
        
        },
        error: function(data){
            
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
//forgot passform ajax call
$("#forgotpasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            $("#snackbar").html(data);
                toast();
        },
        error: function(){
            $("#snackbar").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
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
    }, 4000);
}



//REMEMBER ME
var rememberMeBoolean = false;

$('#rememberMeButton').click(function(){
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    if(rememberMeBoolean === false) {
        rememberMeBoolean = true;
        document.getElementById("rememberMe").checked = true;
        $("#snackbar").html("Your details will be remembered!");
        //Change to proper message

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
        return;
    } else if(rememberMeBoolean === true) {
        rememberMeBoolean = false;
        document.getElementById("rememberMe").checked = false;
        $("#snackbar").html("Your details will be not remembered!");
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

            
            </script>
         
            

          


        </head>

        <body>
            
            
            

            <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="https://notetaking.injabie3.moe">Take Note</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Help
        <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" data-target="#pwdModal" data-toggle="modal">Forgot Password?</a></li>
                                    <li><a id= "rememberMeButton" href="#">Remember Me</a></li>
                                </ul>
                            </li>
                            <li><a href="#" data-target="#contact" data-toggle="modal">Contact Us</a></li>
                        </ul>
                        <form class="navbar-form navbar-right" method="post" id="signinform">
                            <fieldset>
                            <div class="form-group">
                                <input id="loginemail" name="loginemail" class="form-control" type="loginemail" placeholder="Email" class="input-large" required="">
                            </div>
                            <div class="form-group">
                                <input id="loginpassword" name="loginpassword" class="form-control" type="password" placeholder="Password" class="input-large" required="">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="rememberMe" id="rememberMe" style="display:none">   
                            </div>
                            <button type="submit" class="btn btn-success">Sign in</button>
                         </fieldset>
                        </form>
                    </div>
                    <!--/.navbar-collapse -->
                </div>
            </nav>

            
            
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron">
                <div class="container">
                     <!--Sticky Note for annoucements -->
            <div class="quote-container">
  <i class="pin"></i>
  <blockquote class="note yellow">
    Take Note!
 <p class="author">A simple note-taking app</p>
  </blockquote>
</div>

                    

                    <p><a class="btn btn-primary btn-lg" href="#" role="button" data-target="#myModal" data-toggle="modal">Sign up now &raquo;</a></p>
                </div>
            </div>

            <!--Forgot Password Modal-->
            <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <form method="post" id="forgotpasswordform">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">What's My Password?</h1>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          
                          <p>If you have forgotten your password you can reset it here.</p>
                            <div class="panel-body">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="E-mail Address" name="forgotemail" type="email">
                                    </div>
                                    <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
                    </form>
</div>







<!--SIGN UP FORM-->
            <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <br>
                        <div class="bs-example bs-example-tabs">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#signup" data-toggle="tab">Register</a></li>
                                <li class=""><a href="#why" data-toggle="tab">Why?</a></li>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in" id="why">
                                    <p>TakeNote will not collect any information about the visitors to the website https://notetaking.injabie3.moe </p>

                                    <br> Please contact
                                    <a mailto:href="pleaseHireMe@tooManyInstantNoodles.com"></a>pleaseHireMe@tooManyInstantNoodles.com</a> for any other inquiries.</p>
                                </div>

                                <div class="tab-pane fade active in" id="signup" style="padding:0 20px">
                                    <form class="form-horizontal" method="post" id="signupform">
                                        <fieldset>
                                            <!-- Sign Up Form -->
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="Email">Email:</label>
                                                <div class="controls">
                                                    <input id="Email" name="Email" class="form-control" type="text" placeholder="Email" class="input-large" required="">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="userid">User ID:</label>
                                                <div class="controls">
                                                    <input id="userid" name="userid" class="form-control" type="text" placeholder="User ID" class="input-large" required="">
                                                </div>
                                            </div>

                                            <!-- Password input-->
                                            <div class="control-group">
                                                <label class="control-label" for="password">Password:</label>
                                                <div class="controls">
                                                    <input id="password" name="password" class="form-control" type="password" placeholder="Password" class="input-large" required="">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <label class="control-label" for="reenterpassword">Re-Enter Password:</label>
                                                <div class="controls">
                                                    <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="Confirm Password" class="input-large" required="">
                                                </div>
                                            </div>

                                            <!-- RECAPTCHA  -->
                                            <br>
                                            <div class="control-group">
                                                <div class="g-recaptcha" data-sitekey="6LdG2SAUAAAAAPLTUqfm-izcIYnMIT0ts9-iW5Ti" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                            </div>

                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="confirmsignup"></label>
                                                <div class="controls">
                                                    <center>
                                                        <button id="confirmsignup" name="confirmsignup" class="btn btn-success" style="margin-bottom:20px">Sign Up</button>
                                                    </center>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>








<!--CONTAINERS-->
<div class="container">
    <div class="row">
     <div class="col-sm-10 col-sm-offset-1">
         <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="andrewBackground.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="andrew.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Andrew Li</h3>
                                <p class="profession">Front-end Developer</p>
                                <p class="text-center">"Some people, when confronted with a problem, think, 'I know, I'll use threads' - and then two they hav erpoblesms."</p>
                            </div>
                            <div class="footer">
                                <i class="fa fa-mail-forward"></i> UBC
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"It’s not a bug – it’s an undocumented feature."</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Skills</h4>
                                <p class="text-center">HTML, CSS, Javascript, PHP, SQL, Java, C, Learning Languages, and lots more!</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>72</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>135</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>12</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i><img src="facebook.png" width="20" height="20"></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i><img src="google.png" width="15" height="15"></a>
                                <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i><img src="github.png" width="15" height="15"></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div>
        <div class="col-md-4 col-sm-6">
             <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="luiBackground.jpg"/>
                        </div>
                        <div class="user"> 
                            <img class="img-circle" src="lui.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Injabie3</h3>
                                <p class="profession">Back-end Developer</p>
                                <p class="text-center">"In order to understand recursion you must first understand recursion."</p>
                            </div>
                            <div class="footer">
                                <i class="fa fa-mail-forward"></i> SFU
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"I’m not a nerd, I’m a specialist!"</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Skills</h4>
                                <p class="text-center">Programming, Collecting Figures, and watching Anime.</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>89</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>214</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>13</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i><img src="facebook.png" width="20" height="20"></a>
                                <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i><img src="linkedin.png" width="15" height="15"></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i><img src="sfu.jpg" width="15" height="15"></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div>
<!--         <div class="col-sm-1"></div> -->
        <div class="col-md-4 col-sm-6">
            <div class="card-container">
                <div class="card">
                    <div class="front">
                        <div class="cover">
                            <img src="rayBackground.jpg"/>
                        </div>
                        <div class="user">
                            <img class="img-circle" src="ray.jpg"/>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">Ray Low</h3>
                                <p class="profession">Full-Stack Developer</p>

                                <p class="text-center">"Java and C were telling jokes. It was C's turn, so he writes something on the wall, points to it and says "Do you get the reference?" But Java didn't."</p>
                            </div>
                            <div class="footer">
                                <div class="rating">
                                    <i class="fa fa-mail-forward"></i> SFU
                                </div>
                            </div>
                        </div>
                    </div> <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">"If at first you don't succeed; call it version 1.0."</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">Skills</h4>
                                <p class="text-center">HTML, CSS, JavaScript, PHP, SQL, Java!</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>52</h4>
                                        <p>
                                            Followers
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>132</h4>
                                        <p>
                                            Following
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>9</h4>
                                        <p>
                                            Projects
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a href="#" class="facebook"><i class="fa fa-facebook fa-fw"></i><img src="facebook.png" width="20" height="20"></a>
                                <a href="#" class="google"><i class="fa fa-google-plus fa-fw"></i><img src="google.png" width="15" height="15"></a>
                                <a href="#" class="twitter"><i class="fa fa-twitter fa-fw"></i><img src="sfu.jpg" width="15" height="15"></a>
                            </div>
                        </div>
                    </div> <!-- end back panel -->
                </div> <!-- end card -->
            </div> <!-- end card-container -->
        </div> <!-- end col-sm-3 -->
        </div> <!-- end col-sm-10 -->
    </div> <!-- end row -->
    <div class="space-200"></div>
</div>

<!--CONTACT US-->
<div class="container">
	<div class="row">
         <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Any questions? Feel free to contact us.</h4>
                    </div>
                    <form method="post" id="contactusform">
                    <div class="modal-body" style="padding: 5px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="firstname" placeholder="First name" type="text" required autofocus />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="lastname" placeholder="Last name" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="email" placeholder="E-mail" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="subject" placeholder="Subject" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="comment" required></textarea>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-footer" style="margin-bottom:-14px;">
                            <input type="submit" class="btn btn-success" value="Send"/>
                                <!--<span class="glyphicon glyphicon-ok"></span>-->
                            <input type="reset" class="btn btn-danger" value="Clear" />
                                <!--<span class="glyphicon glyphicon-remove"></span>-->
                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            

<!--FOOTER-->

            <div class="footer">
                <div class="container">
                    <p>&copy;
                        <?php $today = date("Y"); echo $today?> Take Note</p>
                </div>
            </div>
            <?php require_once($sitedef_bootstrapEnd); ?>



<!--TOAST-->
<div id="snackbar"></div>
<!--REMEMBER ME-->
        </body>

        </html>
