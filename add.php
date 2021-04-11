<?php
$date = date('Y-m-d');
$sql = "INSERT INTO product (PRODUCT_NAME, PRODUCT_COST, VENDOR_ID)
            VALUES ('$product', $cost, $vendor);
         "
;
$sql2 = "INSERT INTO inventory (PRODUCT_ID, FACILITY_ID, DATE_RECEIVED, QUANTITY)
VALUES (LAST_INSERT_ID(), $facility, '$date' ,$count);";

// echo "<p> product:" .$product ." cost: " . $cost . " vendor: " . $vendor . "facility: ". $facility . "count: ". $count . "date: ". date('Y-m-d') ;
// $stmt = $link->prepare($sql);
// $stmt = bind_param("sdiii", $product, $cost, $vendor, $facility, $count);
// $stmt->execute();

if (mysqli_query($link, $sql))  {
   
  if (mysqli_query($link, $sql2)) {
    echo "New record created successfully";
  } 

}

// mysqli_close($link);

// $result = mysqli_query($link, $sql);



?>