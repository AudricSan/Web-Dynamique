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
    require '../../model/database.php';

    ?>

    <body>
      <h1 class="text-logo"> T-Shop </h1>
      <div class="container admin">
        <div class="row">
          <h1><strong> Statistics Dashboard </strong></h1>

          <h2> Most Visit day </h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Visit day</th>
                <th>Visit Number</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $db = Database::connect();
              $statement = $db->prepare('SELECT visite_Date, COUNT(day) as count FROM visite GROUP by day');
              $statement->execute();
              while ($item = $statement->fetchAll()) {
                foreach($item as $key => $value){
                    $day = $value['visite_Date'];

                    $explode = explode(',', $day);
                    $day = $explode[0];

                    $date = $explode[1];
                    $date = explode(' ', $date);
                    $date = $date[1];

                    echo '<tr>';
                    echo '<td>' . $day . '</td>';
                    echo '<td>' . $value['count'] . '</td>';
                    echo '</tr>';
                }
              }
              Database::disconnect();
              ?>
            </tbody>
          </table>
         
          <h2> Visites </h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Visit Date</th>
                <th>Visit day</th>
                <th>Visit Number</th>
                <th>full timestamp</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $db = Database::connect();
              $statement = $db->prepare('SELECT visite_Date, COUNT(visite_Date) as count FROM visite GROUP by visite_Date');
              $statement->execute();
              while ($item = $statement->fetchAll()) {
                foreach($item as $key => $value){
                    // var_dump($value);
                    $day = $value['visite_Date'];
                    // var_dump($day);
                    $explode = explode(',', $day);
                    $day = $explode[0];

                    $date = $explode[1];
                    $date = explode(' ', $date);
                    $date = $date[1];

                    // var_dump($day);
                    // var_dump($date);

                    echo '<tr>';
                    echo '<td>' . $date . '</td>';
                    echo '<td>' . $day . '</td>';
                    echo '<td>' . $value['count'] . '</td>';
                    echo '<td>' . $value['visite_Date'] . '</td>';
                    echo '</tr>';
                }
              }
              Database::disconnect();
              ?>
            </tbody>
          </table>
          
          <h2> Statistics </h2>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Count in Commandes</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $db = Database::connect();
              $statement = $db->prepare('select Items_ID, Items_Price, Items_Name, Items_Description, count(commande_itemsID) as count from commande inner join items on Items_ID = commande_ItemsID group by Items_ID ORDER BY count DESC');
              $statement->execute();
              // $item = $statement->fetchAll();
              // var_dump($item);

              while ($item = $statement->fetchAll()) {
                foreach($item as $key => $value){
                    // var_dump($value);
                    echo '<tr>';
                    echo '<td>' . $value['Items_Name'] . '</td>';
                    echo '<td>' . $value['Items_Description'] . '</td>';
                    echo '<td>' . number_format($value['Items_Price'], 2, '.', '') . '</td>';
                    echo '<td>' . $value['count'] . '</td>';
                    echo '</tr>';
                }
              }
              Database::disconnect();
              ?>
            </tbody>
          </table>
          
          <h2> User Commandes </h2>
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