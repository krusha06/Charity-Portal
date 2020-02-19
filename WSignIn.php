<?php
// Start the session
session_start();

echo '<script type="text/javascript">
window.alert("Invalid UserID.")
</script>';
?>
<!DOCTYPE>
<html>

<head>
    <title>Sign In-Charity Portal</title>
    <link rel="shortcut icon" href="Image/Logo.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="SignIn.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

    <div class="header">
        <font style="color:white">a</font>
        <div class="email">
            &nbsp;&nbsp;
            <b>
            <a class="email" style="text-decoration:none" href="https://accounts.google.com/signin/v2/identifier?hl=en&continue=https%3A%2F%2Fmail.google.com%2Fmail&service=mail&flowName=GlifWebSignIn&flowEntry=AddSession">
                <i style="color:rgb(255, 107, 8);"class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;ladupatel450@gmail.com &nbsp;&nbsp;|&nbsp;&nbsp;
            </a>
            <i style="color:rgb(255, 107, 8);" class="glyphicon glyphicon-phone"></i>  7600098838
            </b>
        </div>
    </div>

    <div class="box">
        <div class="login">
            <font class="title">
                <a class="titlebar" style="text-decoration: none;" href="index.html">
                    <font style="color:rgb(188, 6, 212)">C</font>harity
                    <font style="color:rgb(255, 51, 15)">P</font>ortal
                </a>
            </font>
            <br><br>
            <font class="title2">
                Sign in
            </font>
            <br>
            <font class="title3">
                to continue to Charity Portal
            </font>
            <br><br>
            <br>
            <form method="POST" action="UserID.php">
                <input class="login" type="text" name="uid" placeholder="Enter your User-ID" required/>
                <br><br><br>
                <p style="font-family: RobotoB;float: left;">
                    <a class="login" style="text-decoration: none; " href="SignUp.html">
                    not Registered yet?<br> Sign Up Now
                    </a>
                </p>
                <p style="float: right;">
                    <input class="submit" type="submit" value="Next" />
                </p>
                <br><br>
            </form>

        </div>
    </div>



</body>

</html>