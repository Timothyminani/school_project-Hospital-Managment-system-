<?php
include "connect.php";

if(isset($_POST['Submit'])){
    // Fetch form data
    $fname = $_POST['f_name'] ?? null;
    $sname = $_POST['m_name'] ?? null;
    $lname = $_POST['L_name'] ?? null;
    $birthdate = $_POST['Birthdate'] ?? null;
    $address = $_POST['Address'] ?? null; // Corrected typo
    $age = $_POST['age'] ?? null;
    $contact = $_POST['contact'] ?? null;
    $sex = $_POST['sex'] ?? null;
    $usertype = $_POST['UserType'] ?? null;
    $username = $_POST['Username'] ?? null;
    $password = $_POST['password'] ?? null;
    $Repassword = $_POST['resetPassword'] ?? null;

    // Ensure all fields are set before proceeding
    if ($fname && $sname && $lname && $birthdate && $address && $age && $contact && $sex && $usertype && $username && $password && $Repassword) {
        
        // Check if passwords match
        if ($password !== $Repassword) {
            die("Passwords do not match!");
        }

        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query
        $sql = "INSERT INTO `users` (f_Name, m_name, L_name, Birthdate, Address, contact, age, sex, usertype, username, password, reset_password) 
                VALUES ('$fname', '$sname', '$lname', '$birthdate', '$address', '$contact', '$age', '$sex', '$usertype', '$username', '$hashed_password', '$Repassword')";

        // Execute the query
        $result = mysqli_query($con, $sql);

        // Check if the query was successful
        if($result){
            header('location:admin_userList.php');
        } else {
            die("Error: " . mysqli_error($con));
        }
    } else {
        echo "All fields are required!";
    }
}

// Close the connection
mysqli_close($con);
?>
