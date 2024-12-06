<?php
include "connect.php";


session_start();
if(!isset($_SESSION['username'])){
    header('location:home.php');
}

?>


<?php
include "connect.php";

$id=$_GET['updatePatient_id'];
$sql="SELECT * from `patient` where patient_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
    $p_first_name=$row['p_first_name'];
    $p_middle_name=$row['p_middle_name'];
    $p_last_name=$row['p_last_name'];
    $p_Birthdate=$row['p_Birthdate'];
    $p_Address=$row['p_Address'];
    $p_contact=$row['p_contact'];
    $p_age=$row['p_age'];
    $p_sex=$row['p_sex'];
    $Blood_group=$row['Blood_group'];
    $Blood_pressure=$row['Blood_pressure'];
    $weight=$row['weight'];
    $temperature=$row['temperature'];
    $height=$row['height'];
    $More_info=$row['More_info'];


    if(isset($_POST['Update'])){
    $p_first_name= $_POST['P_fname'];
    $p_middle_name= $_POST['p_Mname'];
    $p_last_name= $_POST['p_Lname'];
    $p_Birthdate= $_POST['p_Birthdate'];
    $p_Address= $_POST['p_Address'];
    $p_contact= $_POST['p_Contact'];
    $p_age= $_POST['p_Age'];
    $p_sex= $_POST['p_Sex'];
    $Blood_group= $_POST['Blood_group'];
    $Blood_pressure= $_POST['Blood_pressure'];
    $weight= $_POST['weight'];
    $temperature= $_POST['Temprature'];
    $height= $_POST['Height'];
    $More_info= $_POST['More_info'];

     $sql="UPDATE `patient` SET 
     p_first_name='$p_first_name',
     p_middle_name='$p_middle_name',
     p_last_name='$p_last_name',
     p_Birthdate='$p_Birthdate',
     p_Address='$p_Address',
     p_contact='$p_contact',
     p_age='$p_age',
     p_sex='$p_sex',
     Blood_group='$Blood_group',
     Blood_pressure='$Blood_pressure',
     weight='$weight',
     temperature='$temperature',
     height='$height',
     More_info='$More_info'
      WHERE patient_id='$id'
     ";
     $result=mysqli_query($con,$sql);
     if ($result) {
       
        header('location:Receptionist_patient_list.php');
    
     }else{
        die("Error: " . mysqli_error($con));
        exit;
     }


    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSM_Receptionist_patient_list</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c5cdba9a5c.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="admin_container">

        <div class="side_navbar">
<ul id="Patient_registration">
    <lh > <span id="add_patient">Patient Registration</span></lh>
    <a href="#"><li id="Add_doctor"> <i class="fa-solid fa-plus"></i>Add A Patient</li></a>
    <a href="#"><li id="Patient_list"><i class="fa-solid fa-bed"></i>Patient List</li></a>
    <a href="Receptionist_AdmitedPatient.php"><li id="Patient_admited"><i class="fa-solid fa-bed"></i>Patient Admited</li></a>
</ul>

<ul>
    <a href="logout.php"><li id="Logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</li></a>
</ul>




        </div>


        <div class="top_navbar">
     <h3 class="dashboad">Dashboard</h3>
     <p class="admind">Receptionist</p>

     <div class="searchbar">
        <i class="fa-solid fa-magnifying-glass"></i>

        <input type="search" placeholder="Search here" class="input_search">

     </div>

     <div class="user_Name">
     <p><?php 
      
      echo $_SESSION['f_Name'];
      echo " ";
      echo $_SESSION['L_name'];
      ?>
    </p>

     </div>

     <div class="profile">
        <i class="fa-solid fa-user"></i>
     </div>


     

        </div>

        <div class="main_container">

            <h3>Patient List</h3>

<div class="table_body">
<table>
    <thead>
    <tr>
        <th>Patient Id</th>
        <th>Fist Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Birthdate</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Age</th>
        <th>Sex</th>
        <th>Blood group</th>
        <th>Blood pressure</th>
        <th>Weight</th>
        <th>Height</th>
        <th>More_information</th>
        <th>Admitted</th>
        <th>Released</th>
        <th>Discharge</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>

<?php

$sql="Select * from `patient`";
$result= mysqli_query($con,$sql);


while($row=mysqli_fetch_assoc($result)){
$patient_id=$row['patient_id'];
$p_first_name=$row['p_first_name'];
$p_middle_name=$row['p_middle_name'];
$p_last_name=$row['p_last_name'];
$p_Birthdate=$row['p_Birthdate'];
$p_Address=$row['p_Address'];
$p_contact=$row['p_contact'];
$p_age=$row['p_age'];
$p_sex=$row['p_sex'];
$Blood_group=$row['Blood_group'];
$Blood_pressure=$row['Blood_pressure'];
$weight=$row['weight'];
$temperature=$row['temperature'];
$height=$row['height'];
$More_info=$row['More_info'];
$Admitted=$row['Admitted'];
$Released=$row['Released'];
$Discharge=$row['Discharge'];

echo'<tr>
        <td>'.$patient_id.'</td>
        <td>'.$p_first_name.'</td>
        <td>'.$p_middle_name.'</td>
        <td>'.$p_last_name.'</td>
        <td>'.$p_Birthdate.'</td>
        <td>'.$p_Address.'</td>
        <td>'.$p_contact.'</td>
        <td>'.$p_age.'</td>
        <td>'.$p_sex.'</td>
        <td>'.$Blood_group.'</td>
        <td>'.$Blood_pressure.'</td>
        <td>'.$weight.'</td>
        <td>'.$temperature.'</td>
        <td>'.$height.'</td>
        <td>'.$More_info.'</td>
        <td>'.$Admitted.'</td>
        <td>'.$Released.'</td>
        <td>'.$Discharge.'</td>
        <td>
           <a href="#" > <span class="btn_edit">Edit</span> </a>
           <a href="#"> <span class="btn_remove">Remove</span> </a>
        </td>
    </tr>

';


}


?> 




</tbody>
</table>

</div>
            
        </div>


            
        </div>


    </div>


   

    <div class="Patient_update" >
<h4 class="create_text">Patient Registration</h4>
<i id="close"   class="fa-solid fa-xmark"></i>
<hr>

<div class="userInformation">
    <h5 class="userInfo">Patient Information</h5>
</div>

<div class="userInfor_form">
<form action="" method="POST">

<div class="fname_user">
    <label for="fname">First Name</label>
    <input type="text" name="P_fname" 

    value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $p_first_name=$row['p_first_name']; ?>"> 
</div>

<div class="fname_user">
    <label for="fname">Middle Name</label>
    <input type="text" name="p_Mname" 
     value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo  $p_middle_name=$row['p_middle_name']; ?>"> 
</div>

<div class="fname_user">
    <label for="fname">Last Name</label>
    <input type="text" name="p_Lname" 
     value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $p_last_name=$row['p_last_name']; ?>"> 
</div>

<div class="fname_user">
    <label for="fname">Birthdate</label>
    <input type="date" name="p_Birthdate" class="Birthdate"  
    value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $p_Birthdate=$row['p_Birthdate']; ?>"> 
</div>

<div class="fname_user">
    <label for="fname">Address</label>
    <input type="text" name="p_Address"     
    value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $p_Address=$row['p_Address']; ?>" > 
</div>

<div class="fname_user">
    <label for="fname">Contact</label>
    <input type="text" name="p_Contact"  
    value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $p_contact=$row['p_contact'];?>"> 
</div>

<div class="fname_user">
    <label for="fname">Age</label>
    <input type="text" name="p_Age"  
    value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $p_age=$row['p_age']; ?>"> 
</div>

<div class="fname_userAge">
    <label for="fname">Sex:</label><br>
    <input type="radio" name="p_Sex" value="Male"   <?php if($p_sex == 'Male') echo 'checked'; ?>> Male
    <input type="radio" name="p_Sex" value="Female"  <?php if($p_sex == 'Female') echo 'checked'; ?>> Female
</div>

<div class="userAcount_info">

    <hr>
    <h5>Patient health Information:</h5>


    <div class="userAcount_info2">

        <div class="fname_user">
            <label for="fname">Blood group</label>
            <input type="text" name="Blood_group"  
            value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $Blood_group=$row['Blood_group']; ?>"> 
        </div>
    
        <div class="fname_user">
            <label for="fname">Blood pressure</label>
            <input type="text" name="Blood_pressure" 
             value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $Blood_pressure=$row['Blood_pressure']; ?>"> 
        </div>
    
        <div class="fname_user">
            <label for="fname">Weight</label>
            <input type="text" name="weight"  
             value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $weight=$row['weight']; ?>"> 
        </div>

        <div class="fname_user">
            <label for="fname">Temprature</label>
            <input type="text" name="Temprature" 
             value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $temperature=$row['temperature']; ?>"> 
        </div>

        <div class="fname_user">
            <label for="fname">Height</label>
            <input type="text" name="Height"   
            value="<?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $height=$row['height']; ?>"> 
        </div>

        <div class="fname_user">
            <label for="fname">More information</label>
           <textarea name="More_info" > <?php $id = $_GET['updatePatient_id'];
$sql = "SELECT * FROM `patient` WHERE patient_id = $id";
$result= mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

 echo $More_info=$row['More_info']; ?> </textarea>
        </div>

        <div class="patient_UpdateSubmit">
            <input type="submit" name="Update" value="Update" > 
        </div>
    
    </div>



</div>



</form>

</div>

    </div>

    <footer class="footer">
        <p class="address">Rehema medical clinic, 1234 Medical Ruiru, Kiambu, Kenya</p>
        <h3 class="Privacy">Privacy and Security</h3>
        <p class="privacy_text">Your privacy and data security are our top priority. All information is securely stored and managed in compliance with relevant data protection regulations.</p>
        <h3 class="Privacy">Contact Information</h3>
        <div class="contact_info">
            <i class="fa-solid fa-phone"></i>
            <h5 class="Phone_number">0769295800</h5>
            <i class="fa-brands fa-whatsapp"></i>
            <h5 class="Phone_Whatsapp">0769295800</h5>
            <i class="fa-regular fa-envelope"></i>
            <h5 class="Phone_email">timothyminani@gmail.com</h5>
        </div>
        
        
        <p class="copyright">&copy; 2024 Timothy Minani. All rights reserved.</p>
        
        
        
         </footer>

<script src="script.js"></script>
</body>
</html>