<!-- <?php

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

require_once 'db_handler.php';

$email = $_POST['email'];
$password = $_POST['password'];


$results = login($email,$password);
if($results){
    echo "Welcome Back" ;
    header('Location: index.php');
}else {
    echo "Wrong username password";
}
}
?> -->

<!DOCTYPE HMTL>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="styles-login-register.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="testbox">
        <h1>Login</h1>
        <form method="POST">

            <hr>
            <label id="icon" for="name"><img src="images/user.png" height="16px"></label>
            <input type="text" name="email" id="email" placeholder="email" required />

            <label id="icon" for="name"><img src="images/password.png" height="16px"></label>
            <input type="password" name="password" id="password" placeholder="password" required />
            <br>
            <br>

            <a href="" style="margin-left: 50px;">Forgot Your Password?</a>

            <br>
            <br>

            
           <a class="button">
               <button type="submit">Login</button>
           </a>
            <a href="register.php" class="button">Register</a>

        </form>

    </div>
</body>


</html>