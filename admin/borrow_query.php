<?php 
	include ('include/dbcon.php');
	
	if (isset($_POST['submit'])) {
	
	$student_num = $_POST['student_num'];
	
	$sql = mysqli_query($con,"SELECT * FROM user WHERE student_num = '$student_num' ");
	$count = mysqli_num_rows($sql);
	$row = mysqli_fetch_array($sql);
	
		if($count <= 0){
			echo "<div class='alert alert-success'>".'<strong>Info!</strong>The student number entered is incorrect'."</div>";
		}else{
			$student_num = $_POST['student_num'];
			header('location: borrow_book.php?student_num='.$student_num);
		} 
	}
?>