<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="home.css" type="text/css" rel="stylesheet"/>
	<script type="text/javascript">
       function toggleSidebar()
       {
       	document.getElementById("sidebar").classList.toggle('active');
       }

	</script>
	<style type="text/css">
   	
   </style> 
   
</head>
<body>

		<div class="scrollmenu">
  <a href="home.php">Home</a>
  <a href="index.php">Incoming Transactions</a>
  <a href="out.php">Outgoing Transactions</a>
  <a href="balance.php">Balance</a>
  <a href="reports.php">Reports</a>
  <a href="support.php">Support</a>
  <a href="about.php">About</a>  
</div>



 <div id="sidebar">
		<div class="toggle-btn" onclick="toggleSidebar()">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<ul>
			 <li><a href="home.php">Home</a></li>
        	 <li><a href="index.php">Incoming Transactions</a></li>
             <li><a href="out.php">  Outgoing Transactions</a></li>
             <li><a href="balance.php">BALANCE</a></li>
             <li><a href="reports.php">Reports</a></li>
             <li><a href="#contact">Search</a></li>
                  <button class="dropdown-btn">Transactions 
          <i class="fa fa-caret-down"></i>
          </button>
  <div class="dropdown-container">
    <a href="index.php">Incoming</a>
    <a href="out.php">Outgoing</a>
    <a href="balance.php">Balance</a>
    <a href="reports.php">Reports</a>
  </div>
		
</div>
		</ul>

	</div>

	<div id="header">
     <center><img src="log1.jpg" alt="logo" id="logo"><br>This is the petty cash records.Welcome.
        </center>

	</div>

	<div id="data"><br>
          

	</div>

	<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

	
</body>
</html>