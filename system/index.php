<!DOCTYPE html>
<html>
<head>
	<title>petty cash</title>
	<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="body.css">
<h1> ncoming Transactions</h1>

</head>
<body>

<p style = "background-color:Tomato;"> Transactions incoming</style></p>
<p>
<style type="text/css">
   body{
    background-image: url(pic1.jpg);
    background-size:
    background-attachment: fixed;
   }
</style>
</p>
<img src="image.jpg" alt="desktop" width="90" height="52">


<div id="wrapper">
 

 <nav>
  <ul class="nav">
    <li><a href="home.php">Home</a></li>
    <li><a href="index.php">Incoming Transactions</a></li>
    <li><a href="out.php">  Outgoing Transactions</a></li>
    <li><a href="balance.php">Balance</a></li>

    <li><a href="reports.php">Reports</a></li>
    
  </ul>
 </nav>
 </div>

	<?php require_once 'process.php'; ?>

	<?php
	if (isset($_SESSION['message'])): ?>

	<div class="alert alert-<?=$_SESSION['msg_type']?>">
	<?php 
	    echo $_SESSION['message'];
	    unset($_SESSION['message']);
	    ?>
	</div>
	  <?php endif; ?>
     

<div class="container">
   <?php  
     $mysqli = new mysqli('localhost','root','','begin') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
       //pre_r($result);
     // pre_r($result->fetch_assoc());
       ?>
       <div class="row justify-content-center">
         <table class="table">
         	<thead>
         		<tr> 
         			<th>Date</th>
         			<th>Client</th>
         			<th>Amount(.Ksh)</th>
         			<th colspan="2">Action</th>
         		</tr>
         	</thead> 
         <?php
          while ($row = $result->fetch_assoc()): ?>
           <tr>
           	 <td><?php echo $row['date']; ?></td>
           	  <td><?php echo $row['client']; ?></td>
           	  <td><?php echo $row['Amount']; ?></td>
           	  <td>
           	  	<a href="index.php?edit=<?php echo $row['id']; ?>"
           	  	 class="btn btn-info">Edit</a>
           	  	<a href="process.php?delete=<?php echo $row['id'];?>"
           	  	  class="btn btn-danger">Delete</a>
           	  </td>
           	</tr>
          <?php endwhile; ?>
         </table>
        </div>

      <?php 
       function pre_r($array)
        {
        	echo '<pre>';
        	print_r($array);
        	echo '</pre>';
        }
   ?>
	<div class="row justify-content-center">
	<form action="process.php" method="POST">
     
     <input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="form-group">
		<label>Date</label>
		<input type="text" name="date" class="form-control"
		value="<?php echo $date; ?>" placeholder="Enter the date">
	</div>
	 <div class="form-group">
		<label>Received From</label>
		<input type="text" name="client" class="form-control" 
		value="<?php echo $client; ?>" placeholder="Enter the name of the client">
	</div>
     
     <div class="form-group">
		<label>Amount</label>
		<input type="text" name="Amount" class="form-control" 
		value="<?php echo $Amount; ?>" placeholder="Enter the Amount Received">

	<div class="form-group">

	<?php
		if ($update == true):
			?>
         <button type="submit" class="btn btn-info" name="update">Update</button>
    <?php else: ?>
           <button type="submit" class="btn btn-primary" name="save">
           Save</button>
    <?php endif; ?>
     </div>
	</form>
  </div>
</body>
</html>