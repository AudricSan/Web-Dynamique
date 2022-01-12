<?php
require('../model/function.php');

if(!empty($_POST)){
    //Set Variable
        $error = array();

        $username = $_POST['username'];
        $email = $_POST['mail'];
        $password = $_POST['pass'];
        $confirmpassword = $_POST['pass2'];

        unset($_POST); //unset Value in post
    //Start Checking
        //Check Username
            if(empty($username)){
                $error['username'] = "No username";
            }

            if(preg_match('/[^a-zA-Z_\-0-9]/i', $username)){
                $error['username'] = "No good format Username";
            }

        //Check Email
            if(empty($email)){
                $error['email'] = "No email";
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = "No good format email";
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

        stoppasscheck:
    
    var_dump($error);
}
?>