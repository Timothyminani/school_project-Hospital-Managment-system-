<?php
include "connect.php";

$id=$_GET['deleteid'];

$sql="DELETE from `patient` WHERE patient_id=$id";
$result=mysqli_query($con,$sql);
if($result){
    header('location:Receptionist_patient_list.php');
}else{
    die(mysqli_error($con));
}

?>