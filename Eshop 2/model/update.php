<?php

require 'database.php';
//var_dump($_GET);
//var_dump($_POST);
if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

$nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

if (!empty($_POST)) {
    $name               = checkInput($_POST['name']);
    $description        = checkInput($_POST['description']);
    $price              = checkInput($_POST['price']);
    $category           = checkInput($_POST['category']);
    $image              = checkInput($_FILES["image"]["name"]);
    $imagePath          = '../view/images/' . basename($image);
    $imageExtension     = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess          = true;

    if (empty($name)) {
        $nameError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if (empty($description)) {
        $descriptionError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if (empty($price)) {
        $priceError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }

    if (empty($category)) {
        $categoryError = 'Ce champ ne peut pas être vide';
        $isSuccess = false;
    }
    if (empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
    {
        $isImageUpdated = false;
    } else {
        $isImageUpdated = true;
        $isUploadSuccess = true;
        if ($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif") {
            $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }
        if (file_exists($imagePath)) {
            $imageError = "Le fichier existe deja";
            $isUploadSuccess = false;
        }
        if ($_FILES["image"]["size"] > 500000) {
            $imageError = "Le fichier ne doit pas depasser les 500KB";
            $isUploadSuccess = false;
        }
        if ($isUploadSuccess) {
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                $imageError = "Il y a eu une erreur lors de l'upload";
                $isUploadSuccess = false;
            }
        }
    }

    if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) {
        $db = Database::connect();
        if ($isImageUpdated) {
            $statement = $db->prepare("UPDATE items  set Items_Name = ?, Items_Description = ?, Items_Price = ?, Items_CategoryID = ?, Items_IMG = ? WHERE Items_ID = ?");
            $statement->execute(array($name, $description, $price, $category, $image, $id));
        } else {
            $statement = $db->prepare("UPDATE items  set Items_Name = ?, Items_Description = ?, Items_Price = ?, Items_CategoryID = ? WHERE Items_ID = ?");
            $statement->execute(array($name, $description, $price, $category, $id));
        }
        Database::disconnect();
        header("Location: ../view/admin/index.php");

    } else if ($isImageUpdated && !$isUploadSuccess) {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM items where Items_ID = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        //var_dump($item);
        $image = $item['Items_IMG'];
        Database::disconnect();
    }
} else {
    $db = Database::connect();
    $statement = $db->prepare("SELECT * FROM items where Items_ID = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();

    //var_dump($item);

    $name           = $item['Items_Name'];
    $description    = $item['Items_Description'];
    $price          = $item['Items_Price'];
    $category       = $item['Items_CategoryID'];
    $image          = $item['Items_IMG'];
    Database::disconnect();
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
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> Teshop <span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-6">
                <h1><strong>Modifier un item</strong></h1>
                <br>
                <form class="form" action="<?php echo 'update.php?id=' . $id; ?>" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                            <span class="help-inline"><?php echo $nameError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:
                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
                            <span class="help-inline"><?php echo $descriptionError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix: (en €)
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?>">
                            <span class="help-inline"><?php echo $priceError; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="category">Catégorie:
                            <select class="form-control" id="category" name="category">
                                <?php
                                $db = Database::connect();
                                foreach ($db->query('SELECT * FROM category') as $row) {
                                    if ($row['Category_ID'] == $category)
                                        echo '<option selected="selected" value="' . $row['Category_ID'] . '">' . $row['Category_Name'] . '</option>';
                                    else
                                        echo '<option value="' . $row['Category_ID'] . '">' . $row['Category_Name'] . '</option>';;
                                }
                                Database::disconnect();
                                ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <p><?php echo $image; ?></p>
                        <label for="image">Sélectionner une nouvelle image:</label>
                        <input type="file" id="image" name="image">
                        <span class="help-inline"><?php echo $imageError; ?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                        <a class="btn btn-primary" href="../view/admin/index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </form>
            </div>
            <div class="col-sm-6 site">
                <div class="thumbnail">
                    <img src="<?php echo '../images/' . $image; ?>" alt="...">
                    <div class="price"><?php echo number_format((float)$price, 2, '.', '') . ' €'; ?></div>
                    <div class="caption">
                        <h4><?php echo $name; ?></h4>
                        <p><?php echo $description; ?></p>
                        <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Commander</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>