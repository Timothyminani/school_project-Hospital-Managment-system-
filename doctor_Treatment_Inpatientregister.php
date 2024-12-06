<?php

include "connect.php";

session_start();
if(!isset($_SESSION['username'])){
    header('location:home.php');
}

?>


<?php

if (isset($_POST['Submit'])) {
    $id = $_GET['Inpatient'];
    $ReasonAdmission = mysqli_real_escape_string($con, $_POST['ReasonAdmission'] ?? '');
    $Medical_History = mysqli_real_escape_string($con, $_POST['Medical_History'] ?? '');
    $Social_History = mysqli_real_escape_string($con, $_POST['Social_History'] ?? '');    
    $Treatment_plan = mysqli_real_escape_string($con, $_POST['Treatment_plan'] ?? '');
    $insurance_provider = mysqli_real_escape_string($con, $_POST['insurance-provider'] ?? '');
    $Policy_number = mysqli_real_escape_string($con, $_POST['Policy_number'] ?? '');
    $ward = mysqli_real_escape_string($con, $_POST['ward'] ?? '');
    $Room_Number = mysqli_real_escape_string($con, $_POST['Room_Number'] ?? '');
    $Bed_Number = mysqli_real_escape_string($con, $_POST['Bed_Number'] ?? '');
    
   

        $sql = "INSERT INTO admission_info (patient_id, Reason_for_admission, Medical_Histo, Life_style, Treatment_plan, Isurance_provider, Policy_number, Ward_Unit, Room_number, Bed_Number) 
        VALUES ('$id', '$ReasonAdmission', '$Medical_History', '$Social_History', '$Treatment_plan', '$insurance_provider', '$Policy_number', '$ward', '$Room_Number', '$Bed_Number')";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $sql = "UPDATE patient SET Admitted = 1 WHERE patient_id = $id";
            $result = mysqli_query($con, $sql);

            header('Location: doctor_patientTreatment.php');


        } else {
            die("Error: " . mysqli_error($con));
        }

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
              <a href="doctor_patientTreatmentBox.php?Treatment='.$patient_id.'"><span id="Treatment_bnt" class="removedbtn"  > Treatment</span> </a>
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

   




    <div class="inpatientBox">

<i  id="inpatient_close"  class="fa-solid fa-xmark"></i>

<div class="inpatient_msg">
    <h3>Inpatient Registration</h3>
</div>


<form action="" method="POST">
<div class="reason_forAdmission">
    <h4 class="reason_forAdmission_msg">Resoan For Admission</h4>
</div>

<textarea name="ReasonAdmission" id="reason_description" placeholder="Describe the current symptoms or issues that led to hospitalization">

</textarea>


<div class="medical_history">
    <h4 class="reason_forAdmission_msg">Medical History</h4>
</div>

<textarea name="Medical_History" id="MedicalHistory_description" placeholder="Describe the Medical History of a patient">

</textarea>

<div class="medical_history">
    <h4 class="reason_forAdmission_msg">Life style & Social History</h4>
</div>

<textarea name="Social_History" id="MedicalHistory_description" placeholder="Describe the Medical History of a patient">

</textarea>


<div class="medical_history">
    <h4 class="reason_forAdmission_msg">Treatment Plan & On Going Treatment</h4>
</div>

<textarea name="Treatment_plan" id="MedicalHistory_description" placeholder="Describe the Medical History of a patient">

</textarea>

<div class="medical_history">
    <h4 class="reason_forAdmission_msg">Insurence Information</h4>
</div>

  <div class="insurence_provider">
<label for="insurance-provider">Insurance Provider:</label>
<input type="text" id="insurance-provider" name="insurance-provider">
  </div>

  <div class="insurence_provider">
    <label for="insurance-provider">Policy Number:</label>
    <input type="text" id="insurance-provider1" name="Policy_number">
      </div>

      <div class="medical_history">
        <h4 class="reason_forAdmission_msg"> Room Assignment</h4>
    </div>

    <div class="insurence_provider">

        <label for="ward">Ward/Unit:</label>
        <select id="ward" name="ward">
            <option value="general">General Ward</option>
            <option value="icu">ICU</option>
            <option value="surgery">Surgery</option>
        </select>
        
          </div>


          <div class="insurence_provider">
        
            <label for="ward2">Room Number:</label>
            <select id="ward2" name="Room_Number">
                <option value="104">104</option>
                <option value="202">202</option>
                <option value="23">23</option>
                <option value="104">104</option>
                <option value="202">202</option>
                <option value="23">23</option>
            </select>
            
              </div>


              <div class="insurence_provider">
        
                <label for="ward3">Bed Number:</label>
                <select id="ward3" name="Bed_Number">
                    <option value="104">104</option>
                    <option value="202">202</option>
                    <option value="23">23</option>
                    <option value="104">104</option>
                    <option value="202">202</option>
                    <option value="23">23</option>
                </select>
                
                  </div>

    


                


                 <hr class="line_submit">

                 <div class="submit_box">
                    <input type="submit" id="submit_btnCancel" value="Cancel">
                    <input type="submit" id="submit_btnSabmit" value="Submit" name="Submit">
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