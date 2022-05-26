<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Returned Book Monitoring | <small><a href="home.php">Home</a>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-book"></i> Returned Books Monitoring</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
							<a href="returned_book_print.php" target="_blank" style="background:none;">
							<button name="print" type="submit" class="btn btn-danger"><i class="fa fa-print"></i> Print</button>
							</a>
							</li>
                           
                        </ul>
						
                        <div class="clearfix"></div>
						
						<form method="POST" class="form-inline">
						
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo (isset($_POST['datefrom'])) ? $_POST['datefrom']: ''; ?>" name="datefrom" class="form-control has-feedback-left" placeholder="Date From" aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(Successfully)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-3">
                                            <input type="date" style="color:black;" value="<?php echo (isset($_POST['dateto'])) ? $_POST['dateto']: ''; ?>" name="dateto" class="form-control has-feedback-left" placeholder="Date To" aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(Successfully)</span>
                                        </div>
                                    </div>
                                </div>
								
								<button type="submit" name="search" class="btn btn-primary btn-outline pull-right"><i class="fa fa-calendar-o"></i> Search By Date Borrowed</button>
								
						</form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
    <?php
    	$_SESSION['datefrom'] = $_POST['datefrom'];
    	$_SESSION['dateto'] = $_POST['dateto'];
    ?>
	<?php
    	$datefrom = $_POST['datefrom'];
    	$dateto = $_POST['dateto'];
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN student ON return_book.user_id = student.user_id 
							where return_book.date_returned BETWEEN '".$_POST['datefrom']." 00:00:01' and '".$_POST['dateto']." 23:59:59' 
							order by return_book.return_book_id DESC") or die (mysqli_error());
							$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book 
							where return_book.date_returned BETWEEN '".$_POST['datefrom']." 00:00:01' and '".$_POST['dateto']." 23:59:59'  ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
							?>
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
						<span style="float:left;">
					<?php 
					// $count = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` where report.date_transaction BETWEEN '$datefrom 00:00:01' and '$dateto 23:59:59' and report.detail_action like '%$status%'")) or die(mysqli_error());
					// $count1 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Borrowed Book'")) or die(mysqli_error());
					// $count2 = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) as total FROM `report` WHERE `detail_action` = 'Returned Book'")) or die(mysqli_error());
					?>
							<a href="returned_book.php"><button class="btn btn-primary"><i class="fa fa-reply"></i> Back <?php // echo $count_penalty['total']; ?></button></a>
					<!---		<a href="borrowed_report.php"><button class="btn btn-success btn-outline"><i class="fa fa-info"></i> Borrowed Reports (<?php // echo  $count1['total']; ?>)</button></a>
							<a href="returned_report.php"><button class="btn btn-danger btn-outline"><i class="fa fa-info"></i> Returned Reports (<?php // echo $count2['total']; ?>)</button></a>
					-->
						</span>
                                <div class="pull-right">
                                    <div class="span"><div class="alert alert-info" style="background-color: #000F2A;"><i class="far fa-credit-card"></i>&nbsp;Total Amount of Fine:&nbsp;<?php echo "RM ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
							<thead style="background-color: #EEEEEE">
								<tr>
									<th>Book Barcode</th>
									<th>Borrower Name</th>
									<th>Book Title</th>
								<!---	<th>Author</th>
									<th>ISBN</th>	-->
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
									<th>Fine</th>
								</tr>
							</thead>
							<tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_book_id'];
?>
							<tr>
								<td><?php echo $return_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['firstname']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize"><?php echo $return_row['book_title']; ?></td>
							<!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
								<td><?php echo date("d/M/Y H:i:s A",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No fine are imposed'){
									 echo "<td class='' style='width:100px;'>".date("d/M/Y H:i:s A",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td>".date("d/M/Y H:i:s A",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No fine are imposed'){
									 echo "<td class='' style='width:100px;'>".date("d/M/Y H:i:s A",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td>".date("d/M/Y H:i:s A",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No fine are imposed'){
									 echo "<td class='alert alert-warning' style='width:100px;'> ".$return_row['book_penalty'].".</td>";
								 }else {
									 echo "<td>".$return_row['book_penalty']."</td>";
								 }
								
								?>
							</tr>
							
							<?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger"><strong>Info!</strong> No Books has been returned at this date</td>
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