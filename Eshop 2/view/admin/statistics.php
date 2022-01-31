<?php
    session_start();
    // var_dump($_SESSION);

    if(!isset($_SESSION['AdminConnect'])){
      if($_SESSION['AdminConnect'] != 1){
        header("Location: ../login.php");
      }
    };

    $title = "Gestion T-Shop";
    include_once('../include/header.php');
    ?>

    <body>
      <h1 class="text-logo"> T-Shop </h1>
      <div class="container admin">
        <div class="row">
          <h1><strong> Commande en cours </strong><a href="../../model/insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Category</th>
                <th>User</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require '../../model/database.php';
              $db = Database::connect();
              $statement = $db->prepare('select * from items inner join commande on commande_ItemsID = Items_ID inner join category on Items_CategoryID = Category_ID INNER JOIN user on user_Id = commande_UserID;');
              $statement->execute();
              //$item = $statement->fetchAll();
              //var_dump($item);

              while ($item = $statement->fetchAll()) {
                foreach($item as $key => $value){
                    // var_dump($value);
                    echo '<tr>';
                    echo '<td>' . $value['Items_Name'] . '</td>';
                    echo '<td>' . $value['Items_Description'] . '</td>';
                    echo '<td>' . number_format($value['Items_Price'], 2, '.', '') . '</td>';
                    echo '<td>' . $value['Category_Name'] . '</td>';
                    echo '<td>' . $value['User_Name'] . '</td>';
                    echo '</tr>';
                }
            }
              Database::disconnect();
              ?>
            </tbody>
          </table>
        </div>

        <div class="back">
        <a class="btn btn-primary" href=" index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour Administrator</a>
        <a class="btn btn-danger" href="../../controller/Delete Session.php"><span class="glyphicon glyphicon-remove"></span> Deconnection</a>
        </div>
      </div>
    </body>

    </html>