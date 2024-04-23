<?php
include 'connection.php';
$id=$_GET['id'];
$delete=mysqli_query($connect,"DELETE from school where id=$id");
if($delete){
    header("location:index.php");
}
?>