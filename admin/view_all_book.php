<?php include ('header.php'); ?>
<class="table-responsive">
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