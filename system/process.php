<?php
$mysqli = new mysqli('localhost','root','','begin') 
       or die(mysqli_error($mysqli));
     $id = 0;
     $update = false;
     $date ='';
     $client ='';
     $Amount = '';

if (isset($_POST['save']))
   {
	$date = $_POST['date'];
	$client = $_POST['client'];
	$Amount = $_POST['Amount'];

	$mysqli->query("INSERT INTO data (date,client,Amount) Values('$date','$client','$Amount')") or die($mysqli->error); 
	$_SESSION['message'] = "saved successfully!";
	$_SESSION['msg_type'] = "success";

	   header("location: index.php");
   }

 if(isset($_GET['delete']))
 	 {
 	 	$id = $_GET['delete'];
 	 	$mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

 	 	$_SESSION['message'] = "Deleted successfully!";
	$_SESSION['msg_type'] = "danger";

	   header("location: index.php");
 	 }
  if(isset($_GET['edit']))
  {
  	$id = $_GET['edit'];
  	$update = true;
  	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
  	  //if (count($result)==1)
  	  	// {
  	  	 	$row = $result->fetch_array();
  	  	 	$date = $row['date'];
  	  	 	$client = $row['client'];
  	  	 	$Amount = $row['Amount'];
  	  	// }
  }

  if(isset($_POST['update']))
  	 {
  	 	$id = $_POST['id'];
  	 	$date = $_POST['date'];
  	 	$client = $_POST['client'];
  	 	$Amount = $_POST['Amount'];


  	 	$mysqli->query("UPDATE data SET date='$date', client='$client', Amount='$Amount' WHERE id=$id")or die($mysqli->error);

  	 	$_SESSION['message'] = "Record has been updated successfully!";
  	 	$_SESSION['msg_type'] =  "warning";

  	 	header('location: index.php');
   	 }

?>