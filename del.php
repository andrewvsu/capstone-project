<?php

$query = $_POST['inputDeleteProduct'];
$query = htmlspecialchars($query);
if ($_POST['delProduct']==1) {
  include 'remove.php';
}

?>