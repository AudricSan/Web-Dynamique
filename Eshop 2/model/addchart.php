<?php
session_start();
require 'database.php';
var_dump($_SESSION);

if (!isset($_SESSION['UserConnected'])) {
  header("Location: ../view/login.php");
};

$userId = $_SESSION['UserID'];
var_dump($userId);

$db = Database::connect();
$statement = $db->prepare('SELECT * FROM user WHERE User_ID = ?');
$statement->execute(array($userId));
$user = $statement->fetch();
var_dump($user);

if ($user == false) {
  header("Location: ../view/login.php");
}

var_dump($_GET);
var_dump($_GET['itemsid']);
echo $_GET['itemsid'];

if(!empty($_GET['itemsid'])) 
{
  $userId = intval($_SESSION['UserID']);
  $itemID = intval($_GET['itemsid']);
    var_dump($userId);
    var_dump($itemID);

    $statement = $db->prepare("INSERT INTO commande (commande_UserID, commande_ItemsID) VALUES (?, ?)");
    $statement->execute(array($userId, $itemID));
    header("Location: ../view/user/chart.php"); 
}
?>