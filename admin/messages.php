<?php 
include('../includes/admin_header.php'); 
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
								<th><i class="fa fa-user-times"></i> Message</th>
							</tr>
						</thead>
						<tbody>
							<?php  
							$query  = "SELECT  * FROM contact_admin INNER JOIN customer ON
									customer.customer_id = contact_admin.customer_id WHERE admin_id={$_SESSION['admin_id']} 
							";
							$result = mysqli_query($conn,$query);
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>{$row['customer_name']}</td>";
								echo "<td>{$row['customer_email']}</td>";
								echo "<td>{$row['message']}</td>";
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