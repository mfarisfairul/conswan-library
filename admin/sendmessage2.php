<?php
include ('include/dbcon.php');

if(isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$pnum = $_POST['pnum'];
	$result=mysqli_query($con, "select pnum from student WHERE firstname='$firstname' & pnum='$pnum'") or die(mysqli_error());
	$row = mysqli_fetch_array($result);
	$message = $_POST['message'];
	header("location:https://api.whatsapp.com/send?phone=$pnum&text=Nama:%20$firstname%20$middlename%20$lastname%0DMessage:%20$message");
} else {
	echo"
	<script>
	window.location=history.go(-1);
	</script>
	";
}
?>