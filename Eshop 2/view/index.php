<?php
session_start();
require_once('include/header.php');
// var_dump($_SESSION);

// $group = [];
// $audric = "Audric";
// $xavier = "Xavier";
// $ronald = "Ronald";
// $tibhault = "Tibhault";
// array_push($group, $audric);
// var_dump($group);

?>

    <body>
        <div class="container site">
            <h1 class="text-logo">T-Shop </h1>
            <?php
				require '../model/database.php';
			 
                echo '<div class="navlog divNav"> <nav> <ul>';

                $db = Database::connect();
                $statement = $db->query('SELECT * FROM Category');
                $categories = $statement->fetchAll();
                foreach ($categories as $category) 
                {
                    if($category['Category_ID'] == '1')
                        echo '<li role="presentation" class="active"><a href="#'. $category['Category_ID'] . '" data-toggle="tab">' . $category['Category_Name'] . '</a></li>';
                    else
                        echo '<li role="presentation"><a href="#'. $category['Category_ID'] . '" data-toggle="tab">' . $category['Category_Name'] . '</a></li>';
                }

                echo '</ul> </nav>';

                echo '<nav> <ul>';

                if(isset($_SESSION['UserConnected'])){
                    echo '<li> <a href="user/index.php" role="button"><span class="glyphicon glyphicon-list-alt"></span> Mon profil</a> </li>';
                    echo '<li> <a href="user/chart.php" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a> </li>'; 
                    /*echo '<li class="colorred" > <a href="../controler/Delete Session.php" role="button"><span class="glyphicon glyphicon-log-out"></span> Déconnexion </a> </li>'; */
                  }

                elseif(isset($_SESSION['AdminConnect'])) {
                    echo '<li> <a href="admin/index.php" role="button"><span class="glyphicon glyphicon-list-alt"></span> Gestion Admin</a> </li>';
                    /*echo '<li> <a href="../controler/Delete Session.php" role="button"><span class="glyphicon glyphicon-log-out"></span> Déconnexion </a> </li>';*/
                  }

                else{
                    echo '<li> <a href="login.php" role="button"><span class="glyphicon glyphicon-off"></span> Login</a> </li>
                          <li> <a href="Public_Register.php" role="button"><span class="glyphicon glyphicon-list-alt"></span> S\'inscrire</a> </li>';
                  }
                
                echo '</ul> </nav> </div>';

                echo '<div class="tab-content">';

                foreach ($categories as $category) 
                {
                    if($category['Category_ID'] == '1')
                        echo '<div class="tab-pane active" id="' . $category['Category_ID'] .'">';
                    else
                        echo '<div class="tab-pane" id="' . $category['Category_ID'] .'">';

                    echo '<div class="row">';
                    
                    $statement = $db->prepare('SELECT * FROM items WHERE Items_CategoryID = ?');
                    $statement->execute(array($category['Category_ID']));
                    while ($item = $statement->fetch()) 
                    {
                        // var_dump($item);
                        echo '<div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="../model/public_view.php?id=' . $item["Items_ID"] . '">
                                        <img src="images/' . $item['Items_IMG'] . '" alt="' . $item['Items_Description'] . '">
                                    </a>
                                    <div class="price">' . number_format($item['Items_Price'], 2, '.', ''). ' €</div>
                                    <div class="caption">
                                        <h4>' . $item['Items_Name'] . '</h4>
                                        <p>' . $item['Items_Description'] . '</p>
                                        <a href="../model/addchart.php?itemsid=' . intval($item['Items_ID']) . '" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                                    </div>
                                </div>
                            </div>';
                    }              

                   echo '</div> </div>';
                }
                Database::disconnect();
                echo  '</div>';
            ?>
        </div>
    </body>

    <?php
    require_once('include/footer.php');
    ?>
</html>