<?php

$product = htmlspecialchars($_POST['product']);
$cost = htmlspecialchars($_POST['cost']);
$vendor = htmlspecialchars($_POST['inputVendor']);
$facility = htmlspecialchars($_POST['inputFacility']);
$count = htmlspecialchars($_POST['count']);
if ($_POST['addProduct']==1) {
  include 'add.php';
}