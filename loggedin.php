<?php
    #Site definitions
    require_once("includes/site-definitions.php");
?>

    <?php
  $bg = array('pikachu.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require_once($sitedef_bootstrapHeader); ?>
                <meta name="description" content="">
                <meta name="author" content="">
            <title>My Notes</title>
                <link rel="icon" href="/favicon.ico">
                <link rel="stylesheet" href="/styling.css">
            <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
                <style type="text/css">
                    body {
                        background: url('pikachu.jpg') no-repeat center center fixed;
                        background-size: cover;
                    }
                    
                    #notePad, #allNotes, #done {
                        display: none;
                    }
                    
                    .buttons {
                        margin-bottom: 10px;
                        
                    }
                    
                    textarea {
                        width: 100%;
                        max-width: 100%;
                        font-size: 20px;
                        border-color: #0088cc;
                        border-width: 10px;
                    }

                </style>
            
                
                <script src='https://www.google.com/recaptcha/api.js'></script>
                <!--Temporary script hard code because I dont know how to link js to html. ASK LUI  -->
                <script>function rememberMe() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}</script>
            


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
                        <a class="navbar-brand" href="https://notetaking.injabie3.moe/">Take Note</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Profile</a></li>
                            
                            <li><a href="#" data-target="#contact" data-toggle="modal">Contact Us</a></li>
                            <li class="active"><a href="#">My Notes</a></li>
                        </ul>
                        <form class="navbar-right">
                            <ul class="nav navbar-nav">
                    
                                <li><a href="#">Logged in as <b>User</b></a></li>
                            <li><a href="#">Log Out</a></li>
                        </ul>
                        </form>
                    </div>
                    <!--/.navbar-collapse -->
                </div>
            </nav>

<!--Container-->
            <div class="container">
                <div class="row">
                <div class="col-lg-13">
                    <div class="buttons">
                    <button id="addNote" type="button" class="btn btn-info btn-lg">Add Note
                        </button>
                    <button id="edit" type="button" class="btn btn-info btn-lg pull-right">Edit
                        </button>
                    <button id="done" type="button" class="btn btn-success btn-lg pull-right">Done
                        </button>
                    <button id="allNotes" type="button" class="btn btn-info btn-lg">All Notes
                        </button>
                    </div>
                </div>
                <div id="notePad">
                    <textarea rows="10"></textarea>
                </div>
                        <!--NOTES-->
                <div id="notes" class="notes">
                        <!--AJAX CALL TO PHP FILE TO RETRIEVE NOTES-->
                </div>
                
                </div>
            </div>
          



            <!--Forgot Password Modal-->
            <div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
                                        <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email">
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
                                    <a mailto:href="JoeSixPack@Sixpacksrus.com"></a>itsRinNotRen@moe.com</a> for any other inquiries.</p>
                                </div>

                                <div class="tab-pane fade active in" id="signup">
                                    <form class="form-horizontal">
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

                                            <!-- Multiple Radios (inline) -->
                                            <br>
                                            <div class="control-group">
                                                <div class="g-recaptcha" data-sitekey="6LdG2SAUAAAAAPLTUqfm-izcIYnMIT0ts9-iW5Ti" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
                                            </div>

                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="confirmsignup"></label>
                                                <div class="controls">
                                                    <center>
                                                        <button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
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
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </center>
                        </div>
                    </div>
                </div>
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
                    <form action="#" method="post" accept-charset="utf-8">
                    <div class="modal-body" style="padding: 5px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="firstname" placeholder="Firstname" type="text" required autofocus />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="lastname" placeholder="Lastname" type="text" required />
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
                    </div>
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

<!--AUDIO-->

<audio id="audio" src="soundTest.mp4" ></audio>

<script>
  function play(){
       var audio = document.getElementById("audio");
       audio.play();
                 }
   </script>

<!--TOAST-->
<div id="snackbar">Your details will be remembered!</div>


        </body>

        </html>
