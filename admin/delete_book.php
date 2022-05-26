<?php 

include('include/dbcon.php');

$get_id=$_GET['book_id'];

mysqli_query($con,"delete from book where book_id = '$get_id' ")or die(mysqli_error());
echo "<script>alert('Successfully Delete Book Info!'); window.location='book.php'</script>";
?>