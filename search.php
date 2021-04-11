<?php

$query = $_POST['query'];
$query = htmlspecialchars($query);
if ($_POST['doSearch']==1) {
  include 'results.php';
}

?>