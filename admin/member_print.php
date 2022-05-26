<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php
include('session.php');

 include ('include/dbcon.php');

?>
<html>

<head>
		<title>Conswan Library | List of Students</title>
		
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
				<center><h5 style = "font-style:Poppins; font-weight:bold; margin-top:-14px;"></h5> &nbsp; &nbsp; Conswan Library Management System</center>
				<center><h5 style = "font-style:Poppins; font-weight:bold; margin-top:-14px;"></h5> &nbsp; SMK CONVENT SITIAWAN, PERAK</center><br/><br/>
			
			<div class="clearfix"></div>
			
			<button type="submit" id="print" onclick="printPage()">Print</button>	
			<p style = "margin-left:30px; margin-top:50px; font-size:14pt; font-weight:bold;">List of Students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <div align="right">
		<b style="color:blue;">Date Prepared:</b>
		<?php include('currentdate.php'); ?>
        </div>			
		<br/>
<?php
							$result= mysqli_query($con,"select * from student
							order by student.user_id DESC ") or die (mysqli_error());
?>
						<table class="table table-striped">
						  <thead>
								<tr>
								<tr>
									<th>Student Number</th>
									<th>Member Full Name</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th>Home Address</th>
									<th>Form</th>
									<th>Class</th>
									<th>Status</th>
								</tr>
								</tr>
						  </thead>   
						  <tbody>
<?php
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_id'];
							
?>
							<tr style="height:30px;">
								<td	style="text-align:center;"><?php echo $row['student_num']; ?></a></td> 
								<td	style="text-align:center;"><?php echo $row['firstname']." ".$row['lastname']; ?></td>  
								<td	style="text-align:center;"><?php echo $row['gender']; ?></td> 
								<td	style="text-align:center;"><?php echo $row['pnum']; ?></td>
								<td	style="text-align:center;"><?php echo $row['homeaddress']; ?></td> 
								<td	style="text-align:center;"><?php echo $row['form']; ?></td> 
								<td	style="text-align:center;"><?php echo $row['class']; ?></td> 
								<td	style="text-align:center;"><?php echo $row['status']; ?></td> 
							</tr>
					
							<?php 
							}					
							?>
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