<?php

require 'database.php';
session_start();
$id = $_SESSION['UserID'];
// var_dump($_SESSION);

// var_dump($_GET);
//var_dump($_POST);
if (!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

$error = "";
$key = $_GET['key'];
$value = $_GET['value'];
$type = $_GET['type'];

if (!empty($_POST)) {
    $db = Database::connect();

    // var_dump($_POST);
    // var_dump($_GET);

    if($key == 'Password'){
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $newpass2 = $_POST['newpass2'];

        // var_dump($oldpass);
        // var_dump($newpass);
        // var_dump($newpass2);

    }else{
        $value = $_POST[$key];
    
        // var_dump($key);
        // var_dump($value);
    }

    if (empty($key && $value)) {
        $error = 'Ce champ ne peut pas être vide';
    }else{

        switch($key){
            case 'Login':
                echo 'LOGIN';
                $statement = $db->prepare("UPDATE user set User_Login = ? WHERE User_ID = ?");
                $statement->execute(array($value, $id));
                $error = '';
                break;
    
            case 'Password':
                echo 'PASSWORD';
                break;
    
            case 'Name':
                echo 'Name';
                $statement = $db->prepare("UPDATE user set User_Name = ? WHERE User_ID = ?");
                $statement->execute(array($value, $id));
                $error = '';
                break;
    
            case 'FirstName':
                echo 'FirstName';
                $statement = $db->prepare("UPDATE user set User_FirstName = ? WHERE User_ID = ?");
                $statement->execute(array($value, $id));
                $error = '';
                break;
    
            case 'Bday':
                echo 'Bday';
                $statement = $db->prepare("UPDATE user set User_Bday = ? WHERE User_ID = ?");
                $statement->execute(array($value, $id));
                $error = '';
                break;
    
            case 'Mail':
                echo 'Mail';
                $statement = $db->prepare("UPDATE user set User_Mail = ? WHERE User_ID = ?");
                $statement->execute(array($value, $id));
                $error = '';
                break;
    
            case 'Postal Adress':
                echo 'PA';
                $statement = $db->prepare("UPDATE user set User_PA_ID = ? WHERE User_ID = ?");
                $statement->execute(array($value, $id));
                $error = '';
                break;
        }

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
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> T-Shop <span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
            <div class="col-sm-6">
                <h1><strong>Modifier <?php echo $key; ?></strong></h1>
                <br>
                <?php if(!isset($value)){
                    ?>
                    <form class="form" action="userupdate.php?key=<?php echo $key; ?>&type=<?php echo $type ?>" role="form" method="post" enctype="multipart/form-data">
                    <?php
                }else{
                    ?>
                    <form class="form" action="userupdate.php?value=<?php echo $value; ?>&key=<?php echo $key; ?>&type=<?php echo $type ?>" role="form" method="post" enctype="multipart/form-data">
                    <?php
                }
                ?>
                    <?php if($key == 'Password'){
                        ?>
                        <div class="form-group">
                        <label for="oldpass"> OLD password :
                            <input type="<?php echo $type ?>" class="form-control" id="oldpass" name="oldpass" placeholder="">
                            <span class="help-inline"><?php echo $error; ?></span>

                        <label for="newpass"> New password :
                            <input type="<?php echo $type ?>" class="form-control" id="newpass" name="newpass" placeholder="">
                            <span class="help-inline"><?php echo $error; ?></span>
                        
                        <label for="newpass2"> Confirm New Password :
                            <input type="<?php echo $type ?>" class="form-control" id="newpass2" name="newpass2" placeholder="">
                            <span class="help-inline"><?php echo $error; ?></span>
                        </div>

                        <?php

                    }else{
                        ?>
                        <div class="form-group">
                        <label for="<?php echo $key; ?>"><?php echo $key; ?> :
                            <input type="<?php echo $type ?>" class="form-control" id="<?php echo $key; ?>" name="<?php echo $key; ?>" placeholder="<?php echo $value; ?>">
                            <span class="help-inline"><?php echo $error; ?></span>
                        </div>
                        <?php
                    }
                    ?>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                        <a class="btn btn-primary" href="../view/user/index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>