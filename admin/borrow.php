<?php include ('header.php'); 
?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					 Begin to borrow | <small><a href="home.php">Home</a> > <a href="book.php">Book</a> </small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
							<a href="book.php"><button class="btn btn-warning pull-right">
								   <i class="fas fa-reply"></i> Back
							</button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

<div class="container-fluid">
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	
						<form method="post" action="">
                                        <select name="student_num" class="select2_single form-control" required="required" tabindex="-1" >
										<option value="0">Select Student Number</option>
										<?php
										$result= mysqli_query($con,"select * from student where status = 'Active' ") or die (mysqli_error());
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['user_id'];
										?>
                                            <option value="<?php echo $row['student_num']; ?>"><?php echo $row['student_num']; ?> - <?php echo $row['firstname']; ?></option>
										<?php } ?>
                                        </select>
				<br />
				<br />
						<button name="submit" type="submit" class="btn btn-primary" style="margin-left:110px;"><i class="glyphicon glyphicon-log-in"></i> &nbsp;Submit</button>
						</form>

<?php
	include ('include/dbcon.php');

	if (isset($_POST['submit'])) {

	$student_num = $_POST['student_num'];

	$sql = mysqli_query($con,"SELECT * FROM student WHERE student_num = '$student_num' ");
	$count = mysqli_num_rows($sql);
	$row = mysqli_fetch_array($sql);

		if($count <= 0){
			echo "<div class='alert alert-success'>".'Student Number not match found !'."</div>";
		}else{
			$student_num = $_POST['student_num'];
			echo ('<script> location.href="borrow_book.php? student_num='.$student_num.'";</script');
		}
	}
?>

	</div>
	<div class="col-md-4"></div>
</div>
</div>			
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>