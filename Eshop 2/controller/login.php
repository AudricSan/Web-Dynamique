<?php
session_start();
require '../model/function.php';
require '../model/database.php';

if(($_POST['pseudo'] && $_POST['pass'] != '')){
    //Set Variable
        $error = array();

        $pseudo = $_POST['pseudo'];
        $password = $_POST['pass'];

        // var_dump($pseudo);
        // var_dump($password);
        // var_dump($_POST);

        unset($_POST); //unset Value in post


    //Check Ok
        // Create Data
        $db = Database::connect();
        $statement = $db->prepare("SELECT * from admin where Admin_Login = ?");
        $statement->execute(array($pseudo));
        $existAdmin = $statement->fetch();

        // var_dump($existAdmin);
        $adminInfo = $existAdmin;

        var_dump($adminInfo);
        if ($adminInfo != false){
            // var_dump($adminInfo);
            // var_dump($adminInfo['0']);
            // var_dump($adminInfo['1']);
            // var_dump($adminInfo['2']);
            // var_dump($adminInfo['Admin_ID']);
            // var_dump($adminInfo['Admin_Login']);
            // var_dump($adminInfo['Admin_Password']);

            if($password == $adminInfo['Admin_Password']){
                session_unset();
                $_SESSION['AdminConnect'] = 1;
                $url = 'admin/index.php';
                $error = '';
                $_SESSION['Error'] = $error;

                $db = Database::disconnect();
                goto end;
            }

            session_unset();
            $error = 'LOGIN OR PASSWORD INCORECT';
            $_SESSION['Error'] = $error;
            $url = 'login.php';

            $db = Database::disconnect();
            goto end;
        }

        $statement = $db->prepare("SELECT * from user where User_Login = ?");
        $statement->execute(array($pseudo));
        $existUser = $statement->fetch();

        $userInfo = $existUser;
        var_dump($userInfo);

        if($userInfo != false){
            // var_dump($userInfo);
            // var_dump($userInfo['0']);
            // var_dump($userInfo['1']);
            // var_dump($userInfo['2']);
            // var_dump($userInfo['User_ID']);
            // var_dump($userInfo['User_Login']);
            // var_dump($userInfo['User_Password']);

            if($password == $userInfo['User_Password']){
                session_unset();
                $_SESSION['UserConnected'] = 1;
                $_SESSION['UserID'] = $userInfo['User_ID'];

                $url = 'index.php';
                $error = '';
                $_SESSION['Error'] = $error;

                $db = Database::disconnect();
                goto end;
            }
        }

        session_unset();
        $error = 'LOGIN OR PASSWORD INCORECT';
        $_SESSION['Error'] = $error;
        $url = 'login.php';
}

    //END - Redirect
    session_unset();
    $error = 'LOGIN OR PASSWORD INCORECT';
    $_SESSION['Error'] = $error;
    $url = 'login.php';

    end:
    header("location: ../view/$url");
?>