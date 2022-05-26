
<?php require ('include/dbcon.php'); ?>
<?php require ('session.php'); 
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$lastname = $_GET['lastname'];
$pnum = $_GET['pnum'];
?>


<html>
<head>
<meta charset="utf-8">
<meta name=description content="">
<meta name=viewport content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="css/sendmessage.css">
<title>Conswan Library | Form Send WhatsApp</title>
</head>

<body>
	
	<section>
		<div class="container">
			<br/><br/><br/>
			<ul class="nav navbar-right panel_toolbox">
							<a href="user.php"><button class="btn btn-warning pull-right" style="height: 40px; width: 120px;">
								   <i class="fas fa-reply"></i> Back
							</button></a>
                        </ul>
			<br/><br/><br/>
			<h3>
				<i class="fab fa-whatsapp"></i> &nbsp;Form Messages To Students Via WhatsApp
			</h3>
			<br><br>
			
			<div class="row">
				<div class="col-6">
					
					<form action="sendmessage2.php" method="post" target="_blank">
						<div class="form-group">
							
							 <label for="firstname">Student Name</label>
							 <input type="text" name="firstname" value="<?php echo $firstname?>&nbsp;<?php echo $middlename?>&nbsp;<?php echo $lastname ?>" class="form-control" placeholder="Enter Student Name" required="required">
						</div>
						<div class="form-group">
							<br/>
							 <label for="firstname">Phone Number</label>
							 <input type="text" name="pnum" value="<?php echo $pnum ?>" class="form-control" placeholder="Enter Student Name" required="required">
						</div>
						<br/>
						<div class="form-group">
							 <label for="message">Message</label>
							<textarea class="form-control" name="message" rows="4" placeholder="Enter Message" required="required"></textarea>
						</div>
						<br/>
                    
						<input class="btn" style="height: 50px; width: 120px;" type="submit" name="submit" value="Send">
						<br/><br/><br/>
						<p style="color: white;">Copyright &copy; 2021 Conswan Library Management System</p>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
</html>





