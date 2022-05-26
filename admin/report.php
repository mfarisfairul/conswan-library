	<?php
error_reporting(0);
include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Report | <small><a href="home.php">Home</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-file"></i> List of Report</h2>
                        <ul class="nav navbar-right panel_toolbox">
                    <!--        <li>
							<a href="view_graph.php" style="background:none;">
							<button class="btn btn-primary"><i class="fa fa-bar-chart"></i> View Graph Report</button>
							</a>
							</li>
						-->
                            <li>
							<!-- <a href="report_print.php" target="_blank" style="background:none;">
							<button class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a> -->
							</li>
                        </ul>
						
                        <div class="clearfix"></div>
						
						<form method="POST" action="" class="form-inline">
                                <!--<div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php //echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(Successfully)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php //echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(Successfully)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-2">
											<select class="form-control" name="status" style="color:black;">
												<option>---All---</option>
												<option>Borrowed Book</option>
												<option>Returned Book</option>
											</select>
                                        </div>
                                    </div>
                                </div>
								
								<button type="submit" name="search" class="btn btn-primary btn-outline pull-right"><i class="fa fa-calendar-o"></i> Search By Transaction Date</button>-->
								
						</form>
						<br/>
						<span>
					<?php 
					$count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report`")) or die(mysqli_error());
					$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `transaction_detail` = 'Borrowed Book'")) or die(mysqli_error());
				//	$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Returned Book'")) or die(mysqli_error());
					?>
				<a href="report.php"><button class="btn-outline pull-left" style=" font-size: 18px;"><i class="fa fa-info"></i> The number of recent reports is  <strong><?php echo $count['total']; ?></strong></button></a>
							<!--<a href="borrowed_report.php"><button class="btn btn-success btn-outline pull-right"><i class="fa fa-info"></i> List of Borrowed Reports (<?php //echo $count1['total']; ?>)</button></a>
							<!--<a href="returned_report.php"><button class="btn btn-danger btn-outline pull-right"><i class="fa fa-info"></i> Returned Reports (<?php //echo $count2['total']; ?>)</button></a>-->
				
				</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Students Name</th>
									<th>Book Title</th>
									<th>Book Transaction</th>
									<th>Admin or Staff In Charge</th>
									<th>Date Transaction</th>
								</tr>
							</thead>
							<tbody>
							
							<?php
              $result= mysqli_query($con,"select * from report 
              LEFT JOIN book ON report.book_id = book.book_id 
              LEFT JOIN student ON report.user_id = student.user_id 
              order by report.report_id DESC ") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['report_id'];
              $book_id=$row['book_id'];
              $user_name=$row['firstname']." ".$row['middlename']." ".$row['lastname'];
              
              ?>
							<tr>
								<td><?php echo $user_name; ?></td>
								<td><?php echo $row['book_title']; ?></td>
								<td><?php echo $row['transaction_detail']; ?></td>
								<td><?php echo $row['admin_name']; ?></td> 
								<td><?php echo date("d/M/Y H:i:s A",strtotime($row['transaction_date'])); ?></td>
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