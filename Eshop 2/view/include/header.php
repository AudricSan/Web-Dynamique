<?php
    // var_dump($_SERVER);
    $root = 'http://' . $_SERVER['HTTP_HOST'] . '/Eshop%202/';
    $_SESSION['root'] = $root;
    // var_dump($root);
    $cssStyle = $root . 'view/css/styles.css';
    $cssForms = $root . 'view/css/forms.css';
    $cssAdmin = $root . 'view/css/admin.css';
    $cssUser = $root . 'view/css/user.css';
    $cssView = $root . 'view/css/view.css';
    $cssEdit = $root . 'view/css/edit.css';
    $cssDelete = $root . 'view/css/delete.css';
    $cssFooter = $root . 'view/css/footer.css';
    // $root = urlencode($root);
    // var_dump($root);
    // var_dump($_SERVER);

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
        <link rel='stylesheet' href='$cssStyle'>
        <link rel='stylesheet' href='$cssForms'>
        <link rel='stylesheet' href='$cssAdmin'>
        <link rel='stylesheet' href='$cssUser'>
        <link rel='stylesheet' href='$cssView'>
        <link rel='stylesheet' href='$cssEdit'>
        <link rel='stylesheet' href='$cssDelete'>
        <link rel='stylesheet' href='$cssFooter'>
    </head>
";

?>