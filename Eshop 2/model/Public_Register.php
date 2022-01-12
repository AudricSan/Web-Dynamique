<?php
session_start();
var_dump($_SESSION);

$title = "Admin Register";
include_once('../view/include/header.php');

$error = $_SESSION["Error"];
?>

<body>
  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Teshop <span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container site">
  <h2> Connection</h2>
  <form action="../controller/Public_Register.php" method="post">
      <div class="form-group">
          <label for="pseudo">pseudo</label>
          <input type="text" name="username" require>
          <span> <?php $error["pseudo"] ?></span>
          
          <label for="mail">@Mail</label>
          <input type="mail" name="mail" require>
          <span> <?php $error["mail"] ?></span>
          
          <label for="name">Name</label>
          <input type="text" name="name" require>
          
          <label for="firstname">Firstname</label>
          <input type="text" name="firstname" require>
          
          <label for="bday">Birthday</label>
          <input type="date" name="bday" require>
        
          <label for="pass">password</label>
          <input type="password" name="pass" require>
          
          <label for="pass2">Confirm password</label>
          <input type="password" name="pass2" require>
      </div>

      <button type="submit" class="form-button"> Submit </button>
  </form>
  </div>
</body>
</html>