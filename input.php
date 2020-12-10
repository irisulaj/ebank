<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];// initialize $_POST to get data from database
// check if the user entered the data
if (!empty($firstname)||!empty($lastname)||!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "ebank";
    //if the data are entered, establish a database connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname); 
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());// check for connection error
    } else {
     $SELECT = "SELECT email From signup Where email = ? Limit 1";
     $INSERT = "INSERT Into signup (firstname, lastname, username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?, ?, ?)";
    
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0)
      {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssii", $firstname, $lastname, $username, $password, $gender, $email, $phoneCode, $phone);
      $stmt->execute();
      echo "Register successfully!!!";

     } else 
     {
      echo "Someone else registered using this email!";
      
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All the inputs must be filled";
 die();

}

?>