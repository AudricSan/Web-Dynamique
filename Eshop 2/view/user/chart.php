<?php
session_start();
// var_dump($_SESSION);

if (!isset($_SESSION['UserConnected'])) {
  header("Location: ../login.php");
};

if ($_SESSION['UserConnected'] != 1) {
  header("Location: ../login.php");
}

require '../../model/database.php';
$id = $_SESSION['UserID'];
// var_dump($id);

$db = Database::connect();
$statement = $db->prepare('SELECT * FROM user WHERE User_ID = ?');
$statement->execute(array($id));
$user = $statement->fetch();

// var_dump($user);
if ($user == false) {
  header("Location: ../login.php");
}

$title = "Gestion T-Shop";
include_once('../include/header.php');
?>

<body>
  <h1 class="text-logo"> T-Shop </h1>
  <div class="container admin">
    <div class="row">
      <h1><strong>Panier de <?php echo $user['User_Name']; ?> </strong><a href="../index.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter des produits</a></h1>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          
        <?php
          $statement = $db->prepare('select * from items inner join commande on commande_ItemsID = Items_ID inner join category on Items_CategoryID = Category_ID  where Commande_UserID = ?');
          $statement->execute(array($id));
          // $chart = $statement->fetch();
          while ($chart = $statement->fetch()) {
            // var_dump($chart);
            echo '<tr>';
            echo '<td>' . $chart['Items_Name'] . '</td>';
            echo '<td>' . $chart['Items_Description'] . '</td>';
            echo '<td>' . number_format($chart['Items_Price'], 2, '.', '') . '</td>';
            echo '<td>' . $chart['Category_Name'] . '</td>';
            echo '<td class=action with=500>';
            echo '<a class="btn btn-default" href="../../model/public_view.php?id=' . $chart['Items_ID'] . '"><span class="glyphicon glyphicon-eye-open"></span> See</a>';
            echo ' ';
            echo '<a class="btn btn-danger" href="../../model/deletechart.php?id=' . $chart['Items_ID'] . '"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
            echo '</td>';
            echo '</tr>';
          }

          Database::disconnect();
          ?>
        </tbody>
      </table>
    </div>

    <div class="deleteall">
      <a class="btn btn-danger" href="../../controller/DropChart.php"><span class="glyphicon glyphicon-trash"></span> Dellete All Chart</a>
    </div>
    
    <div class="back">
      <a class="btn btn-primary" href="../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour Home</a>
      <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-user"></span> Mon profil </a>
      <a class="btn btn-danger" href="../../controller/Delete Session.php"><span class="glyphicon glyphicon-remove"></span> Deconnection</a>
    </div>
  </div>
</body>

</html>