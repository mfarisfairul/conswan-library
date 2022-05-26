<?php include ('include/dbcon.php');
$id=$_GET['user_id'];
 ?>

<?php include ('header.php');
$sql = "select * from student where user_id='$id'";
$query1 = mysqli_query($con,$sql);
$row1 = mysqli_fetch_assoc($query1);
?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Edit Students Information | <small><a href="home.php">Home</a> > <a href="user.php">Students</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Students Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
							<a href="user.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
							<a href="sendmessage1.php?firstname=<?php echo $row1['firstname']; ?>&middlename=<?php echo $row1['middlename']; ?>&lastname=<?php echo $row1['lastname']; ?>&pnum=<?php echo $row1['pnum'];?>"><button type="button" class="btn btn-primary"><i class="fas fa-share-square"></i> Send Message</button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from student where user_id='$id'")or die(mysqli_error()); $row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                              
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Student Number
                                    </label>
                                    <div class="col-md-2">
                                        <input type="text" value="<?php echo $row['student_num']; ?>" name="student_num" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name
									</label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="Middle Name....." id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender
                                    </label>
									<div class="col-md-4">
                                        <select name="gender" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
											<option value="Choose Below...">Choose below...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Phone Number
                                    </label>
                                    <div class="col-md-3">
                                        <input type='text' value="<?php echo $row['pnum']; ?>" autocomplete="off"  maxlength="15" name="pnum" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Home Address
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['homeaddress']; ?>" name="homeaddress" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Form
									</label>
									<div class="col-md-4">
                                        <select name="form" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['form']; ?>"><?php echo $row['form']; ?></option>
											<option value="Choose Below...">Choose below...</option>
                                            <option value="Form 1">Form 1</option>
                                            <option value="Form 2">Form 2</option>
											<option value="Form 3">Form 3</option>
											<option value="Form 4">Form 4</option>
											<option value="Form 5">Form 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Class
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="class" value="<?php echo $row['class']; ?>" placeholder="Input your Class" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
										<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times-circle-o"></i> Reset</button>
										
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
										<!--<a href="sendmessage1.php"><button type="button" class="btn btn-warning"><i class="fa fa-times-circle-o"></i> Send Message</button></a>-->
										
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['user_id'];
if (isset($_POST['update'])) {

$student_num = $_POST['student_num'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$pnum = $_POST['pnum'];
$homeaddress = $_POST['homeaddress'];
$form = $_POST['form'];
$class = $_POST['class'];

{		
mysqli_query($con," UPDATE student SET student_num='$student_num', firstname='$firstname', middlename='$middlename', lastname='$lastname', 
gender='$gender', pnum='$pnum', homeaddress='$homeaddress', form='$form', class='$class' WHERE user_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated Member Info!'); window.location='user.php'</script>";
}
								
								
// }
// }
}
?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>