<?php

$product = htmlspecialchars($_POST['product']);
$cost = htmlspecialchars($_POST['cost']);
$vendor = htmlspecialchars($_POST['inputVendor']);
$facility = htmlspecialchars($_POST['inputFacility']);
$count = htmlspecialchars($_POST['count']);
if ($cost >= 0.50 OR $count >= 0) {
  if ($_POST['addProduct']==1) {
    include 'add.php';
  }
} else {
  echo '<p class="bold">Invalid cost or quantity</p>';
} 