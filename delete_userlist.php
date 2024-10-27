<?php
include "connect.php";

$id=$_GET['deleteid'];

$sql="DELETE from `users` WHERE id=$id";
$result=mysqli_query($con,$sql);
if($result){
    header('location:admin_userList.php');
}else{
    die(mysqli_error($con));
}

?>