<?php
include('/include/dbcon.php'); 
include('/include/session.php'); 
$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$query = "SELECT name FROM `manager`";
$result1 = mysqli_query($con, $query);
$options = "";
while($row2 = mysqli_fetch_array($result1))
{
    $options = $options."<option>$row2[0]</option>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ACME::Add Employee</title>
<link href="assets/style.css" rel="stylesheet">
</head>
<body>
<?php include 'include/header2.php';?>
<div>
<div class="form-style">
<center>
<h1>Add New Employee</h1>
</hr>
<form method="post" onsubmit="myFunction()" action="process.php" >
<label>Employee ID:</label>
<input required="required" type="text" name="e_id"/><br/>
<label>First Name:</label>
<input required="required" type="text" name="first_name"/><br/>
<label>Last Name:</label>
<input required="required" type="text" name="last_name"/><br/>
<label>Designation:</label>
<input required="required" type="text" name="designation"/><br/>
<label>Manager ID</label>
<select type="parent" name="parent">
<option value="">Select Manager ID</option>
<option value="1">1.Anchal</option>
<option value="2">2.Anika</option>
<option value="3">3.Aahna</option>
<option value="4">4.Yashraj</option>
<option value="5">5.Madhulika</option>
<option value="6">6.Ashlesha</option>
<option value="7">7.Birju</option>
<option value="8">8.Devak</option>
<option value="9">9.Phani</option>
<option value="10">10.Sachit</option>
</select>
<label>Reporting Manager:</label>
<select type="manager" name="manager">
<option value="">--Choose your choice--</option>
<?php echo $options;?>
</select>
<br/>
<input onclick="myFunction()" type="submit" value="ADD EMPLOYEE"/>
<script>
function myFunction() {
    alert("You will be Redirected to another page");
}
</script>
</form>
</div>
</div>
</center>
<?php include 'include/footer.php';?>
</body>
</html>