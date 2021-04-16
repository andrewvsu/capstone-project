<?php

$sql = "DELETE product, inventory
        FROM product
        INNER JOIN inventory on product.PRODUCT_ID = inventory.PRODUCT_ID
                WHERE (((product.PRODUCT_ID LIKE '%${delete}%' AND (inventory.QUANTITY = 0)) OR (product.PRODUCT_NAME LIKE '%${delete}%')) AND (inventory.QUANTITY = 0));";

  $result = mysqli_query($link, $sql);
  if (mysqli_affected_rows($link) != 0) {
    echo '<p class="bold">Delete '. $delete. ' Successful</p>';
  } else {
    echo '<p class="bold">Product not found/Product has remaining inventory</p>';
  }

  
  
  