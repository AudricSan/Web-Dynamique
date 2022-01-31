<?php
session_start();
session_unset();
// var_dump($_SESSION);

header("location: ../view/index.php");
?>