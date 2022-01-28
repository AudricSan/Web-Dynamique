<?php
session_start();
// var_dump($_SESSION);

$title = "Public Register";
include_once('include/header.php');

if(isset($_SESSION['Error'])){
$error = $_SESSION["Error"];
}else{
  $error="";
}
// var_dump($error);
?>

<body>
  <h1 class="text-logo"> T-Shop </h1>
  <div class="container form">
  <h2> Inscription </h2>
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

          <div class="back">
            <a href="index.php"> Retour </a>
            <button type="submit" class="form-button"> Submit </button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>