<?php
include('include/dbcon.php');
include('session.php');

$logout_query=mysqli_query($con,"select * from admin_staff where admin_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$user=$row['firstname']." ".$row['lastname'];
session_destroy();
echo "<script>alert('Log out Successfully!'); window.location='index.php'</script>";

?>