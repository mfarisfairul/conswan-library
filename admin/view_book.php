<?php include ('header.php'); ?>

        <div class="page-title">
            <div class="title_left">
                <h3>
					 View Book Information | <small><a href="home.php">Home</a> > <a href="book.php">Book</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row" style="background-color: #000F2A;">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-info"></i> Book Information</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a href="book.php"><button class="btn btn-danger">
								   <i class="fas fa-reply"></i> Back
							   </button></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- content starts here -->

						<div class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
								
							<thead style="background-color: #EEEEEE">
								<tr>
									<th style="width:100px;">Book Image</th>
									<th>Book Barcode</th>
									<th>Book Title</th>
									<th>Book Level</th>
									<th>ISBN</th>
									<th>Book Category</th>
									<th>Book Publisher</th>
									<th>Year Publish</th>
									<th>Author/s</th>
									<th>Book Copies</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
<?php
			   
		if (isset($_GET['book_id']))
		$id=$_GET['book_id'];
		$result1 = mysqli_query($con,"SELECT * FROM book 
		LEFT JOIN category on book.category_id = category.category_id 
		WHERE book_id='$id'");
		while($row = mysqli_fetch_array($result1)){
		?>
							<tr>
								<td>
								<?php if($row['book_image'] != ""): ?>
								<img src="upload/<?php echo $row['book_image']; ?>" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php else: ?>
								<img src="images/book_image.jpg" width="150px" height="180px" style="border:4px groove #CCCCCC; border-radius:5px;">
								<?php endif; ?>
								</td> 
								<td><?php echo $row['book_barcode']; ?></td>
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['book_title']; ?></td>
								<td><?php echo $row['book_level']; ?></td>
								<td><?php echo $row['isbn']; ?></td>
								<td><?php echo $row['subject_category']; ?></td> 
								<td><?php echo $row['book_publisher']; ?></td>
								<td><?php echo $row['year_publish']; ?></td> 
								<td style="word-wrap: break-word; width: 10em;"><?php echo $row['author']."<br />".$row['author_2']."<br />".$row['author_3']."<br />".$row['author_4']."<br />".$row['author_5']; ?></td>
								<td><?php echo $row['book_copies']; ?></td> 
								<td><?php echo $row['status']; ?></td> 
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