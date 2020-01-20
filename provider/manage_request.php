<?php 
include('../includes/provider_header.php'); 
?>
<!-- BASIC FORM VALIDATION -->
<section id="main-content">
	<section class="wrapper">

		<div class="row mt">
			<div class="col-lg-12">
				<div class="form-panel">
					<table class="table table-striped table-advance table-hover">
						<h4><i class="fa fa-angle-right"></i> Requests Table</h4>
						<hr>
						<thead>
							<tr>
								<th class="hidden-phone"><i class="fa fa-edit"></i> Customer Name</th>
								<th><i class="fa fa-envelope"></i> Cusomer Email</th>
								<th><i class=" fa fa-edit"></i> Address</th>
								<th><i class="fa fa-user-times"></i> Message</th>
								<th><i class="fa fa-user-times"></i> Phone</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$query  = "SELECT  * FROM request INNER JOIN customer ON
									customer.customer_id = request.customer_id WHERE provider_id={$_SESSION['provider_id']} 
							";
							$result = mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['customer_name']}</td>";
								echo "<td>{$row['customer_email']}</td>";
								echo "<td>{$row['address']}</td>";
								echo "<td>{$row['message']}</td>";
								echo "<td>{$row['phone']}</td>";
								//echo "<td><img src = 'upload/{$row['provider_image']}' width='100' height='100'></td>";
								//echo "<td><a class='btn btn-primary btn-xs' href='edit_provider.php?provider_id={$row["provider_id"]}'><i class='fa fa-pencil'></i></a></td>";
							//	echo "<td><a class='btn btn-danger btn-xs' href='delete_provider.php?provider_id={$row["provider_id"]}'><i class='fa fa-trash-o '></i></a></td>";
								echo "</tr>";
							}

							?>
						</tbody>
					</table>
				</div>
				<!-- /content-panel -->
			</div>
			<!-- /col-md-12 -->
		</div>
	</section>
</section>