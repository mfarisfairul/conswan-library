<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
				View Admin & Staff Information |<small><a href="home.php">Home</a> > <a href="admin.php">Admin & Staff</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> View Admin & Staff Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           <a href="admin.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead style="background-color: #EEEEEE">
								<tr>
									<th>Image</th>
									<th>Full Name</th>
									<th>Username</th>
									<th>Phone Number</th>
									<th>Password</th>
									<th>Email</th>
									<th>Date Added</th>
								</tr>
							</thead>
							<tbody>
<?php
			   
		if (isset($_GET['admin_id']))
		$id=$_GET['admin_id'];
		$result1 = mysqli_query($con,"SELECT * FROM admin_staff WHERE admin_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
								<td>
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
									<img src="images/user.png" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>	
								</td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
								<td><?php echo $row['username']; ?></td> 
								<td><?php echo $row['pnum']; ?></td> 
								<td><?php echo $row['password']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo date("d/M/Y H:i:s A", strtotime($row['admin_added'])); ?></td> 
							</tr>
							<?php } ?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>