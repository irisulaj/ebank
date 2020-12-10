<?php
include('session.php'); 
if(!isset($_SESSION['login_user'])){ 
  header("location: index.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
	 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: blue;
   font-family: monospace;
   font-size: 20px;
   text-align: left;
     } 
  th {
   background-color: blue;
   color: white;
    }
  tr:nth-child(even) {background-color: lightblue;}
 </style>
 <title>Your Profile</title>
 <link href="profile.css" rel="stylesheet" type="text/css">
</head>
<body class="body1">
	<h1 class="h2">
	<b>Welcome  <i>

		<?php 
	
  $sql = "SELECT firstname, lastname FROM signup WHERE username='{$_SESSION['login_user']}'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     // 
     while($row = $result->fetch_assoc()) {
      echo $row["firstname"]. " " . $row["lastname"] ;

  }

} 


	 ?>
	 	
	 </i></b>
	</h1>
 <fieldset class="fieldset">
 <form action="logout.php">
    <input type="submit" class="submit" name="submit" value="Log Out" />
</form>
 </fieldset>
<fieldset class="table">
	
	<legend class="legend">Personal Information
	</legend>

	  <table >
 <tr>
  <th>Account ID</th> 
  <th>Name</th>
  <th>Surname</th>
  <th>Balance</th> 
  <th>Sign up Date</th>
 </tr>

 <?php
  $sql = "SELECT signup.*,account.* FROM signup, account
  WHERE  signup.account_id=account.account_id AND username='{$_SESSION['login_user']}'";


    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
      echo "<tr><td>" . $row["account_id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["balance"] . "</td><td>"
. $row["signup_date"]. "</td></tr>";
  }
echo "</table>";
	

} 
$conn->close();
?>
</fieldset>
 
</body>
</html>


