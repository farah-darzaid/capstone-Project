<?php
//$conn = mysqli_connect("localhost","root","","mls");
include("includes/connection.php");
$result = mysqli_query($conn, "SELECT provider_name FROM provider where ser_id={$_GET['ser_id']}");
echo "<option Selected disabled>Select provider</option>";
while ( $row = mysqli_fetch_assoc($result)) {
	echo "<option value='{$row['ser_id']}'>{$row['provider_name']}</option>";
}