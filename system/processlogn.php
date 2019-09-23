 <?php
 session_start();
   if (isset($_POST['processlogn']))
     {
    $conn = new mysqli('localhost','root','','begin')
       or die(mysqli_error($mysqli));

       	$name = $_POST['name'];
       	$email = $_POST['emailid'];
       	$pass = $_POST['password'];

       $sql = ("INSERT INTO loog (name,email,password) Values('$name','$email','$pass')") or die($mysqli->error); 
        //$sql= "INSERT INTO  log where  $email='email' , $pass='password' and $nam='name'";
	$_SESSION['message'] = "success";
	$_SESSION['msg_type'] = "success";

	  // header("location: loginn.html");
        if($conn->query($sql) == TRUE)
        {
          echo "success";
           header("location: loginn.html");

          }

      else 
      {
       echo "Error: " .$sql . "<br>" . $conn->error;
     }
} else{
  echo 'ghhh';
}    

	//$conn->close();


?>