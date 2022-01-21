<?php
session_start();
var_dump($_SESSION);

$title = "Admin Register";
include_once('include/header.php');

if (!empty($_SESSION)) {
  $error = $_SESSION["Error"];
}

?>

<body>
  <h1 class="text-logo"> T-Shop </h1>
  <div class="container form">
    <h2> Connection</h2>
    <form action="../controller/register.php" method="post">
      <div class="form-group">
        <label for="pseudo">pseudo</label>
        <input type="text" name="pseudo" require>
        <span> <?php if (isset($error["pseudo"])) { echo $error["pseudo"]; } ?></span>

        <label for="pass">password</label>
        <input type="password" name="pass" require>

        <label for="pass2">Confirm password</label>
        <input type="password" name="pass2" require>

        <span><?php if (isset($error['password'])) { if (is_array($error['password'])) { foreach ($error["password"] as $error) { echo $error; } } else { echo $error['password']; } } ?></span>

        <div class="back">
          <a class="backback" href="admin/index.php"> Retour </a>
          <button type="submit" class="form-button"> Submit </button>
        </div>

      </div>
    </form>
  </div>
</body>

</html>