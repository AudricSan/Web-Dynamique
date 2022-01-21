<?php
session_start();
require '../model/function.php';
require '../model/database.php';

var_dump($_POST);

$username   = $_POST['username'];
$mail       = $_POST['mail'];
$name       = $_POST['name'];
$firstname  = $_POST['firstname'];
$bday       = $_POST['bday'];
$pass       = $_POST['pass'];
$pass2      = $_POST['pass2'];

unset($_POST); //unset Value in post

if(($username && $mail && $name && $firstname && $bday && $pass && $pass2 != '')){
    //Set Variable
        $error = array();
        var_dump($error);

        var_dump($username);
        var_dump($mail);
        var_dump($name);
        var_dump($firstname);
        var_dump($bday);
        var_dump($pass);
        var_dump($pass2);
    
    //Start Checking
        //Check Username
        if(empty($username)){
            $error['pseudo'] = "No pseudo";
        }

        if(preg_match('/[^a-zA-Z_\-0-9]/i', $username)){
            $error['pseudo'] = "No good format pseudo";
        }

        //Check Password
        if(empty($pass)){
            $error['password'] = "No password";
        }

        if($pass!=$pass2){
            $error['password'] ="Not same Password";

            goto stoppasscheck;
        }

        //check Password Format
        $error['password'] = checkPassFormat($pass);

        if(empty($error)){
            stoppasscheck:
            $url = "register.php";

            session_unset();
            $_SESSION["Error"] = $error;
            goto end;
        }


    //Check Ok
        // Create Data
        $db = Database::connect();
        $statement = $db->prepare("SELECT User_ID INTO User (User_Login = ? )");
        $statement->execute(array($username));
        $exist = $statement->fetch();
        Database::disconnect();

        if($exist != false){
            session_unset();
            $_SESSION["Error"] = "Allready Exist";
            $url = "login.php";
            goto end;
        }

        echo 'GO insert';
        //Insert Data
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO user (User_Login, User_Password, User_Name, User_FirstName, User_Bday, User_Mail) VALUES (?, ?, ?, ?, ?, ?)");

        if(isset($username) && isset($pass) && isset($name) && isset($firstname) && isset($bday) && isset($mail)){
            $statement->execute(array($username, $pass, $name, $firstname, $bday, $mail));
        }
        $user = $statement->fetch();
        Database::disconnect();
        $url = 'member/index.php';
        goto end;
}

    //END - Redirect
    $url = '../view/public_register.php';
    session_unset();
    $_SESSION['Error'] = "NO DATA";

    end:
    header("location: ../view/$url");
?>