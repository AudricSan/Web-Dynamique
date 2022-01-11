<?php
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT items_ID, items_Name, items_Description, items_Price, items_IMG, Category_Name AS items_Category FROM items LEFT JOIN category ON items_CategoryID = category_ID WHERE Items_ID = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

$title = $item['items_Name'];
require_once('../view/include/header.php');
?>

    <body>
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Teshop <span class="glyphicon glyphicon-cutlery"></span></h1>
         <div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Voir un item</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Nom:</label><?php echo '  '.$item['items_Name'];?>
                      </div>
                      <div class="form-group">
                        <label>Description:</label><?php echo '  '.$item['items_Description'];?>
                      </div>
                      <div class="form-group">
                        <label>Prix:</label><?php echo '  '.number_format((float)$item['items_Price'], 2, '.', ''). ' €';?>
                      </div>
                      <div class="form-group">
                        <label>Catégorie:</label><?php echo '  '.$item['items_Category'];?>
                      </div>
                    </form>
                    <br>
                    <div class="form-actions">
                      <a class="btn btn-primary" href="../view/index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </div> 
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../view//images/'.$item['items_IMG'];?>" alt="...">
                        <div class="price"><?php echo number_format((float)$item['items_Price'], 2, '.', ''). ' €';?></div>
                          <div class="caption">
                            <h4><?php echo $item['items_Name'];?></h4>
                            <p><?php echo $item['items_Description'];?></p>
                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>

