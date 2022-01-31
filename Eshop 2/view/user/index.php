<?php
    session_start();
    // var_dump($_SESSION);

    if(!isset($_SESSION['UserConnected'])){
      header("Location: ../login.php");
    };

    if($_SESSION['UserConnected'] != 1){
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
    if($user == false){
      header("Location: ../login.php");
    }

    $title = "Gestion T-Shop";
    include_once('../include/header.php');
    ?>

    <body>
      <h1 class="text-logo"> T-Shop </h1>
      <div class="container user">
        <div class="row">
          <h1><strong><?php echo $user['User_Name']; ?> information </strong></h1>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Info</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach($user as $key=>$value){
                // var_dump($item);
                if(strpos($key, '_')){
                $key = explode('_', $key)[1];
                // echo 'CONTIEN';
                // var_dump($key);

                if($key == 'PA'){
                  $key = 'Postal Adress';
                }

                echo '<tr>';
                if($key != 'ID'){
                  echo '<td>' . $key . '</td>';
                  echo '<td>' . $value . '</td>';

                  echo '<td width=300>';
  
                  echo ' ';
                  
                  switch ($key) {
                    case 'Bday':
                        $type = 'date';
                        break;
                    case 'Mail':
                        $type = 'email';
                        break;
                    case 'Password':
                        $type = 'password';
                        break;
                    default:
                      $type = 'text';
                }                

                  if($key == 'Password'){
                    echo '<a class="btn btn-primary" href="../../model/userupdate.php?key=' . $key . '&type=' . $type . '"><span class="glyphicon glyphicon-pencil"></span> Edit </a>';
                  }else{
                    echo '<a class="btn btn-primary" href="../../model/userupdate.php?value=' . $value . '&key=' . $key . '&type=' . $type . '"><span class="glyphicon glyphicon-pencil"></span> Edit </a>';
                  }
            
                  // $var = [IF] ? [THEN] : [ELSE]
                  echo '</td>';
                  echo '</tr>';
                }

                }else{
                  // echo 'CONTIEN PO';
                }
                // exit;
              }
              Database::disconnect();
              ?>
            </tbody>
          </table>
        </div>

        <div class="back">
        <a class="btn btn-primary" href="../index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour Public</a>
        <a class="btn btn-primary" href="chart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a>
        <a class="btn btn-danger" href="../../controller/Delete Session.php"><span class="glyphicon glyphicon-remove"></span> Deconnection</a>
        </div>
      </div>
    </body>

    </html>