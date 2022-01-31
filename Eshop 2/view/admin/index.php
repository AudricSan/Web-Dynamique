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
          <h1><strong>Liste des items </strong><a href="../../model/insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
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
              require '../../model/database.php';
              $db = Database::connect();
              $statement = $db->query('SELECT Items_ID, Items_Name, Items_Description, Items_Price, Category_Name AS Items_Category FROM items LEFT JOIN category ON Items_CategoryID = category_ID ORDER BY Items_ID DESC;
                        ');

              while ($item = $statement->fetch()) {
                // var_dump($item);
                echo '<tr>';
                echo '<td>' . $item['Items_Name'] . '</td>';
                echo '<td>' . $item['Items_Description'] . '</td>';
                echo '<td>' . number_format($item['Items_Price'], 2, '.', '') . '</td>';
                echo '<td>' . $item['Items_Category'] . '</td>';
                echo '<td class=action with=500>';
                echo '<a class="btn btn-default" href="../../model/view.php?id=' . $item['Items_ID'] . '"><span class="glyphicon glyphicon-eye-open"></span> See</a>';
                echo ' ';
                echo '<a class="btn btn-primary" href="../../model/update.php?id=' . $item['Items_ID'] . '"><span class="glyphicon glyphicon-pencil"></span> Edit</a>';
                echo ' ';
                echo '<a class="btn btn-danger" href="../../model/delete.php?id=' . $item['Items_ID'] . '"><span class="glyphicon glyphicon-trash"></span> Delete</a>';
                echo '</td>';
                echo '</tr>';
              }
              Database::disconnect();
              ?>
            </tbody>
          </table>
        </div>

        <div class="back">
        <a class="btn btn-primary" href="../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour Public</a>
        <a class="btn btn-primary" href="../register.php"><span class="glyphicon glyphicon-plus"></span> Add Administrator</a>
        <a class="btn btn-primary" href="statistics.php"><span class="glyphicon glyphicon-stats"></span> statistics </a>
        <a class="btn btn-danger" href="../../controller/Delete Session.php"><span class="glyphicon glyphicon-remove"></span> Deconnection</a>
        </div>
      </div>
    </body>

    </html>