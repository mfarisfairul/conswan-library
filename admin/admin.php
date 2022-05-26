<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Admin & Staff | <small><a href="home.php">Home</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
<?php
$user_query  = mysqli_query($con,"select * from admin_staff where admin_id = '$id_session'")or die(mysqli_error());
$user_row =mysqli_fetch_array($user_query);
$type  = $user_row['admin_type'];
?>
					<?php if ($type == 'Admin') {
					?>
							<a href="add_admin.php" style="background:green;">
							<button class="btn btn-primary btn-outline pull-right"><i class="fa fa-plus-circle"></i> Add Admin or Staff</button>
							</a>
							<br />
							<br />
					<?php } ?>
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Admin & Staff Information</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead style="background-color: #EEEEEE">
								<tr>
									<th>Image</th>
									<th>Full Name</th>
								    <th>Type</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from admin_staff order by admin_id ASC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['admin_id'];
							?>
							<tr>
								<td>
									<?php if($row['admin_image'] != ""): ?>
									<img src="upload/<?php echo $row['admin_image']; ?>" width="120px" height="150px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php else: ?>
									<img src="images/user.png" width="120px" height="150px" style="border:4px groove #CCCCCC; border-radius:5px;">
									<?php endif; ?>	
								</td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>
								<td><?php  echo $row['admin_type']; ?></td>
								<td>
									<a class="btn btn-primary" for="ViewAdmin" href="view_admin.php<?php echo '?admin_id='.$id; ?>">
									<i class="fas fa-eye"></i> View
									</a>
									<a class="btn btn-warning" for="ViewAdmin" href="edit_admin.php<?php echo '?admin_id='.$id; ?>">
								    <i class="fa fa-edit"></i> Edit
									</a>
									<a class="btn btn-danger" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
									<i class="fas fa-trash"></i> Delete
									</a>
			
									<!-- delete modal admin -->
									<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Admin & Staff</h4>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
													Are you sure you want to delete?
												</div>
												<div class="modal-footer">
												<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
												<a href="delete_admin.php<?php echo '?admin_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
												</div>
										</div>
										</div>
									</div>
									</div>
								</td> 
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