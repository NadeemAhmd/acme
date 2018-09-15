<?php
include('dbcon.php'); 
?>
<html>
<head>
<style>
.navbar-brand{
	font-size: 18 px;
	text-transform: uppercase;
	font-weight: 500;
	letter-spacing: 2px;
	float:left;
	height:50px;
	font-family:sans-serif;
	line-height:10px
	}
.navbar-brand:hover,.navbar-brand:focus{
	text-decoration:none
	}
.navbar-brand span{
	color: #30a5ff;
}
.header {
  overflow: hidden;
  background-color: black;
  padding: 5px 10px;
  width=100%;
}
/* Style the header links */
.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}
/* Change the background color on mouse-over */
.header a:hover {
  background-color: grey;
}
/* Style the active/current link*/
.header a.active {
  background-color: #4CAF50;
  color:white;
}
/* Float the link section to the right */
.header-right {
  float: right;
}
.dropdown {
    float: right;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: green;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}
 .dropdown:hover .dropbtn {
    background-color: grey;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>
	<div class="header">
		<a href="#default" class="navbar-brand"><span>ACME</span>&nbsp;Pvt Ltd</a>
		<div class="header-right">
			<a href="./dashboard.php">Home</a>
			<a href="#contact">Contact</a>
			<div class="dropdown">
				<button class="dropbtn"><strong>Logged in as:<?php echo $row['name'];?></strong></button>
				<div class="dropdown-content">
					<a href="./include/logout.php">Log Out</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>