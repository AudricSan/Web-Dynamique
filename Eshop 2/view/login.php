<?php
session_start();
var_dump($_SESSION);

$title = "Login";
include_once('../view/include/header.php');

?>

<body>
  <h1 class="text-logo">T-Shop</h1>
  <div class="container form">
  <h2> Connection</h2>
  <form action="../controller/login.php" method="post">
      <div class="form-group">
          <label for="pseudo">pseudo</label>
          <input type="text" name="pseudo" require>

          <label for="pass">password</label>
          <input type="password" name="pass" require>

          <button type="submit" class="form-button"> Submit </button>
          <a href="index.php"> Retour </a>

      </div>
  </form>
  </div>
</body>
</html>