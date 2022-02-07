<?php
session_start();
require '../model/function.php';
require '../model/database.php';

if(($_POST['pseudo'] && $_POST['pass'] && $_POST['pass2'] != '')){
    //Set Variable
        $error = array();

        $username = $_POST['pseudo'];
        $password = $_POST['pass'];
        $confirmpassword = $_POST['pass2'];

        unset($_POST); //unset Value in post
    
    //Start Checking
        //Check Username
        if(empty($username)){
            $error['pseudo'] = "No pseudo";
        }

        if(preg_match('/[^a-zA-Z_\-0-9]/i', $username)){
            $error['pseudo'] = "No good format pseudo";
        }

        //Check Password
        if(empty($password)){
            $error['password'] = "No password";
        }

        if($password!=$confirmpassword){
            $error['password'] ="Not same Password";

            goto stoppasscheck;
        }

        //check Password Format
        $error['password'] = checkPassFormat($password);

        if(empty($error)){
            stoppasscheck:
            $url = "register.php";

            session_unset();
            $_SESSION["Error"] = $error;
            goto end;
        }

    //Check Ok
        // Create Data
        $Admin_Login = $username;
        $Admin_Password = $password;

        $db = Database::connect();
        $statement = $db->prepare("SELECT Admin_ID INTO admin (Admin_Login = ? )");
        $statement->execute(array($Admin_Login));
        $exist = $statement->fetch();
        Database::disconnect();

        if($exist != false){
            session_unset();
            $_SESSION["Error"] = "Allready Exist";
            $url = "login.php";
            goto end;
        }

        //Insert Data
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO admin (Admin_Login, Admin_Password) VALUES (?, ?)");

        if(isset($Admin_Login) && isset($Admin_Password)){
            $statement->execute(array($Admin_Login, $Admin_Password));
        }

        $admin = $statement->fetch();
        Database::disconnect();
        $url = 'login.php';
        goto end;
}



    //END - Redirect
    $url = '../view/register.php';
    session_unset();
    $_SESSION['Error'] = "NO DATA";

    end:
    header("location: ../view/$url");
?>