<?php
session_start();
require '../model/database.php';
// var_dump($_SESSION);

if (!isset($_SESSION['UserConnected'])) {
  header("Location: ../view/login.php");
};

if ($_SESSION['UserConnected'] != 1) {
  header("Location: ../view/login.php");
}

$userId = $_SESSION['UserID'];
// var_dump($userId);

$db = Database::connect();
$statement = $db->prepare('SELECT * FROM user WHERE User_ID = ?');
$statement->execute(array($userId));
$user = $statement->fetch();

// var_dump($user);
if ($user == false) {
  header("Location: ../view/login.php");
}

$title = "Gestion T-Shop";
include_once('../view/include/header.php');

if(!empty($_POST)) 
    {
        $userId = $_SESSION['UserID'];
        // var_dump($userId);

        $statement = $db->prepare("DELETE FROM commande WHERE commande_UserID = ?");
        $statement->execute(array($userId));

        header("Location: ../view/user/chart.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    require_once('../view/include/header.php');

?>

    <body>
        <h1 class="text-logo"> T-Shop </h1>
         <div class="container delete">
            <div class="row">
                <h1><strong>Supprimer Tout les items</strong></h1>
                <br>
                <form class="form" action="DropChart.php" role="form" method="post">
                    <input type="hidden" name="id" value="1"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      <a class="btn btn-default" href="../view/user/chart.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>