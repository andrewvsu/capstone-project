<?php



$shipProduct = htmlspecialchars($_POST['shipProduct']);
$shipFacilityID = htmlspecialchars($_POST['shipFacilityID']);
if ($_POST['ship']==1) {
  include 'ship_product.php';
}

?>