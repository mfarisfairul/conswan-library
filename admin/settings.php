<?php include ('header.php'); 
//echo "<script>alert('You are in Settings Page!'); </script>";
?>


        <div class="page-title" >
            <div class="title_left" >
                <h3 >
				    Settings | <small><a href="home.php">Home</a></small>
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
<div class="row" style="background-color: #DDDDDD;">
	<br/>	
	<?php include ('allowed_qntty.php'); ?>
	
	<?php include('penalty.php'); ?>
	
	<?php include ('allowed_days.php'); ?>
	
	
	<div class="clearfix"></div>
</div>

<?php include ('footer.php'); ?>