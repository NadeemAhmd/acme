<?php
include('/include/dbcon.php'); 
include('/include/session.php'); 
$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
	  border: 2px solid black;
   border-collapse: collapse;
   width:80%;
   color: #588c7e;
   font-family: times;
   font-size: 18px;
   text-align: center;
     } 
  th {
	  border: 2px solid black;
	  text-align: center;
   background-color: #80bfff;
   color: black;
   font-size: 20px;
   font-strength:bold;
    }
	td{border: 2px solid black;}
  tr:nth-child(even) {background-color: #f2f2f2;border: 2px solid black;}
  html, body {
  height: 100%;
  margin: 0;
}
.wrapper {
  min-height: 100%;
  margin-bottom: -100px;
}
.footer,
.push {
  height: 50px;
}
</style>
 <title>Employee Table</title>
</head>
<body>
<?php include 'include/header2.php';?>
<br>
<div class="wrapper">
<center>
 <table>
 <tr>
  <th><i>Employee Id</i></th> 
  <th><i>First name</i></th> 
  <th><i>Last name</i></th>
  <th><i>Designation</i></th>
  <th><i>Reporting Manager</i></th>
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "hr");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT id,f_name,l_name,designation,manager FROM emp";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["f_name"]."</td><td>".$row["l_name"]."</td><td>".$row["designation"]."</td><td>".$row["manager"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</center>
</div>
<div class="push"></div>
  <div class="footer">
<?php include 'include/footer.php';?>
</div>
</body >
</html>