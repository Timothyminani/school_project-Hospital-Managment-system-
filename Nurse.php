<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:home.php');
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSM_Nurse</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c5cdba9a5c.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="admin_container">

        <div class="side_navbar">
<ul id="Patient_rgstr">
    <lh > <span id="add_patient">Patient Registration</span></lh>
    <a href="#"><li id="Add_doctor"> <i class="fa-solid fa-plus"></i>Add A Patient</li></a>
    <a href="Nurse_patient_List.php"><li id="Patient_list"><i class="fa-solid fa-bed"></i>Patient List</li></a>
    <a href="Nurse_patient_Admited.php"><li id="Patient_admited"><i class="fa-solid fa-bed"></i>Patient Admited</li></a>
</ul>

<ul id="Patient_treatment">
    <lh > <span id="Treatment_txt">Treatment</span></lh>
    <a href="Nurse_Outpatient_list.php"><li id="Outpatient"><i class="fa-solid fa-bed"></i>Outpatient</li></a>
    <a href="Nurse_Inpatient.php"><li id="Inpatient"><i class="fa-solid fa-bed-pulse"></i>Inpatient</li></a>
    <a href="Nurse_patient_discharged.php"><li id="Outpatient"><i class="fa-solid fa-bed"></i>Discharged Patient</li></a>
</ul>

<ul>
    <a href="logout.php"><li id="Logout_Doc"><i class="fa-solid fa-right-from-bracket"></i>Logout</li></a>
</ul>




        </div>


        <div class="top_navbar">
     <h3 class="dashboad">Dashboard</h3>
     <p class="admind">Nurse</p>

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

            <div class="dashboard_patientRecord">
                <h3 class="patientsRecords">Patients Records</h3>
                <hr class="record_line">

                <div class="patientRecords_box">
                      <h4 class="patientAdmit">Patients Admited</h4>
                      <hr class="admited_line">
                      <h1 class="numberA">00</h1>
                </div>

                <div class="patientRecords_box">
                    <h4 class="patientAdmit">Patients Dischaged</h4>
                    <hr class="admited_line">
                    <h1 class="numberA">00</h1>
                </div>

                <div class="patientRecords_box">
                    <h4 class="patientAdmit">Outpatients</h4>
                    <hr class="admited_line">
                    <h1 class="numberA">00</h1>
                </div>


            </div>

            
        </div>


    </div>

    <div class="userCreate" id="UserCreateA">
<h4 class="create_text">Patient Registration</h4>
<i id="close"   class="fa-solid fa-xmark"></i>
<hr>

<div class="userInformation">
    <h5 class="userInfo">Patient Information</h5>
</div>

<div class="userInfor_form">
<form action="">

<div class="fname_user">
    <label for="fname">First Name</label>
    <input type="text" name="fname" > 
</div>

<div class="fname_user">
    <label for="fname">Middle Name</label>
    <input type="text" name="fname" > 
</div>

<div class="fname_user">
    <label for="fname">Last Name</label>
    <input type="text" name="fname" > 
</div>

<div class="fname_user">
    <label for="fname">Birthdate</label>
    <input type="date" name="fname" class="Birthdate" > 
</div>

<div class="fname_user">
    <label for="fname">Address</label>
    <input type="text" name="fname" > 
</div>

<div class="fname_user">
    <label for="fname">Contact</label>
    <input type="text" name="fname" > 
</div>

<div class="fname_user">
    <label for="fname">Age</label>
    <input type="text" name="fname" > 
</div>

<div class="fname_userAge">
    <label for="fname">Sex:</label><br>
    <input type="radio" name="fname" > Male
    <input type="radio" name="fname" > Female
</div>

<div class="userAcount_info">

    <hr>
    <h5>Patient health Information:</h5>


    <div class="userAcount_info2">

        <div class="fname_user">
            <label for="fname">Blood group</label>
            <input type="text" name="fname" > 
        </div>
    
        <div class="fname_user">
            <label for="fname">Blood pressure</label>
            <input type="password" name="fname" > 
        </div>
    
        <div class="fname_user">
            <label for="fname">Weight</label>
            <input type="text" name="fname" > 
        </div>

        <div class="fname_user">
            <label for="fname">Temprature</label>
            <input type="text" name="fname" > 
        </div>

        <div class="fname_user">
            <label for="fname">Height</label>
            <input type="text" name="fname" > 
        </div>

        <div class="fname_user">
            <label for="fname">More information</label>
           <textarea></textarea>
        </div>

        <div class="fname_userSabmit">
            <input type="submit" name="fname" value="Cancel"> 
        </div>

        <div class="fname_userCancel">
            <input type="submit" name="fname" value="Submit" > 
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