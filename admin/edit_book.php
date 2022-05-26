<?php include ('include/dbcon.php');
$ID=$_GET['book_id'];
 ?>
<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					Edit Book Information | <small><a href="home.php">Home</a> > <a href="book.php">Book</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
					
                    <div class="x_title">
                        <h2><i class="fa fa-pencil"></i> Edit Book Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="book.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->
<?php
  $query1=mysqli_query($con,"select * from book 
  LEFT JOIN category ON book.category_id = category.category_id
  where book_id='$ID'")or die(mysqli_error());
$row=mysqli_fetch_assoc($query1);
  ?>

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Image
                                    </label>
                                    <div class="col-md-4">
										<a href=""><?php if($row['book_image'] != ""): ?>
										<img src="upload/<?php echo $row['book_image']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php else: ?>
										<img src="images/book_image.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
										<?php endif; ?>
										</a>
                                        <input type="file" style="height:44px; margin-top:10px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Book Title
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_title" value="<?php echo $row['book_title']; ?>" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								<div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Book Level
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_level" value="<?php echo $row['book_level']; ?>" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author" id="first-name2" value="<?php echo $row['author']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 2
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_2" id="first-name2" value="<?php echo $row['author_2']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 3
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_3" id="first-name2" value="<?php echo $row['author_3']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 4
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_4" id="first-name2" value="<?php echo $row['author_4']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 5
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_5" id="first-name2" value="<?php echo $row['author_5']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Publish
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_publisher" value="<?php echo $row['book_publisher']; ?>" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Year Publish
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="year_publish" value="<?php echo $row['year_publish']; ?>" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISBN
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="isbn" id="last-name2" value="<?php echo $row['isbn']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Copies
                                    </label>
                                    <div class="col-md-4">
                                        <input type="number" name="book_copies" value="<?php echo $row['book_copies']; ?>" step="1" min="0" max="10">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Status
                                    </label>
									<div class="col-md-4">
                                        <select name="status" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
											<option value="New">New</option>
											<option value="Old">Old</option>
											<option value="Lost">Lost</option>
											<option value="Damaged">Damaged</option>
											<option value="Replacement">Replacement</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Category
                                    </label>
									<div class="col-md-4">
                                        <select name="category_id" class="select2_single form-control" tabindex="-1" >
                                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['subject_category']; ?></option>
										<?php
										$result= mysqli_query($con,"select * from category") or die (mysqli_error());
										while ($row= mysqli_fetch_array ($result) ){
										$id=$row['category_id'];
										?>
                                            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['subject_category']; ?></option>
										<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
								  <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times-circle-o"></i> Reset</button>
                                        <button type="submit" name="update11" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Update</button>
                                    </div>
                                </div>
                            </form>
							
<?php
$id =$_GET['book_id'];
if (isset($_POST['update11'])) {
							$image = $_FILES["image"] ["name"];
							$image_name= addslashes($_FILES['image']['name']);
							$size = $_FILES["image"] ["size"];
							$error = $_FILES["image"] ["error"];
							


							if ($error > 0){
										
					$book_title=$_POST['book_title'];
					$book_level=$_POST['book_level'];
					$category_id=$_POST['category_id'];
					$author=$_POST['author'];
					$author_2=$_POST['author_2'];
					$author_3=$_POST['author_3'];
					$author_4=$_POST['author_4'];
					$author_5=$_POST['author_5'];
					$book_copies=$_POST['book_copies'];
					$book_publisher=$_POST['book_publisher'];
					$year_publish=$_POST['year_publish'];
					$isbn=$_POST['isbn'];
					$status=$_POST['status'];
                    $book_image = $row['book_image'];


					if ($status == 'Lost') {
						$book_available = 'Not Available';
					} elseif ($status == 'Damaged') {
						$book_available = 'Not Available';
					} else {
						$book_available = 'Available';
					}


mysqli_query($con," UPDATE book SET book_title='$book_title', book_level='$book_level', category_id='$category_id', author='$author', author_2='$author_2', author_3='$author_3', author_4='$author_4', author_5='$author_5', book_copies='$book_copies', book_publisher='$book_publisher', year_publish='$year_publish', isbn='$isbn', status='$status', book_available='$book_available' WHERE book_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated Book Info!'); window.location='book.php'</script>";	

									}else{
										if($size > 10000000) //conditions for the file
										{
										die("Format is not allowed or file size is too big!");
										}
										
if(!empty($_FILES["image"]["tmp_name"])){
move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);          
$profile=$_FILES["image"]["name"];
$bi = " ,book_image = '$profile' ";
}else{
    $bi = '';
}

					$book_title=$_POST['book_title'];
					$book_level=$_POST['book_level'];
					$category_id=$_POST['category_id'];
					$author=$_POST['author'];
					$author_2=$_POST['author_2'];
					$author_3=$_POST['author_3'];
					$author_4=$_POST['author_4'];
					$author_5=$_POST['author_5'];
					$book_copies=$_POST['book_copies'];
					$book_publisher=$_POST['book_publisher'];
					$year_publish=$_POST['year_publish'];
					$isbn=$_POST['isbn'];
					$status=$_POST['status'];


					if ($status == 'Lost') {
						$book_available = 'Not Available';
					} elseif ($status == 'Damaged') {
						$book_available = 'Not Available';
					} else {
						$book_available = 'Available';
					}
					
mysqli_query($con," UPDATE book SET book_title='$book_title', book_level='$book_level', category_id='$category_id', author='$author', author_2='$author_2', author_3='$author_3', author_4='$author_4', author_5='$author_5', book_copies='$book_copies', book_publisher='$book_publisher', year_publish='$year_publish', isbn='$isbn', status='$status', book_available='$book_available' $bi WHERE book_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated Book Info!'); window.location='book.php'</script>";	

}
}
?>
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
        </div>

<?php include ('footer.php'); ?>