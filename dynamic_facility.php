<?php


  $sql = "SELECT FACILIITY_NAME,FACILITY_ID FROM facility;";
  $result = mysqli_query($link,$sql);
  // $row_cnt = mysqli_num_rows($result);
  // printf("Result set has %d rows.\n", $row_cnt);
 
  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }

  foreach ($rows as $row) {
  echo "<option value='" .$row['FACILITY_ID']. "'>".$row['FACILIITY_NAME'] . "</option>";
  }
  
?>