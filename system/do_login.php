<?php
session_start();
   if(isset($_POST['do_login']))
   {
 $servername = "localhost";
 $username="root";
 $password="";
 $dbname="begin";
 $conn=mysqli_connect($servername,$username,$password, $dbname);
    //$db=mysqli_select_db($databasename);
    // $name = $_POST['name']
     $email=$_POST['email'];
     $pass=$_POST['password'];
 if (!$conn) {
 	die("Connection failed: " .mysqli_connect_error());
      }

 $sql= "select * from loog where  email='$email' and password='$pass'";
 $result = mysqli_query($conn,$sql);
 //("select * from log where email='$email' and password='$pass'");

 if($row=mysqli_fetch_array($result))
 {
  $_SESSION['email']=$row['email'];
  echo "success";
 }
 else
 {
  echo "fail";
 }

 exit();
  }
 //mysqli_close($conn);
?>