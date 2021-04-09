<?php


  $sql = "SELECT VENDOR_NAME FROM vendor;";
  $result = mysqli_query($link,$sql);

  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }

  foreach ($rows as $row) {
  echo "<option value='" .$row['VENDOR_NAME']. "'>".$row['VENDOR_NAME'] . "</option>";
  }

?>