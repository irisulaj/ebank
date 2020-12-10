<?php
session_start(); 
if(session_destroy())// close session 
{  
  header("Location: index.php"); // redirect log in
}
?>