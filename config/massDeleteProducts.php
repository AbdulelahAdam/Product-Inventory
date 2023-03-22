<?php
include_once 'DB.php';
include_once '../modules/Product.php';

$sku = $_GET['sku'];


$db = new Database();

$dbConnection = $db->connect();


$product = new Product($dbConnection);

$result = $product->mass_delete_products($sku);

header("Location: ../productList.php");
exit();
?>
