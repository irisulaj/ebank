<?php
session_start(); 

$conn ='';
$error = ''; 
$error_1='';
if (isset($_POST['submit'])) { 
  if (empty($_POST['username']) || empty($_POST['password'])) { 
    $error = "Please enter email and password!"; 
  } 
  else{ 
 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

   
    $conn = mysqli_connect("localhost", "root", "", "ebank"); 

   
    $query = "SELECT username, password from signup where username=? AND password=? LIMIT 1"; 
    
    $stmt = $conn->prepare($query); 
    $stmt->bind_param("ss", $username, $password); 
    $stmt->execute(); 
    $stmt->bind_result($username, $password); 
    $stmt->store_result(); 
    if($stmt->fetch()) 
     { 
      $_SESSION['login_user'] = $username; 
    header("location: profile.php");  
  } else{
    $error_1= "Username or passwordi is not correct!"; 
  }

  mysqli_close($conn); 
}
} 
?>