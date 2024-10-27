<?php
include "connect.php";

$id=$_GET['updateid'];
$sql="SELECT * from `users` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
    $f_Name=$row['f_Name'];
    $m_name=$row['m_name'];
    $L_name=$row['L_name'];
    $Birthdate=$row['Birthdate'];
    $Address=$row['Address'];
    $contact=$row['contact'];
    $age=$row['age'];
    $sex=$row['sex'];
    $usertype=$row['usertype'];
    $username=$row['username'];
    $password=$row['password'];
    $reset_password=$row['reset_password'];


    if(isset($_POST['Update'])){
    $f_Name= $_POST['f_name'];
    $m_name= $_POST['m_name'];
    $L_name= $_POST['L_name'];
    $Birthdate= $_POST['Birthdate'];
    $Address= $_POST['Address'];
    $contact= $_POST['contact'];
    $age= $_POST['age'];
    $sex= $_POST['sex'];
    $usertype= $_POST['UserType'];
    $username= $_POST['Username'];
    $password= $_POST['password'];
    $reset_password= $_POST['resetPassword'];

     $sql="UPDATE `users` SET 
     f_Name='$f_Name',
     m_name='$m_name',
     L_name='$L_name',
     Birthdate='$Birthdate',
     Address='$Address',
     contact='$contact',
     age='$age',
     sex='$sex',
     usertype='$usertype',
     username='$username',
     password='$password',
     reset_password='$reset_password'
      WHERE id='$id'
     ";
     $result=mysqli_query($con,$sql);
     if($result){
        header('location:admin_userList.php');
     }else{
        die(mysqli_error($con));
     }


    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSM_Update_userList</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c5cdba9a5c.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="admin_container">

        <div class="side_navbar">
<ul>
    <lh class="add_user"><i class="fa-solid fa-user-plus"></i> <span>Add User</span></lh>
    <a href="#"><li id="Add_doctor"><i class="fa-solid fa-plus"></i> Doctor</li></a>
    <a href="#"><li id="Add_Nurse"><i class="fa-solid fa-plus"></i>Nurse</li></a>
    <a href="#"><li id="Add_Receptionist"><i class="fa-solid fa-plus"></i>Receptionist</li></a>


    <lh  class="add_user"><i class="fa-solid fa-user-minus"></i><span>Remove User</span></lh>
    <a href="#"><li><i class="fa-solid fa-minus"></i> Doctor</li></a>
    <a href="#"><li><i class="fa-solid fa-minus"></i>Nurse</li></a>
    <a href="#"><li><i class="fa-solid fa-minus"></i>Receptionist</li></a>


    <a href="admin_patientList.php"><li><i class="fa-solid fa-bed"></i>Patient List</li></a>
    <a  href="#"><li><i class="fa-solid fa-users"></i>Users List</li></a>

    <a href="#"><li><i class="fa-solid fa-gear"></i>System Setting</li></a>
    <a href="#"><li><i class="fa-solid fa-right-from-bracket"></i>Logout</li></a>
</ul>




        </div>


        <div class="top_navbar">
     <h3 class="dashboad">Dashboard</h3>
     <p class="admind">Admin</p>

     <div class="searchbar">
        <i class="fa-solid fa-magnifying-glass"></i>

        <input type="search" placeholder="Search here" class="input_search">

     </div>

     <div class="user_Name">
      <p>Timothy Minani</p>

     </div>

     <div class="profile">
        <i class="fa-solid fa-user"></i>
     </div>


     

        </div>

        <div class="main_container">
<h3>User List</h3>

<div class="table_body">
<table>
    <thead>
    <tr>
        <th>User Id</th>
        <th>Fist Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>User Type</th>
        <th>Birthdate</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Age</th>
        <th>Sex</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>




<?php

$sql="Select * from `users`";
$result= mysqli_query($con,$sql);


while($row=mysqli_fetch_assoc($result)){
$id=$row['id'];
$f_name=$row['f_Name'];
$m_name=$row['m_name'];
$L_name=$row['L_name'];
$Birthdate=$row['Birthdate'];
$Address=$row['Address'];
$contact=$row['contact'];
$age=$row['age'];
$sex=$row['sex'];
$usertype=$row['usertype'];
$username=$row['username'];
$reset_password=$row['reset_password'];

echo' <tr>
        <td>'.$id.'</td>
        <td>'.$f_name.'</td>
        <td>'.$m_name.'</td>
        <td>'.$L_name.'</td>
        <td>'.$usertype.'</td>
        <td>'.$Birthdate.'</td>
        <td>'.$Address.'</td>
        <td>'.$contact.'</td>
        <td>'.$age.'</td>
        <td>'.$sex.'</td>
        <td class="">
            <a href="#"> <span class="editbtn">Edit</span> </a>
            <a href="#"> <span class="removedbtn">Remove</span> </a>
        </td>
    </tr>';


}


?>


   



   


   



</tbody>
</table>

</div>
            
        </div>


    </div>

    <div class="userUpdate">
<h4 class="create_text">Update User Account</h4>
<i id="close"   class="fa-solid fa-xmark"></i>
<hr>

<div class="userInformation">
    <h5 class="userInfo">User Information</h5>
</div>

<div class="userInfor_form">

<form method="POST">

<div class="fname_user">
    <label for="fname">First Name</label>
    <input type="text" name="f_name" autocomplete="off" value="<?php echo $f_Name; ?>"> 
</div>

<div class="fname_user">
    <label for="">Middle Name</label>
    <input type="text" name="m_name" autocomplete="off" value="<?php echo $m_name; ?>"> 
</div>

<div class="fname_user">
    <label for="">Last Name</label>
    <input type="text" name="L_name" autocomplete="off" value="<?php echo $L_name; ?>"> 
</div>

<div class="fname_user">
    <label for="">Birthdate</label>
    <input type="date" name="Birthdate" class="Birthdate" autocomplete="off" value="<?php echo $Birthdate; ?>"> 
</div>

<div class="fname_user">
    <label for="">Address</label>
    <input type="text" name="Address" autocomplete="off" value="<?php echo $Address; ?>"> 
</div>

<div class="fname_user">
    <label for="">Contact</label>
    <input type="text" name="contact" autocomplete="off" value="<?php echo $contact; ?>"> 
</div>

<div class="fname_user">
    <label for="">Age</label>
    <input type="text" name="age" autocomplete="off" value="<?php echo $age; ?>"> 
</div>

<div class="fname_userAge">
    <label for="">Sex:</label><br>
    <input type="radio" name="sex" value="male" <?php if($sex == 'male') echo 'checked'; ?>> Male
    <input type="radio" name="sex" value="female" <?php if($sex == 'female') echo 'checked'; ?>> Female
</div>

<div class="userAcount_info">

    <hr>
    <h5>User Account:</h5>

    <label>Select User Type:</label><br>
    <select name="UserType" id="" class="select_user">
        <option value="User" <?php if($usertype == 'User') echo 'selected'; ?>>User</option>
        <option value="Receptionist" <?php if($usertype == 'Receptionist') echo 'selected'; ?>>Receptionist</option>
        <option value="Doctor" <?php if($usertype == 'Doctor') echo 'selected'; ?>>Doctor</option>
        <option value="Nurse" <?php if($usertype == 'Nurse') echo 'selected'; ?>>Nurse</option>
        <option value="Admin" <?php if($usertype == 'Admin') echo 'selected'; ?>>Admin</option>
    </select>

    <div class="userAcount_info2">

        <div class="fname_user">
            <label for="">Username</label>
            <input type="text" name="Username" autocomplete="off" value="<?php echo $username; ?>"> 
        </div>
    
        <div class="fname_user">
            <label for="">Password</label>
            <input type="password" name="password" autocomplete="off"> <!-- Leave empty for security -->
        </div>
    
        <div class="fname_user">
            <label for="">Reset Password</label>
            <input type="text" name="resetPassword" autocomplete="off" value="<?php echo $reset_password; ?>"> 
        </div>

        <div class="user_updateBtn">
            <input type="submit" name="Update" value="Update"> 
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