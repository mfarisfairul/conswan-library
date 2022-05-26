<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Students | <small><a href="home.php">Home</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					<a href="member_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Student List</button>
							</a>
							<a href="add_user.php" style="background:none;">
							<button class="btn btn-primary btn-outline pull-right"><i class="fa fa-plus-circle"></i> Add Students</button>
							</a>
					     <!-- <a href="import_members.php" style="background:none;">
							<button class="btn btn-success pull-right"><i class="fa fa-upload"></i> Import Students</button>
							</a>-->
				        	
							<br />
							<br />
                    <div class="x_title">
                        <h2><i class="fa fa-users"></i> Students Information</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead style="background-color: #EEEEEE">
								<tr>
									<th>Student Number</th>
									<th>Full Name</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th>Home Address</th>
									<th>Form</th>
									<th>Class</th>
									<th>Status</th>
									<th>Students Added</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from student order by user_id DESC") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_id'];
							?>
							<tr>
								<td><?php echo $row['student_num']; ?></td> 
								<td><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></td>  
								<td><?php echo $row['gender']; ?></td> 
								<td><?php echo $row['pnum']; ?></td>
								<td><?php echo $row['homeaddress']; ?></td> 
								<td><?php echo $row['form']; ?></td> 
								<td><?php echo $row['class']; ?></td> 
								<td><?php echo $row['status']; ?></td> 
								<td><?php echo date("d/M/Y  H:i:s A", strtotime($row['user_added'])); ?></td>
								
								<td>
									<a class="btn btn-warning" style="width: 80px;" for="ViewAdmin" href="edit_user.php<?php echo '?user_id='.$id; ?>">
									<i class="fa fa-edit"></i> Edit
									</a>
									<a class="btn btn-danger" style="width: 80px;" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>">
									<i class="fas fa-trash"></i> Delete
									</a>
			
									<!-- delete modal user -->
									<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Students</h4>
										</div>
										<div class="modal-body">
												<div class="alert alert-danger">
													Are you sure you want to delete?
												</div>
												<div class="modal-footer">
												<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
												<a href="delete_user.php<?php echo '?user_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
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
					
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>