<?php
include("includes/connection.php");

$result = mysqli_query($conn, "SELECT ser_id,ser_name FROM service where cat_id={$_GET['cat_id']}");
echo "<option Selected disabled>Select Service</option>";
while ( $row = mysqli_fetch_assoc($result)) {
	echo "<option value='{$row['ser_id']}' >{$row['ser_name']}</option>";
}

