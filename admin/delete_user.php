<?php 

include('include/dbcon.php');

$get_id=$_GET['user_id'];

mysqli_query($con,"delete from student where user_id = '$get_id' ")or die(mysqli_error());
echo "<script>alert('Successfully Delete Student Info!'); window.location='user.php'</script>";
?>