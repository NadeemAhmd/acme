<?php
include('/include/dbcon.php'); 
include('/include/session.php'); 
$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/style.css" rel="stylesheet">
<style>
.b1{
    background-color: #4da6ff;
    border: none;
	width:250px;
    font-color: white;
    padding: 35px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.b1:hover {background-color: #0059b3}
.b1:active {
  background-color: #0059b3;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
ul,li {
  list-style: none;
}
body{background-color: transparent;
}
</style>
</head>
<body>
	<?php include 'include/header1.php';?>
	<div class="container">
        <h1>Welcome <?php echo $row['name'];?>!</h1>
			<hr>
		<div>
		<center>
		
			<li>
				<ul>
					<a href="add.php"><button class="b1"style="line-height: 2.5em">ADD EMPLOYEE </button></a>
				</ul>
			</li>
		
			<li>
				<ul>
					<a href="table.php"><button class="b1" style="line-height: 2.5em">TABLE VIEW</button></a>
				</ul>
			</li>
			<li>
				<ul>
					<a href="list.php"><button class="b1" style="line-height: 2.5em">HIERARCHIAL VIEW</button></a>
				</ul>
			</li>
		</center>
		</div>
    </div>
<?php include 'include/footer.php';?>
</body>