<?php
    session_start();
    $root = $_SESSION['root'];
    $sharable = $_GET['sharable'];
    
    if(!isset($sharable)){
        $sharable = false;
    }

    $text = "des super Tshirt sur npotre site internet => "; 
    $sitename = "T-shop.com";

    $twitter = "https://twitter.com/intent/tweet?text=";

    switch($sharable){
        case "twitter":
            header("location: $twitter$text$sitename");
            break;

        case false:
        default:
            $_SESSION['error'] = 'No Sharable';
            header("location: $root" . "view");
    }
?>