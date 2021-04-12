<?php


  $sql = "SELECT FACILIITY_NAME,FACILITY_ID FROM facility;";
  $result = mysqli_query($link,$sql);
 
  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }

  foreach ($rows as $row) {
  echo "<option value='" .$row['FACILITY_ID']. "'>".$row['FACILIITY_NAME'] . "</option>";
  }
  
?>