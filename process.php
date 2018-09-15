<?php
$connect=mysqli_connect('localhost','root','','hr');
 //check connection
if(mysqli_connect_errno($connect))
{
 echo 'failed to connect!';
}
$e_id=$_POST['e_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$designation=$_POST['designation'];
$manager=$_POST['manager'];
$parent=$_POST['parent'];
mysqli_query($connect,"insert into emp(id,f_name,l_name,designation,manager,parent) values('$e_id','$first_name','$last_name','$designation','$manager','$parent')");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/style.css">
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #80bfff;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 20px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>
<?php include 'include/header.php';?>
<center>
  <div>
	<p style="color:black;"><?php
		if(mysqli_affected_rows($connect)>0)
{
	echo '<p style="color:black;">Employee Added !</p>';
	echo '<a href="table.php"><button class="button" style="vertical-align:middle;float:center;"><span>View  All Employees</span></button></a>';
}
else
{
	echo 'Employee NOT added.';
	echo '&nbsp;Please Enter Valid Details';
}
?></p>
<a href="add.php"><button class="button" style="vertical-align:middle;float:center;"><span>Back</span></button></a>
  </div>
  </center>
<?php include 'include/footer.php';?>
</body>
</html>