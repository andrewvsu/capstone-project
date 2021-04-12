<?php
$date = date('Y-m-d');
$sql = "INSERT INTO product (PRODUCT_NAME, PRODUCT_COST, VENDOR_ID)
            VALUES ('$product', $cost, $vendor);
         "
;
$sql2 = "INSERT INTO inventory (PRODUCT_ID, FACILITY_ID, DATE_RECEIVED, QUANTITY)
VALUES (LAST_INSERT_ID(), $facility, '$date' ,$count);";




if (mysqli_query($link, $sql))  {
   
  if (mysqli_query($link, $sql2)) {
    echo "<p class='bold'> New record created successfully </p>";
  } 

}




?>