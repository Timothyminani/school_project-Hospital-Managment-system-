<?php

include "connect.php";
include "Fuction_msg.php";

session_start();
if(!isset($_SESSION['username'])){
    header('location:home.php');
}

?>

<?php

if (isset($_POST['Release'])) {
    $id = $_GET['Treatment'];
    $PatientTreatment_Text = mysqli_real_escape_string($con, $_POST['PatientTreatment_Text']); // Escape special characters

    // Insert treatment info with escaped text
    $sql = "INSERT INTO treatment_info (patient_id, Treatment_Info) VALUES ('$id', '$PatientTreatment_Text')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Update patient's released status
        $sql = "UPDATE patient SET Released = 1 WHERE patient_id = $id";
        $result = mysqli_query($con, $sql);

        // Redirect after successful update
        header('Location: doctor_patientTreatment.php');
        exit();
    }
}

elseif (isset($_POST['Admit'])) {
    // Redirect to inpatient registration page
    $id = $_GET['Treatment'];
    header("Location: doctor_Treatment_Inpatientregister.php?Inpatient=$id");
    exit();
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HSM_Doctor_patientTreatment</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c5cdba9a5c.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="admin_container">

        <div class="side_navbar">
<ul id="Patient_rgstr">
    <lh > <span id="add_patient">Patient Registration</span></lh>
    <a href="#"><li id="Add_doctor"> <i class="fa-solid fa-plus"></i>Add A Patient</li></a>
    <a href="doctor_patientList.php"><li id="Patient_list"><i class="fa-solid fa-bed"></i>Patient List</li></a>
    <a href="doctorAdmitedPatient_list.php"><li id="Patient_admited"><i class="fa-solid fa-bed"></i>Patient Admited</li></a>
</ul>

<ul id="Patient_treatment">
    <lh > <span id="Treatment_txt">Treatment</span></lh>
    <a href="doctor_patientTreatment.php"><li id="P_treatment"> <i class="fa-solid fa-notes-medical"></i>Patient Treatment</li></a>
    <a href="doctor_Outpatient_list.php"><li id="Outpatient"><i class="fa-solid fa-bed"></i>Outpatient</li></a>
    <a href="doctorAdmitedPatient_list.php"><li id="Inpatient"><i class="fa-solid fa-bed-pulse"></i>Inpatient</li></a>
    <a href="doctor_dischargedPatient_list.php"><li id="Outpatient"><i class="fa-solid fa-bed"></i>Discharged Patient</li></a>
</ul>

<ul>
    <a href="logout.php"><li id="Logout_Doc"><i class="fa-solid fa-right-from-bracket"></i>Logout</li></a>
</ul>




        </div>


        <div class="top_navbar">
        <h3 class="dashboad"><a href="doctor.php">Dashboard</a></h3>
     <p class="admind">Doctor</p>

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
        <th>User Type</th>
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
        <td class=" ">
             <a href="#">  <span class="editbtn">Edit </span> </a>
            <a href="#"><span id="Treatment_bnt" class="removedbtn"  > Treatment</span> </a>
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



    
    <div class="patient_treatmentBox1" >
            <h3 class="patientTreatment_text">Patient Treatment</h3>
           

<div class="patient_treatment_text">
 <h4 class="prescription_text">Patient Treatment / Prescription</h4>
</div>
<form action="" method="POST">
<textarea name="PatientTreatment_Text" id="" placeholder="Write Here Patient Treatment Detail" class="text_area">

</textarea>




<div class="Release_btn">
    <input type="submit" name="Release" value="Release"> 
</div>


<div class="Admit_btn">
    <input type="submit" name="Admit" id="Admit" value="ADMIT"> 
</div>

</form>

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