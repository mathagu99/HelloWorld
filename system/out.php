<!DOCTYPE html>
<html>
<head>
	<title>petty cash2</title>
	<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<h1> Outgoing Transactions</h1>

</head>
<body>
  <p style = "background-color:Tomato;"> Transactions Outgoing</style></p>
<img src="image.jpg" alt="desktop" width="90" height="70">

<p>
<style type="text/css">
   body{
    background-image: url(pic4.jpg);
    background-size:
    background-attachment: fixed;
   }
</style>
</p>

<div id="wrapper">
 

 <nav>
  <ul class="nav">
    <li><a href="home.php">Home</a></li>
    <li><a href="index.php">Incomig Transactions</a></li>
    <li><a href="out.php">Outgoing Transactions</a></li>
    <li><a href="balance.php">BALANCE</a></li>
    <li><a href="reports.php">Reports</a></li>
    
  </ul>
 </nav>
 </div>
 

	<?php require_once 'process2.php'; ?>

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
      $result = $mysqli->query("select * from usager") or die($mysqli->error);
       //pre_r($result);
     // pre_r($result->fetch_assoc());
       ?>
       <div class="row justify-content-center">
         <table class="table">
         	<thead>
         		<tr> 
         			<th>Date</th>
         			<th>Usage</th>
         			<th>Amount(.Ksh)</th>
         			<th colspan="2">Action</th>
         		</tr>
         	</thead> 
         <?php
          while ($row = $result->fetch_assoc()): ?>
           <tr>
           	 <td><?php echo $row['date_added']; ?></td>
           	  <td><?php echo $row['Usagees']; ?></td>
           	  <td><?php echo $row['Amount']; ?></td>
           	  <td>
           	  	<a href="out.php?edit=<?php echo $row['id']; ?>"
           	  	 class="btn btn-info">Edit</a>
           	  	<a href="process2.php?delete=<?php echo $row['id'];?>"
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
	<form action="process2.php" method="POST">
     
     <input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="form-group">
		<label>Date</label>
		<input type="text" name="datee" class="form-control"
		value="<?php echo $datee; ?>" placeholder="Enter the date">
	</div>
	 <div class="form-group">
		<label>Usage</label>
		<input type="text" name="Usager" class="form-control" 
		value="<?php echo $Usager; ?>" placeholder="Describe the Usage">
	</div>
     
     <div class="form-group">
		<label>Amount</label>
		<input type="text" name="Amount" class="form-control" 
		value="<?php echo $Amount; ?>" placeholder="Enter the Amount used">

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