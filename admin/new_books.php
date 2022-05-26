	<?php include ('header.php'); ?>

			<div class="page-title">
				<div class="title_left">
					<h3>
						Books | <small><a href="home.php">Home</a></small>
					</h3>
				</div>
			</div>
			<div class="clearfix"></div>

			<div class="row" style="background-color: #000F2A;">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
								<a href="book_print5.php" target="_blank" style="background:none;">
								<button class="btn btn-danger pull-right"><i class="fa fa-print"></i> Print Books List</button>
								</a>
								<a href="add_book.php" style="background:none;">
				<button class="btn btn-primary btn-outline pull-right">
					<i class="fa fa-plus-circle"></i> Add Book
				</button>
				<a href="borrow.php" style="background:none;">
				<button class="btn btn-warning pull-right">
					<i class="fas fa-share-square"></i> Begin To Borrow
				</button>
			</a>
			</a>
			<br />
			<br />
			<div class="x_title">
				<h2><i class="fa fa-book"></i> List of Books</h2>
							<div class="clearfix"></div>
								<ul class="nav nav-pills">
									<li role="presentation"><a href="book.php">All</a></li>
									<li role="presentation" class="active"><a href="new_books.php">New Books</a></li>
									<li role="presentation"><a href="old_books.php">Old Books</a></li>
									<li role="presentation"><a href="lost_books.php">Lost Books</a></li>
									<li role="presentation"><a href="damage_books.php">Damaged Books</a></li>
									<li role="presentation"><a href="sub_rep.php">Replacement Books</a></li>
								</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<!-- content starts here -->

							<div class="table-responsive">
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

								<thead style="background-color: #EEEEEE">
									<tr>
										<!--<th style="width:100px;">Book Image</th>-->
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
								<th>Action</th>
									</tr>
								</thead>
								<tbody>

								<?php
								$result= mysqli_query($con,"select * from book where status = 'New' ") or die (mysqli_error());
								while ($row= mysqli_fetch_array ($result) ){
								$id=$row['book_id'];
								$category_id=$row['category_id'];

								$cat_query = mysqli_query($con,"select * from category where category_id = '$category_id'")or die(mysqli_error());
								$cat_row = mysqli_fetch_array($cat_query);
								?>
									<tr>
								<!--<td>
									<?php if($row['book_image'] != ""): ?>
									<img src="upload/<?php echo $row['book_image']; ?>" class="img-thumbnail" width="100px" height="100px">
									<?php else: ?>
									<img src="images/book_image.jpg" class="img-thumbnail" width="100px" height="100px">
									<?php endif; ?>
								</td> -->
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
									
									<td>
										<a class="btn btn-primary" style="width: 80px;" for="ViewAdmin" href="view_book.php <?php echo '?book_id='.$id; ?>">
										<i class="fas fa-eye"></i> View
										</a>
										<a class="btn btn-warning" style="width: 80px;" for="ViewAdmin" href="edit_book.php<?php echo '?book_id='.$id; ?>">
										<i class="fa fa-edit"></i> Edit
										</a>
										<a class="btn btn-danger" style="width: 80px;" for="DeleteAdmin" href="#delete<?php echo $id;?>" data-toggle="modal" data-target="#delete<?php echo $id;?>"><i class="fas fa-trash"></i> Delete
									    </a>
										<div class="modal fade" id="delete<?php  echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-user"></i> Book</h4>
											</div>
											<div class="modal-body">
													<div class="alert alert-danger">
														Are you sure you want to delete?
													</div>
													<div class="modal-footer">
													<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove icon-white"></i> No</button>
													<a href="delete_user.php<?php echo '?book_id='.$id; ?>" style="margin-bottom:5px;" class="btn btn-primary"><i class="glyphicon glyphicon-ok icon-white"></i> Yes</a>
													</div>
											</div>
											</div>
										</div>
										</div>
									</td> 
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