<?php
session_start();
require 'connect.php';  // Connection to your MySQL database

$Invalid_password=0;
$Invalid_username=0;
$fillIn_all=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs
    if (!empty($username) && !empty($password)) {
        // Query to find the user in the database
        $stmt = $con->prepare("SELECT id, username, password, usertype, f_Name, L_name  FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Fetch the user data
            $user = $result->fetch_assoc();

            // Verify the password using password_verify
            if (password_verify($password, $user['password'])) {
                // Store user information in session
                $_SESSION['username'] = $user['username'];
                $_SESSION['usertype'] = $user['usertype'];
                $_SESSION['f_Name'] = $user['f_Name'];
                $_SESSION['L_name'] = $user['L_name'];

                // Redirect based on user type
                switch ($user['usertype']) {
                    case 'Doctor':
                        header("Location: doctor.php");
                        break;
                    case 'Nurse':
                        header("Location: Nurse.php");
                        break;
                    case 'Receptionist':
                        header("Location: Receptionist.php");
                        break;
                    case 'Admin':
                        header("Location: admin.php");
                        break;
                    default:
                        echo "Invalid user type!";
                        break;
                }
            } else {
                $Invalid_password=1;
            }
        } else {
            $Invalid_username=1;
        }
    } else {
        $fillIn_all=1;
    }
}
?>













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor_logIn</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c5cdba9a5c.js" crossorigin="anonymous"></script>
</head>
<body>


<div class="nav_container">
        <img src="logo.png" height="100" width="220" class="logo">

       <div class="links_nav">
          <ul>
           <a href="contact.html"><li>Contact Us</li></a>
           <a href="about.html"><li>Abouts Us</li></a>
          </ul>
        </div>
       
        <div class="login">
            <i class="fa-solid fa-user"></i>
            <span class="login_text">LogIn</span>
        </div>
        

    </div>



<div class="login_pic">
<div class="form_container">

    <div class="LogIn_text">
        <h3>LogIn As An Admin</h3>
     </div>


    <form  class="form_container_input"  method="POST">

<div class="name_box">
    <input type="text" name="username" placeholder="Enter your name" >
    <i class="fa-solid fa-user"></i>
</div>


<div class="name_box1">
    <input type="password" name="password" placeholder="Enter your password" >
    <i class="fa-solid fa-lock"></i>
</div>




<?php

if($Invalid_password){
     echo'<div class="name_box2">
           <h5>Invalid password</h5>
</div>';
}


?>


<?php

if($Invalid_username){
     echo'<div class="name_box2">
           <h5>Invalid Username</h5>
</div>';
}


?>


<?php

if($fillIn_all){
     echo'<div class="name_box2">
           <h5>You Must Fill in All Fields</h5>
</div>';
}


?>



<div class="name_box_button">
    <input type="submit" value="LogIn" class="button_login">
</div>







    </form>





</div>


</div>







<div class="Records">
<h4 class="Our_records">Our Records</h4>
<div class="patient_ADM">
<p class="number">123</p>
    <hr class="line">
<p class="patient_admited">Patient Admited</p>
</div>

<div class="patient_ADM">
    <p class="number">180</p>
        <hr class="line">
    <p class="patient_admited">Patient Discharged</p>
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