<?php
session_start();
require_once('include/header.php');
?>

    <body>
        <div class="container site">
            <h1 class="text-logo">Tshop </h1>
            <?php
				require '../model/database.php';
			 
                echo '<nav> <ul class="nav nav-pills">';

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

                echo '<nav class="nav2">
                        <ul>
                            <li> COUCOU </li>
                            <li> COUCOU </li>
                            <li> COUCOU </li>
                        </ul
                    </nav>';

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
                                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
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

