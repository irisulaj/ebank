<?php
include('login.php'); // includes log in code
if(isset($_SESSION['login_user'])){
header("location: profile.php"); // redirects to profile
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="login.css"/>
</head>
<body class="body">
<fieldset class="fieldset">
<form action="" method="POST">
    <table>
        <tr>

            <td><input type="text" name="username" placeholder="Username" ></td>
        </tr>
        <tr>

            <td><input type="password" name="password" placeholder="Password"></td>
        </tr>
        <tr>
            <td><input type="submit" class="submit"  name="submit" value="Log in"> 

            </td>

        </tr>
    </table>
</form>
</fieldset>
<p class="p">
   <span ><?php echo $error;// displays that you need to fill email and password to log in ?></span> 
   <span ><?php echo $error_1;//displays that email and password do not match?></span> 
</p>


</body>
</html>