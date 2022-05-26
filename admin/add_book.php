<?php

			include ('include/dbcon.php');
						$query = mysqli_query($con,"SELECT * FROM `barcode` ORDER BY mid_barcode DESC ") or die (mysqli_error());
						$fetch = mysqli_fetch_array($query);
						$mid_barcode = $fetch['mid_barcode'];
						
						$new_barcode =  $mid_barcode + 1;
						$pre_barcode = "CONS";
						$suf_barcode = "LMS";
						$generate_barcode = $pre_barcode.$new_barcode.$suf_barcode;
?>

<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					 Add Book Information | <small><a href="home.php">Home</a> > <a href="book.php">Book</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-plus-circle"></i> Add Book Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
							<a href="book.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
							<input type="hidden" name="new_barcode" value="<?php echo $new_barcode; ?>">
							
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Book Title <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_title" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="control-label col-md-4" for="first-name"> Book Level <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_level" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">ISBN <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="isbn" id="last-name2" class="form-control col-md-7 col-xs-12" required="required">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name"> Book Category <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="category_id" class="select2_single form-control" tabindex="-1" required="required">
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
								
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Publisher <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_publisher" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Year Publish <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="year_publish" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 1 <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 2 <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_2" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 3 
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_3" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 4
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_4" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="first-name">Author 5
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="author_5" id="first-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Copies <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" name="book_copies" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Status <span class="required" style="color:red;">*</span>
                                    </label>
									<div class="col-md-4">
                                        <select name="status" class="select2_single form-control" tabindex="-1" required="required">
											<option value=""></option>
											<option value="New">New</option>
											<option value="Old">Old</option>
											<option value="Lost">Lost</option>
											<option value="Damaged">Damaged</option>
											<option value="Replacement">Replacement</option>
                                        </select>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="last-name">Book Image
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" style="height:44px;" name="image" id="last-name2" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times-circle-o"></i> Reset</button>
                                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-plus-square"></i> Submit</button>
                                    </div>
                                </div>
                            </form>
							
            <?php

			include ('include/dbcon.php');
			if (!isset($_FILES['image']['tmp_name'])) {
			echo "";
			}else{
			$file=$_FILES['image']['tmp_name'];
			$image = $_FILES["image"] ["name"];
			$image_name= addslashes($_FILES['image']['name']);
			$size = $_FILES["image"] ["size"];
			$error = $_FILES["image"] ["error"];
			{
						if($size > 10000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
						
					else
						{

					move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
					$book_image=$_FILES["image"]["name"];
					
					$book_title=$_POST['book_title'];
					$book_level=$_POST['book_level'];
					$isbn=$_POST['isbn'];
					$category_id=$_POST['category_id'];
					$book_publisher=$_POST['book_publisher'];
					$year_publish=$_POST['year_publish'];
					$author=$_POST['author'];
					$author_2=$_POST['author_2'];
					$author_3=$_POST['author_3'];
					$author_4=$_POST['author_4'];
					$author_5=$_POST['author_5'];
					$book_copies=$_POST['book_copies'];
					$status=$_POST['status'];
					
					
					$pre = "CONS";
					$mid = $_POST['new_barcode'];
					$suf = "LMS";
					$gen = $pre.$mid.$suf;
					
					if ($status == 'Lost') {
						$book_available = 'Not Available';
					} elseif ($status == 'Damaged') {
						$book_available = 'Not Available';
					} else {
						$book_available = 'Still Available';
					}
					
					{
					mysqli_query($con,"insert into book (book_title,book_level,isbn,category_id,book_publisher,year_publish,author,author_2,author_3,author_4,author_5,book_copies,book_available,status,book_barcode,book_image,book_added)
					values('$book_title','$book_level','$isbn','$category_id','$book_publisher','$year_publish','$author','$author_2','$author_3','$author_4','$author_5','$book_copies','$book_available','$status','$gen','$book_image',NOW())")or die(mysqli_error());
					
					mysqli_query($con,"insert into barcode (pre_barcode,mid_barcode,suf_barcode) values ('$pre', '$mid', '$suf') ") or die (mysqli_error());
						echo "<script>alert('Book Successfully Added!');
						window.location='book.php'</script>";
					}
					header("location: view_barcode.php?code=".$gen);
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