<?php
include "connect.php";

if(isset($_POST['Submit'])){
   
    $fname = $_POST['f_name'] ?? null;
    $sname = $_POST['m_name'] ?? null;
    $lname = $_POST['L_name'] ?? null;
    $birthdate = $_POST['Birthdate'] ?? null;
    $address = $_POST['Address'] ?? null;
    $age = $_POST['age'] ?? null;
    $contact = $_POST['contact'] ?? null;
    $sex = $_POST['sex'] ?? null;
    $usertype = $_POST['UserType'] ?? null;
    $username = $_POST['Username'] ?? null;
    $password = $_POST['password'] ?? null;
    $Repassword = $_POST['resetPassword'] ?? null;

   
    if ($fname && $sname && $lname && $birthdate && $address && $age && $contact && $sex && $usertype && $username && $password && $Repassword) {
        
       
        if ($password !== $Repassword) {
            die("Passwords do not match!");
        }

       
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $sql = "INSERT INTO `users` (f_Name, m_name, L_name, Birthdate, Address, contact, age, sex, usertype, username, password, reset_password) 
                VALUES ('$fname', '$sname', '$lname', '$birthdate', '$address', '$contact', '$age', '$sex', '$usertype', '$username', '$hashed_password', '$Repassword')";

       
        $result = mysqli_query($con, $sql);

       
        if($result){
            header('location:admin_userList.php');
        } else {
            die("Error: " . mysqli_error($con));
        }
    } else {
        echo "All fields are required!";
    }
}


mysqli_close($con);
?>





<?php
include "connect.php";




if(isset($_POST['p_Submit'])){
   
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


    if ($P_fname && $p_Mname && $p_Lname && $p_Birthdate && $P_Address && $p_Contact && $p_Age && $p_Sex && $Blood_group && $Blood_pressure && $weight && $Temprature && $Height && $More_info) {
        
      
        $sql = "INSERT INTO `patient` (p_first_name, p_middle_name, p_last_name, p_Birthdate, p_Address, p_contact, p_age, p_sex, Blood_group, Blood_pressure, weight, temperature, height, More_info) 
                VALUES ('$P_fname', '$p_Mname', '$p_Lname', '$p_Birthdate', '$P_Address', '$p_Contact', '$p_Age', '$p_Sex', '$Blood_group', '$Blood_pressure', '$weight', '$Temprature', '$Height', '$More_info')";

      
        $result = mysqli_query($con, $sql);

       
        if($result){
            header('location:Receptionist_patient_list.php');
        } else {
            die("Error: " . mysqli_error($con));
        }
    } else {
        echo "All fields are required!";
    }
}
?>
