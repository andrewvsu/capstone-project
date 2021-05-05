<?php
$date = date('Y-m-d');
$sql = "UPDATE inventory 
        SET FACILITY_ID = $shipFacilityID,
        DATE_RECEIVED = '$date'
        WHERE PRODUCT_ID = $shipProduct;";
$result = mysqli_query($link, $sql);
if (mysqli_affected_rows($link) >= 1) {
  echo '<p class="bold"> Product ID: '. $shipProduct. ' sent to facility ID: '. $shipFacilityID. ' Successful</p>';
} else {
  echo '<p class="bold">Product or Facility not found</p>';
}