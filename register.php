<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){

require_once 'db_handler.php';

$account_type = $_POST['account_type'];
$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];
$gender = $_POST['gender'];

$results = Register($account_type,$email,$name,$password,$gender);

}

?>
<!DOCTYPE HMTL>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet'
        type='text/css'>
    <link href="styles-login-register.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="testbox">
        <h1>Registration</h1>
        <form method="POST">

            <hr>
            <div class="accounttype">

                <input type="radio" value="student" id="radio_one" name="account_type" checked />
                <label for="radio_one" class="radio">Student</label>

                <input type="radio" value="commite" id="radio_two" name="account_type" />
                <label for="radio_two" class="radio">Comitte</label>

            </div>
            <hr>

            <label id="icon" for="name"><img src="images/email.png" height="16px"></label>
            <input type="text" name="email" id="email" placeholder="Email" required />

            <label id="icon" for="name"><img src="images/user.png" height="16px"></label>
            <input type="text" name="name" id="name" placeholder="Name" required />

            <label id="icon" for="name"><img src="images/password.png" height="16px"></label>
            <input type="password" name="password" id="password" placeholder="Password" required />

            <hr>

            <div class="gender">

                <input type="radio" value="Male" id="male" name="gender" checked />
                <label for="male" class="radio" chec>Male</label>

                <input type="radio" value="Female" id="female" name="gender" />
                <label for="female" class="radio">Female</label>

            </div>

            <a class="button">
               <button type="submit">Register</button>
           </a>


            <?php
            
            if(isset($results)){
                echo $results;
            }
            
            ?>
        </form>

        <a href="login.php" class="button">Login</a>
    </div>
</body>

</html>