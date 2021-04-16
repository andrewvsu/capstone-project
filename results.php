<?php



include "display_results.php";

  
  $sql = "SELECT product.PRODUCT_ID,
               product.PRODUCT_NAME,
               vendor.VENDOR_NAME,
               facility.FACILIITY_NAME,
               inventory.QUANTITY 
        FROM product
        INNER JOIN vendor ON product.VENDOR_ID = vendor.VENDOR_ID
        INNER JOIN inventory ON inventory.PRODUCT_ID = product.PRODUCT_ID INNER JOIN facility ON inventory.FACILITY_ID = facility.FACILITY_ID 
        WHERE (product.PRODUCT_ID LIKE '%${query}%') OR (product.PRODUCT_NAME LIKE '%${query}%');";

  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result)!= 0) {
    echo display_results($result);
  } else {
    echo '<p class="bold">No Results Found</p>';
  }
  
 
  
   
