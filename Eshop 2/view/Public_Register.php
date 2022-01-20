<?php
session_start();
var_dump($_SESSION);

$title = "Public Register";
include_once('include/header.php');

$error = $_SESSION["Error"];
var_dump($error);
?>

<body>
  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Teshop <span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container site">
  <h2> Connection</h2>
  <form action="../controller/Public_Register.php" method="post">
      <div class="form-group">
          <label for="pseudo">pseudo</label>
          <input type="text" name="username" require>
          <span> <?php if(isset($error["pseudo"])){echo $error["pseudo"];}?></span>
          
          <label for="mail">@Mail</label>
          <input type="mail" name="mail" require>
          <span> <?php if(isset($error["mail"])){echo $error["mail"];}?></span>
          
          <label for="name">Name</label>
          <input type="text" name="name" require>
          <span> <?php if(isset($error["name"])){echo $error["name"];}?></span>
          
          <label for="firstname">Firstname</label>
          <input type="text" name="firstname" require>
          <span> <?php if(isset($error["firstname"])){echo $error["firstname"];}?></span>
          
          <label for="bday">Birthday</label>
          <input type="date" name="bday" require>
          <span> <?php if(isset($error["bday"])){echo $error["bday"];}?></span>
        
          <label for="pass">password</label>
          <input type="password" name="pass" require>
          <span> <?php if(isset($error["pass"])){echo $error["pass"];}?></span>
          
          <label for="pass2">Confirm password</label>
          <input type="password" name="pass2" require>

      </div>

      <button type="submit" class="form-button"> Submit </button>
  </form>
  </div>
</body>
</html>