<?php


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=cpit405project;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function Register($account_type, $email, $name, $password, $gender)
{


    // Database Connection
    global $pdo;


    $stmt = $pdo->prepare("insert into accounts(email,name,password,gender,account_type)
    values(:email,:name,:password,:gender,:account_type)");

    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":password", $password);
    $stmt->bindValue(":gender", $gender);
    $stmt->bindValue(":account_type", $account_type);
    $stmt->execute();

    return "Registeration Successfull";
}

function login($email, $password)
{
    global $pdo;

    $stmt = $pdo->prepare("select * from accounts where email=:email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();

    $x = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($x)) {

        if ($x['password'] == $password) {

            $_SESSION['email'] = $x['email'];
            $_SESSION['name'] = $x['name'];
            
            return TRUE;
        } else {
            return FALSE;
        }
    }
    return FALSE;
}

function createNewPost($title, $created_by, $date, $commented)
{

    global $pdo;

    $stmt = $pdo->prepare("insert into posts(title,created_by,date,commented)
    values(:title,:created_by,:date,:commented)");

    $stmt->bindValue(":title", $title);
    $stmt->bindValue(":created_by", $created_by);
    $stmt->bindValue(":date", $date);
    $stmt->bindValue(":commented", $commented);
    $stmt->execute();

    return "Posted Successfully";
}

function getAllPosts()
{
    global $pdo;
    $statement = $pdo->prepare("SELECT a.*,p.*
        FROM accounts a
        INNER JOIN posts p on a.email = p.created_by");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
