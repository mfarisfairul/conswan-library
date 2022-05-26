<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Borrowed Book Monitoring | <small><a href="home.php">Home</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
<!--	<div class="col-xs-3">
		<form method="POST" action="sort_returned_book.php">
		<input type="date" class="form-control" name="sort" value="<?php //echo date('Y-m-d'); ?>">
		<button type="submit" class="btn btn-primary btn-outline" style="margin:-34px -195px 0px 0px; float:right;" name="ok"><i class="fa fa-calendar-o"></i> Sort By Date Returned</button>
		</form>
	</div>
-->
                        <h2><i class="fa fa-book"></i> Borrowed Books Monitoring</h2>
                        <ul class="nav navbar-right panel_toolbox">
							<li>
							<a href="borrow.php"><button class="btn btn-warning">
								   <i class="fas fa-reply"></i> Back
							 </button></a>
							</li>
                            <li>
							<a href="print_borrowed_books.php" target="_blank" style="background:none;">
							<button class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a>
							</li>
							
                        </ul>
                        <div class="clearfix"></div>
		<!--- sort -->
						<form method="GET" action="borrowed_search.php" class="form-inline">
                                  <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(Successfully)</span>
                                        </div>
                                    </div>
                                </div>
							
                               <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo date('Y-m-d'); ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4" required />
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(Successfully)</span>
                                        </div>
                                    </div>
                                </div>
								
								<button type="submit" name="search" class="btn btn-success btn-outline pull-right"><i class="fa fa-calendar-o"></i> Search By Borrowed Date</button>
								
						</form>
                    </div>
                       <!--         <div class="pull-right">
                                    <div class="span">
											<form method="POST" target="_blank" action="print_returned_book.php">
												<button name="print" class="btn btn-danger">
													<i class="fa fa-print"></i>
													Print
												</button>
											</form>
									</div>
                                </div>
							-->
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">							
							<?php
							$where ="";
							if(isset($_GET['search'])){
								$where = " and (date(borrow_book.date_borrowed) between '".date("Y-m-d",strtotime($_GET['datefrom']))."' and '".date("Y-m-d",strtotime($_GET['dateto']))."' ) ";
							}
							
							$return_query= mysqli_query($con,"SELECT * from borrow_book 
							LEFT JOIN book ON borrow_book.book_id = book.book_id 
							LEFT JOIN student ON borrow_book.user_id = student.user_id 
							where borrow_book.borrowed_status = 'borrowed' $where order by borrow_book.borrow_book_id DESC") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
								
							// $count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
							// $count_penalty_row = mysqli_fetch_array($count_penalty);
							
							?>
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
                                <!-- <div class="pull-left">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Penalty:&nbsp;<?php echo "RM ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div> -->
								
							<thead style="background-color: #EEEEEE;">
								<tr>
									<th>Book Barcode</th>
									<th>Borrower Name</th>
									<th>Book Title</th>
								<!---	<th>Author</th>-->
									<th>ISBN</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<!-- <th>Date Returned</th> -->
									<!-- <th>Penalty</th> -->
								</tr>
							</thead>
							<tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['borrow_book_id'];
?>
							<tr>
								<td><?php echo $return_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['book_title']; ?></td>
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>-->
								<td><?php  echo $return_row['isbn']; ?></td>
								<td><?php echo date("d/M/Y H:i:s A",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No fine are imposed'){
									 echo "<td class='' style='width:100px;'>".date("d/M/Y H:i:s A",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td>".date("d/M/Y H:i:s A",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 // if ($return_row['book_penalty'] != 'No Penalty'){
									//  echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 // }else {
									//  echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 // }
								
								?>
								<?php
								 // if ($return_row['book_penalty'] != 'No Penalty'){
									//  echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
								 // }else {
									//  echo "<td>".$return_row['book_penalty']."</td>";
								 // }
								
								?>
							</tr>
							
							<?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger"><strong>Info!</strong> No Books borrowed at this moment</td>
										</tr>
									</table>
								';
							} 							
							?>
							</tbody>
							</table>
						</div>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>