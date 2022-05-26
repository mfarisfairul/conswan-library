<?php 

include('include/dbcon.php');

$get_id=$_GET['admin_id'];

mysqli_query($con,"delete from admin_staff where admin_id = '$get_id' ")or die(mysqli_error());
echo "<script>alert('Successfully Delete Admin & Staff Info!'); window.location='admin.php'</script>";
?>