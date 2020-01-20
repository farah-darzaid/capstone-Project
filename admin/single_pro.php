<?php
include ('includes/public_header.php');

$result = mysqli_query($conn,"SELECT * FROM provider WHERE provider_id={$_GET['provider_id']}");
$row = mysqli_fetch_assoc($result);
 
}

?>
<div class="container">
	<div>
		<h1><?php echo "$row['provider_name']"; ?></h1>
	</div>
</div>

