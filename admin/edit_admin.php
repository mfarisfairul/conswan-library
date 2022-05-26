<?php include ('include/dbcon.php');
$ID=$_GET['admin_id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Edit Admin & Staff Information | <small><a href="home.php">Home</a> > <a href="admin.php">Admin & Staff</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Admin & Staff Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
							<a href="admin.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query=mysqli_query($con,"select * from admin_staff where admin_id='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Image
                                    </label>
                                    <div class="col-md-4">
										<a href=""><?php if($row['admin_image'] != ""): ?>
										<img src="upload/<?php echo $row['admin_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="images/user.png" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">First Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" placeholder="Insert firstname" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Middle Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="middlename" value="<?php echo $row['middlename']; ?>" placeholder="Insert middlename" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Last Name
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" placeholder="Insert lastname" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Username
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['username']; ?>" name="username" placeholder="Insert username" id="last-name2" required="required" maxlength="20" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Phone Number
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['pnum']; ?>" name="pnum" placeholder="Insert phone number" id="last-name2" required="required" autocomplete="off" maxlength="15" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Email
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" value="<?php echo $row['email']; ?>" name="email" placeholder="example@gmail.com" id="last-name2" required="required" maxlength="50" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Password
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" value="<?php echo $row['password']; ?>" name="password" placeholder="Insert password" id="last-name2" maxlength="8" required="required" maxlength="9" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Confirm Password
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" value="<?php echo $row['confirm_password']; ?>" name="confirm_password" placeholder="Insert confirm password" id="last-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Type <span class="required">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="admin_type" class="select2_single form-control" required="required" tabindex="-1" >
                                            <option value="<?php echo $row['admin_type']; ?>"><?php echo $row['admin_type']; ?></option>
											<option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
								</div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                       <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times-circle-o"></i>  Reset</button>
                                        <button type="submit" name="update" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['admin_id'];
if (isset($_POST['update'])) {
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							


							if ($error > 0){
										
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$pnum = $_POST['pnum'];
$confirm_password = $_POST['confirm_password'];
$admin_type = $_POST['admin_type'];
$admin_image = $row['admin_image'];

$result=mysqli_query($con,"select * from admin_staff") or die (mysqli_error());
$row=mysqli_num_rows($result);

if($password != $confirm_password)
{
echo "<script>alert('Wrong Password, Please Recheck again!'); window.location='admin.php'</script>";
}else
{
mysqli_query($con," UPDATE admin_staff SET firstname='$firstname', middlename='$middlename', lastname='$lastname', username='$username', pnum='$pnum', email='$email', password='$password', confirm_password='$confirm_password', admin_type='$admin_type', admin_image='$admin_image' WHERE admin_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Update Account Info!'); window.location='admin.php'</script>";	
}
									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										

move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
$profilepicture=$_FILES["image"]["name"];

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$pnum = $_POST['pnum'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$admin_type = $_POST['admin_type'];

$result=mysqli_query($con,"select * from admin_staff") or die (mysqli_error());
$row=mysqli_num_rows($result);

if($password != $confirm_password)
{
echo "<script>alert('Wrong Password, Please Recheck again!'); window.location='admin.php'</script>";
}else

{		
mysqli_query($con," UPDATE admin_staff SET firstname='$firstname', middlename='$middlename', lastname='$lastname', username='$username', pnum='$pnum', email='$email', password='$password', confirm_password='$confirm_password', admin_type='$admin_type', admin_image='$profilepicture' WHERE admin_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated Account Info!'); window.location='admin.php'</script>";
}

}
}
?>
						
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>