<?php 
error_reporting(0);
include('session.php');
include ('include/dbcon.php');

?>
<html>

<head>
		<title>Conswan Library | Returned Book Information</title>
		
		<style>
		
		
.container {
	width:100%;
	margin:auto;
}
		
.table {
    width: 100%;
    margin-bottom: 20px;
    background-color: #EBEBEB;
}	
tr,td,th{
	border:1px solid black;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
    background-color: #BBBBBB;
}
		
@media print{
#print {
display:none;
}
}

#print {
	width: 90px;
    height: 30px;
    font-size: 18px;
    background: white;
    border-radius: 4px;
	margin-left:28px;
	cursor:hand;
}
		</style>
		
<script>
function printPage() {
    window.print();
}
</script>
</head>


<body>
	<div class = "container">
		<div id = "header">
		<br/>
				<img src = "images/logo convent.jpeg" style = " margin-top:-17px; float:left; margin-left:115px; margin-bottom:-6px; width:80px; height:80px;">
				<img src = "images/ppd.png" style = " margin-top:-17px; float:right; margin-right:115px; width:80px; height:80px;" >
				<center><h5 style = "font-style:sans-serif; margin-top:-14px;"></h5> &nbsp; &nbsp; Conswan Library Management System</center>
				<center><h5 style = "font-style:sans-serif; margin-top:-14px;"></h5> &nbsp; SMK CONVENT SITIAWAN, PERAK</center><br/>
				
<button type="submit" id="print" onclick="printPage()">Print</button>	
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">Returned Book Information&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
<?php
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN student ON return_book.user_id = student.user_id 
							where return_book.return_book_id order by return_book.return_book_id DESC") or die (mysqli_error());
							$return_count = mysqli_num_rows($return_query);
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
?>
						<table class="table table-striped">
                                <div class="pull-left">
                                    <div class="span"><div class="alert alert-info"><i class="icon-credit-card icon-large"></i>&nbsp;Total Amount of Fine:&nbsp;<?php echo "RM ".$count_penalty_row['sum(book_penalty)'].".00"; ?></div></div>
                                </div>
								<br />
						  <thead>
								<tr>
								<tr>
									<th>Book Barcode</th>
									<th>Borrower Name</th>
									<th>Book Title</th>
									<th>Book Level</th>
							        <!--<th>Author</th>-->
									<th>ISBN</th>
									<th>Date Borrowed</th>
									<th>Due Date</th>
									<th>Date Returned</th>
									<th>Fine</th>
								</tr>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_book_id'];
?>
							<tr style="height:30px;">
								<td style="text-align:center;"><?php echo $return_row['book_barcode']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['book_title']; ?></td>
								<td style="text-transform: capitalize; text-align:center;"><?php echo $return_row['book_level']; ?></td>
								<td><?php echo $return_row['isbn']; ?></td>
								<td style="text-align:center;"><?php echo date("d/M/Y H:i:s A",strtotime($return_row['date_borrowed'])); ?></td>
								<?php
								 if ($return_row['book_penalty'] != 'No fine are imposed'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("d/M/Y H:i:s A",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("d/M/Y H:i:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No fine are imposed'){
									 echo "<td class='' style='width:100px; text-align:center;'>".date("d/M/Y H:i:s A",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td style='text-align:center;'>".date("d/M/Y H:i:s A",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
								<?php
								 if ($return_row['book_penalty'] != 'No fine are imposed'){
									 echo "<td class='alert alert-warning' style='width:100px; text-align:center;'> RM ".$return_row['book_fine'].".00</td>";
								 }else {
									 echo "<td style='text-align:center;'>".$return_row['book_penalty']."</td>";
								 }
								
								?>
							</tr>
							
							
							<?php 
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger"><strong>Info!</strong> No transaction has took place</td>
										</tr>
									</table>
								';
							} 							
							?>
							</tr>  
						  </tbody> 
					  </table> 

<br />
<br />
							<?php
								include('include/dbcon.php');
								$user_query=mysqli_query($con,"select * from admin_staff where admin_id='$id_session'")or die(mysqli_error());
								$row=mysqli_fetch_array($user_query); {
							?>        <h2><i class="glyphicon glyphicon-user"></i> <?php echo '<span style="color:blue; font-size:15px;">Prepared by:'."<br />".$row['firstname']." ".$row['lastname']." ".'</span>';?></h2>
								<?php } ?>


			</div>
	
	
	
	

	</div>
</body>


</html>