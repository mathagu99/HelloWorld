<?php
$mysqli = new mysqli('localhost','root','','begin') 
       or die(mysqli_error($mysqli));
     $id = 0;
     $update = false;
     $datee ='';
     $Usager ='';
     $Amount = '';

if (isset($_POST['save']))
   {
  $datee = $_POST['datee'];
  $Usager = $_POST['Usager'];
  $Amount = $_POST['Amount'];

  $mysqli->query("INSERT INTO usager (date_added,Usagees,Amount) Values('$datee','$Usager','$Amount')") or die($mysqli->error); 
  $_SESSION['message'] = "saved successfully!";
  $_SESSION['msg_type'] = "success";

     header("location: out.php");
   }

 if(isset($_GET['delete']))
   {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM usager WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Deleted successfully!";
  $_SESSION['msg_type'] = "danger";

     header("location: out.php");
   }
  if(isset($_GET['edit']))
  {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM usager WHERE id=$id") or die($mysqli->error());
      //if (count($result)==1)
        // {
          $row = $result->fetch_array();
          $datee = $_POST['datee'];
          $Usager = $_POST['Usager'];
          $Amount = $row['Amount'];
        // }
  }

  if(isset($_POST['update']))
     {
      $id = $_POST['id'];
      $datee = $_POST['datee'];
      $Usager = $_POST['Usager'];
      $Amount = $_POST['Amount'];


      $mysqli->query("UPDATE usager SET date_added='$datee', Usagees='$Usager', Amount='$Amount' WHERE id=$id")or die($mysqli->error);

      $_SESSION['message'] = "Record has been updated successfully!";
      $_SESSION['msg_type'] =  "warning";

      header('location: out.php');
     }

?>