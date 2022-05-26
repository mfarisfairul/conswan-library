<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Add Students Information | <small><a href="home.php">Home</a> > <a href="user.php">Students</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
						<h2><i class="fa fa-plus-circle"></i> Add Students Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
							<a href="user.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Student Number <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-2">
                                        <input type="text" name="student_num" placeholder="Insert student number" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="firstname" placeholder="Insert firstname" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="middlename" placeholder="Insert middlename" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Last Name <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="lastname" placeholder="Insert lastname" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Phone Number <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" autocomplete="on"  maxlength="15" name="pnum" value="+6" placeholder="+6" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Gender <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="gender" class="select2_single form-control" required="required" tabindex="-1" >
											<option value="---">Choose below</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>								
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Home Address <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Insert home address" name="homeaddress" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
								</div>
                                <div class="form-group">
									<label class="control-label col-md-4" for="last-name">Form <span class="required" style="color:red;">*</span>
									</label>
									<div class="col-md-4">
                                        <select name="form" class="select2_single form-control" required="required" tabindex="-1" >
											<option value="---">Choose below</option>
                                            <option value="Form 1">Form 1</option>
                                            <option value="Form 2">Form 2</option>
											<option value="Form 3">Form 3</option>
											<option value="Form 4">Form 4</option>
											<option value="Form 5">Form 5</option>
										</select>
									</div>
                                </div>
								 <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Class <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="text" name="class" placeholder="Insert class" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								
                              <!-- <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">User Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>	-->
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                       <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times-circle-o"></i>    Reset</button>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
							<?php	
							include ('include/dbcon.php');
                if (isset($_POST['submit'])){
$student_num = $_POST['student_num'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$pnum = $_POST['pnum'];
$homeaddress = $_POST['homeaddress'];
$form = $_POST['form'];
$class = $_POST['class'];
					
					$result=mysqli_query($con,"select * from student WHERE student_num='$student_num' ") or die (mysqli_error());
					$row=mysqli_num_rows($result);
					if ($row > 0)
					{
					echo "<script>alert('Student Already Active!'); window.location='user.php'</script>";
					}
					else
					{		
						mysqli_query($con,"insert into student (student_num,firstname, middlename, lastname, gender, pnum, homeaddress, form, class, status, user_added)
						values ('$student_num','$firstname', '$middlename', '$lastname', '$gender', '$pnum', '$homeaddress', '$form', '$class', 'Active', NOW())")or die(mysqli_error());
						echo "<script>alert('Student Successfully Added!'); window.location='user.php'</script>";
					}
			//						}
			//						}
							}
								?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>