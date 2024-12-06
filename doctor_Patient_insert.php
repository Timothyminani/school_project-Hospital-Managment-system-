<?php
include "connect.php";




if(isset($_POST['p_Submit'])){
    // Fetch form data and escape special characters
    $P_fname = mysqli_real_escape_string($con, $_POST['P_fname'] ?? '');
    $p_Mname = mysqli_real_escape_string($con, $_POST['p_Mname'] ?? '');
    $p_Lname = mysqli_real_escape_string($con, $_POST['p_Lname'] ?? '');
    $p_Birthdate = mysqli_real_escape_string($con, $_POST['p_Birthdate'] ?? '');
    $P_Address = mysqli_real_escape_string($con, $_POST['P_Address'] ?? '');
    $p_Contact = mysqli_real_escape_string($con, $_POST['p_Contact'] ?? '');
    $p_Age = mysqli_real_escape_string($con, $_POST['p_Age'] ?? '');
    $p_Sex = mysqli_real_escape_string($con, $_POST['p_Sex'] ?? '');
    $Blood_group = mysqli_real_escape_string($con, $_POST['Blood_group'] ?? '');
    $Blood_pressure = mysqli_real_escape_string($con, $_POST['Blood_pressure'] ?? '');
    $weight = mysqli_real_escape_string($con, $_POST['weight'] ?? '');
    $Temprature = mysqli_real_escape_string($con, $_POST['Temprature'] ?? '');
    $Height = mysqli_real_escape_string($con, $_POST['Height'] ?? '');
    $More_info = mysqli_real_escape_string($con, $_POST['More_info'] ?? '');

    // Ensure all fields are set before proceeding
    if ($P_fname && $p_Mname && $p_Lname && $p_Birthdate && $P_Address && $p_Contact && $p_Age && $p_Sex && $Blood_group && $Blood_pressure && $weight && $Temprature && $Height && $More_info) {
        
        // Prepare SQL query
        $sql = "INSERT INTO `patient` (p_first_name, p_middle_name, p_last_name, p_Birthdate, p_Address, p_contact, p_age, p_sex, Blood_group, Blood_pressure, weight, temperature, height, More_info) 
                VALUES ('$P_fname', '$p_Mname', '$p_Lname', '$p_Birthdate', '$P_Address', '$p_Contact', '$p_Age', '$p_Sex', '$Blood_group', '$Blood_pressure', '$weight', '$Temprature', '$Height', '$More_info')";

        // Execute the query
        $result = mysqli_query($con, $sql);

        // Check if the query was successful
        if($result){
            header('location:doctor_patientList.php');
        } else {
            die("Error: " . mysqli_error($con));
        }
    } else {
        echo "All fields are required!";
    }
}
?>
