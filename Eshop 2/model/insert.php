<?php
     
    require 'database.php';
    //var_dump($_POST);
 
    $nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $category           = checkInput($_POST['category']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../view/images/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
        if(empty($name)) 
        {
            $nameError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($price)) 
        {
            $priceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($image)) 
        {
            $imageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (Items_Name, Items_Description, Items_Price, Items_CategoryID, Items_IMG) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$category,$image));
            Database::disconnect();
            //var_dump($statement);
            header("Location: ../view/admin/index.php");
        }
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
         <div class="container form">
            <h2><strong>Ajouter un item</strong></h2>
            <br>

            <div class="form-group">
                <form class="form" action="insert.php" role="form" method="post" enctype="multipart/form-data">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                    <span class="help-inline"><?php echo $nameError;?></span>

                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                    <span class="help-inline"><?php echo $descriptionError;?></span>

                    <label for="price">Prix: (en €)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price;?>">
                    <span class="help-inline"><?php echo $priceError;?></span>

                    <label for="category">Catégorie:</label>
                    <select class="form-control" id="category" name="category">
                        <?php $db = Database::connect(); foreach ($db->query('SELECT * FROM category') as $row) { echo '<option value="'. $row['Category_ID'] .'">'. $row['Category_Name'] . '</option>'; } Database::disconnect(); ?>
                    </select>
                
                    <span class="help-inline"><?php echo $categoryError;?></span>

                    <label for="image">Sélectionner une image:</label>
                    <input type="file" id="image" name="image"> 
                    <span class="help-inline"><?php echo $imageError;?></span>

                    <br>

                    <div class="back">
                        <a class="btn btn-primary" href="../view/admin/index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>