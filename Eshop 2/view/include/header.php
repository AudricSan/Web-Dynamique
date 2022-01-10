<?php
    $root = $_SERVER['DOCUMENT_ROOT'] . '/Eshop 2/view/css/styles.css';
    $root = '../../../../Eshop%202/view/css/styles.css';
    // $root = urlencode($root);
    //var_dump($root);

    if(!isset($title)){
        $title = "COUCOU";
    }

echo "
<!DOCTYPE html>
<html>
    <head>
        <title> $title </title>
        <meta charset='utf-8'/>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='$root'>
    </head>
";

?>