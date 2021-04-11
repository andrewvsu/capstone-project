<?php

$product = $_POST['product'];
$cost = $_POST['cost'];
$vendor = $_POST['inputVendor'];
$facility = $_POST['inputFacility'];
$count = $_POST['count'];
if ($_POST['addProduct']==1) {
  include 'add.php';
}