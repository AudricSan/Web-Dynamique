<?php
session_start();
var_dump($_SESSION);

$title = "Login";
include_once('../view/include/header.php');
?>

<body>
  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Teshop <span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container site">
  <h2> Connection</h2>
  <form action="#" method="post">
      <div class="form-group">
          <label for="pseudo">pseudo</label>
          <input type="text" name="username" require>

          <label for="pass">password</label>
          <input type="password" name="pass" require>
      </div>

      <button type="submit" class="form-button"> Submit </button>
  </form>
  </div>
</body>
</html>