<?php


  $sql = "SELECT FACILIITY_NAME,FACILITY_ID FROM facility;";
  $results = mysqli_query($link,$sql);
 
  while ($list = mysqli_fetch_array($results)) {
    $lists[] = $list;
  }

  foreach ($lists as $list) {
  echo "<option value='" .$list['FACILITY_ID']. "'>".$list['FACILIITY_NAME'] . "</option>";
  }
  
?>