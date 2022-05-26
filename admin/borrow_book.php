<?php include ('header.php'); ?>
<?php 
	$student_num = $_GET['student_num'];
    //$barcode=$_GET['book_barcode'];
	
	$user_query = mysqli_query($con,"SELECT * FROM student WHERE student_num = '$student_num' ");
	$user_row = mysqli_fetch_array($user_query);

    //$user_query1 = mysqli_query($con,"SELECT * FROM book WHERE book_barcode = '$barcode' ");
	//$user_row1= mysqli_fetch_array($user_query1);
?>
<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 40px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Book Loan Transaction | <small><a href="home.php">Home</a> > <a href="borrow.php">Begin To Borrow</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
					
					<?php
						$sql = mysqli_query($con,"SELECT * FROM student WHERE student_num = '$student_num' ");
						$row = mysqli_fetch_array($sql);
					?>
						
					<h2>
					Borrower Name : <span style="color:blue;"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></span>
					</h2>
                        <ul class="nav navbar-right panel_toolbox">
                           <a href="borrow.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
							
							   <button class="btn btn-warning pull-right" id="myBtn">
								   <i class="fas fa-share-square"></i> Copy Book Barcode
							   </button>
							   <div id="myModal" class="modal">

								  <!-- Modal content -->
								  <div class="modal-content">
									<span class="close">&times;</span>
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead style="background-color: #EEEEEE;">
							<tr>
								<th style="width:100px;">Book Image</th>
								<th>Book Barcode</th>
								<th>Book Title</th>
								<th>Book Level</th>
								<th>ISBN</th>
								<!--<th>Book Publisher</th>
								<th>Year Publish</th>
								<th>Author/s</th>-->
								<th>Book Copies</th>
								<th>Book Category</th>
								<th>Book Available</th>
								<th>Status</th>
								<th>Book Added</th>
							</tr>
						</thead
						<tbody>
							
							<?php
							$result= mysqli_query($con,"select * from book order by book_id DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
								$id=$row['book_id'];
								$category_id=$row['category_id'];
								
								$cat_query = mysqli_query($con,"select * from category where category_id = '$category_id'")or die(mysqli_error());
								$cat_row = mysqli_fetch_array($cat_query);
							?>
							
							<tr>
								<td>
									<?php if($row['book_image'] != ""): ?>
									<img src="upload/<?php echo $row['book_image']; ?>" class="img-thumbnail" width="100px" height="100px">
									<?php else: ?>
									<img src="images/book_image.jpg" class="img-thumbnail" width="100px" height="100px">
									<?php endif; ?>
								</td> 
								<td><?php echo $row['book_barcode']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['book_title']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['book_level']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['isbn']; ?></td>
								<!--<td style="word-wrap: break-word; width: 10em;"><?php //echo $row['book_publisher']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['year_publish']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']."<br />".$row['author_2']."<br />".$row['author_3'] ?>-->
								</td>
								<td><?php echo $row['book_copies']; ?></td> 
								<td><?php echo $cat_row['subject_category']; ?></td>
								<td><?php echo $row['book_available']; ?></td> 
								<td><?php echo $row['status']; ?></td> 
								<td><?php echo date("d/M/Y  H:i:s A", strtotime($row['book_added'])); ?></td>
								
								
							</tr>
							<?php } 
							?>
							</tbody>
					</table>
								  </div>

								</div>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
						
						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
								
							<thead>
								<tr>
									<th>Barcode</th>
									<th>Title</th>
									<th>Author</th>
									<th>ISBN</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Penalty</th>
									<th>Action</th>
							<?php 
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysqli_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$due_date= $borrow_row['due_date'];
								
								$timezone = "Asia/Kuala_Lumpur";
								if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
								$cur_date = date("Y-m-d H:i:s");
								$date_returned = date("Y-m-d H:i:s");
								//$due_date = strtotime($cur_date);
								//$due_date = strtotime("+3 day", $due_date);
								//$due_date = date('F j, Y g:i a', $due_date);
								///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
								
									$penalty_amount_query= mysqli_query($con,"select * from fine order by penalty_id DESC ") or die (mysqli_error());
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
							?>
								</tr>
							</thead>
							<tbody>
							
							<tr>
								
								<td><?php echo $borrow_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['book_title']; ?></td>
								<td style="text-transform: capitalize"><?php echo $borrow_row['author']; ?></td>
								<td><?php echo $borrow_row['isbn']; ?></td>
								<td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?></td>
								<?php
									if ($borrow_row['status'] != 'Hardbound') {
										echo "<td>".date('M d, Y h:m:s a',strtotime($borrow_row['due_date']))."</td>";
									} else {
										echo "<td>".'Hardbound Book, Inside Only'."</td>";
									}
								?>
							<!---	<td><?php // echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>	-->
								<?php
									if ($borrow_row['status'] != 'Hardbound') {
										echo "<td>".$penalty."</td>";
									} else {
										echo "<td>".'Hardbound Book, Inside Only'."</td>";
									}
								?>
							<!---	<td><?php // echo $penalty; ?></td>	-->
								<td>
								<form method="post" action="">
								<input type="hidden" name="date_returned" class="new_text" id="sd" value="<?php echo $date_returned ?>" size="16" maxlength="10"  />
								<input type="hidden" name="user_id" value="<?php echo $borrow_row['user_id']; ?>">
								<input type="hidden" name="borrow_book_id" value="<?php echo $borrow_row['borrow_book_id']; ?>">
								<input type="hidden" name="book_id" value="<?php echo $borrow_row['book_id']; ?>">
								<input type="hidden" name="date_borrowed" value="<?php echo $borrow_row['date_borrowed']; ?>">
								<input type="hidden" name="due_date" value="<?php echo $borrow_row['due_date']; ?>">
								<button name="return" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Return</button>
								</form>
								</td>
								
							</tr>
							
							<?php 
							}
							if ($borrow_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No books borrowed</td>
										</tr>
									</table>
								';
							} 							
							?>
							<?php
								if (isset($_POST['return'])) {
									$user_id= $_POST['user_id'];
									$borrow_book_id= $_POST['borrow_book_id'];
									$book_id= $_POST['book_id'];
									$date_borrowed= $_POST['date_borrowed'];
									$due_date= $_POST['due_date'];
									$date_returned = $_POST['date_returned'];

									$update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error());
									$copies_row= mysqli_fetch_assoc($update_copies);
									
									$book_copies = $copies_row['book_copies'];
									$new_book_copies = $book_copies + 1;
									
									if ($new_book_copies == '0') {
										$book_available = 'Not Available';
									} else {
										$book_available = 'Available';
									}
									
									mysqli_query($con,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id'") or die (mysqli_error());
									mysqli_query($con,"UPDATE book SET book_available = '$book_available' where book_id = '$book_id' ") or die (mysqli_error());
								
									$timezone = "Asia/Kuala_Lumpur";
									if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
									$cur_date = date("Y-m-d H:i:s");
									$date_returned_now = date("Y-m-d H:i:s");
									//$due_date = strtotime($cur_date);
									//$due_date = strtotime("+3 day", $due_date);
									//$due_date = date('F j, Y g:i a', $due_date);
									///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));			
									
									$penalty_amount_query= mysqli_query($con,"select * from fine order by penalty_id DESC ") or die (mysqli_error());
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
								
									mysqli_query($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error());
									
									$report_history1=mysqli_query($con,"select * from admin_staff where admin_id = $id_session ") or die (mysqli_error());
									$report_history_row1=mysqli_fetch_array($report_history1);
									$admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];	
									
									mysqli_query($con,"INSERT INTO report 
									(book_id, user_id, admin_name, transaction_detail, transaction_date)
									VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error());
									
							?>
									<script>
										window.location="borrow_book.php?student_num=<?php echo $student_num ?>";
									</script>
							<?php 
																}
							?>
							
							</tbody>
							</table>
						</div>
						
					<div class="row" style="margin-top:30px;">
						<form method="post">
							<div class="col-xs-4">
								<input type="text" style="margin-bottom:10px; margin-left:-9px;" class="form-control" name="barcode" placeholder="Enter Book Barcode here....." autofocus required />
								<button name="submit"  class="btn btn-success"><i class="fa fa-plus-circle"></i>  Submit</button></td>
							</div>
						</form>
						
						<table class="table table-bordered">
							<form method="post" action="">
							<th style="width:100px;">Book Image</th>
							<th>Barcode</th>
							<th>Title</th>
							<th>Author</th>
							<th>ISBN</th>
							<th>Status</th>
							<th>Action</th>
							<?php 
								
								//$_POST['barcode']= isset($_POST['barcode'])? $_POST['barcode']:'';
								if (isset($_POST['barcode'])){
									
									$barcode = $_POST['barcode'];
									
									$book_query = mysqli_query($con,"SELECT * FROM book WHERE book_barcode = '$barcode' ") or die (mysqli_error());
									$book_count = mysqli_num_rows($book_query);
									$book_row = mysqli_fetch_array($book_query);
									
									
									if (isset($book_row['book_barcode']) != $barcode){
										echo '
											<table>
												<tr>
													<td class="alert alert-info">No match for the barcode entered!</td>
												</tr>
											</table>
										';
									} elseif ($barcode == '') {
										echo '
											<table>
												<tr>
													<td class="alert alert-danger">Enter the correct details!</td>
												</tr>
											</table>
										';
									}else{
							?>
							<tr>
							<input type="hidden" name="user_id" value="<?php echo $user_row['user_id'] ?>">
							<input type="hidden" name="book_id" value="<?php echo $book_row['book_id'] ?>">

							<td>
							<?php if($book_row['book_image'] != ""): ?>
							<img src="upload/<?php echo $book_row['book_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
							<?php else: ?>
							<img src="images/book_image.jpg" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
							<?php endif; ?>
							</td> 
							<td><?php echo $book_row['book_barcode'] ?></td>
							<td style="text-transform: capitalize"><?php echo $book_row['book_title'] ?></td>
							<td style="text-transform: capitalize"><?php echo $book_row['author'] ?></td>
							<td><?php echo $book_row['isbn'] ?></td>
							<td><?php echo $book_row['status'] ?></td>
							<td><button name="borrow" class="btn btn-info"><i class="fa fa-check"></i> Borrow</button>
							<button name="reset" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Reset</button>
							</td>
							</tr>
							<?php } }?>

							<?php
							
							$allowable_days_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysqli_error());
							$allowable_days_row = mysqli_fetch_assoc($allowable_days_query);
							
							$timezone = "Asia/Kuala_Lumpur";
							if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
							$cur_date = date("Y-m-d H:i:s");
							$date_borrowed = date("Y-m-d H:i:s");
							$due_date = strtotime($cur_date);
							$due_date = strtotime("+".$allowable_days_row['no_of_days']." day", $due_date);
							$due_date = date('Y-m-d H:i:s', $due_date);
							///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
							?>
							<input type="hidden" name="due_date" class="new_text" id="sd" value="<?php echo $due_date ?>" size="16" maxlength="10"  />
							<input type="hidden" name="date_borrowed" class="new_text" id="sd" value="<?php echo $date_borrowed ?>" size="16" maxlength="10"  />
							
							<?php 
								if (isset($_POST['borrow'])){
									$user_id =$_POST['user_id'];
									$book_id =$_POST['book_id'];
									$date_borrowed =$_POST['date_borrowed'];
									$due_date =$_POST['due_date'];
									
									$trapBookCount= mysqli_query($con,"SELECT count(*) as books_allowed from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed'") or die (mysqli_error());
									
									$countBorrowed = mysqli_fetch_assoc($trapBookCount);
									
									$bookCountQuery= mysqli_query($con,"SELECT count(*) as book_count from borrow_book where user_id = '$user_id' and borrowed_status = 'borrowed' and book_id = $book_id") or die (mysqli_error());
									
									$bookCount = mysqli_fetch_assoc($bookCountQuery);
									
									$allowed_book_query= mysqli_query($con,"select * from allowed_book order by allowed_book_id DESC ") or die (mysqli_error());
									$allowed = mysqli_fetch_assoc($allowed_book_query);
									
									if ($countBorrowed['books_allowed'] == $allowed['total_book']){
										echo "<script>alert(' ".$allowed['total_book']." ".'Books Allowed per Student!'." '); window.location='borrow_book.php?student_num=".$student_num."'</script>";
									}elseif ($bookCount['book_count'] == 1){
										echo "<script>alert('Sorry! Book Already Borrowed!'); window.location='borrow_book.php?student_num=".$student_num."'</script>";
									}else{
										
									$update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error());
									$copies_row= mysqli_fetch_assoc($update_copies);
									
									$book_copies = $copies_row['book_copies'];
									$new_book_copies = $book_copies - 1;
									
									if ($new_book_copies < 0){
										echo "<script>alert('Sorry! Book out of Copy!'); window.location='borrow_book.php?student_num=".$student_num."'</script>";
									}elseif ($copies_row['status'] == 'Damaged'){
										echo "<script>alert('Sorry! Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?student_num=".$student_num."'</script>";
									}elseif ($copies_row['status'] == 'Lost'){
										echo "<script>alert('Sorry! Book Cannot Borrow At This Moment!'); window.location='borrow_book.php?student_num=".$student_num."'</script>";
									}else{
										
									if ($new_book_copies == '0') {
										$book_available = 'Not Available';
									} else {
										$book_available = 'Available';
									}
									
									mysqli_query($con,"UPDATE book SET book_copies = '$new_book_copies' where book_id = '$book_id' ") or die (mysqli_error());
									mysqli_query($con,"UPDATE book SET book_available = '$book_available' where book_id = '$book_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO borrow_book (user_id,book_id,date_borrowed,due_date,borrowed_status)
									VALUES('$user_id','$book_id','$date_borrowed','$due_date','borrowed')") or die (mysqli_error());
									
									$report_history=mysqli_query($con,"select * from admin_staff where admin_id = $id_session ") or die (mysqli_error());
									$report_history_row=mysqli_fetch_array($report_history);
									$admin_row=$report_history_row['firstname']." ".$report_history_row['middlename']." ".$report_history_row['lastname'];	
									
									mysqli_query($con,"INSERT INTO report 
									(book_id, user_id, admin_name, transaction_detail, transaction_date)
									VALUES ('$book_id','$user_id','$admin_row','Borrowed Book',NOW())") or die(mysqli_error());
									
									}
									}
							?>
									<script>
										window.location="borrow_book.php?student_num=<?php echo $student_num ?>";
									</script>
							<?php	
								}
							?>
							</form>
						</table>
						
					</div>
				</div>
						
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


<?php include ('footer.php'); ?>