<?php
include('/include/dbcon.php'); 
include('/include/session.php'); 
$result=mysqli_query($con, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
?>
<html>
<head>
<title>HIERARCHIAL VIEW</title>
<style>
input{ font-size: 1em; }
.trees{
	height:100%;
	
}
body{
	
	position:relative;
}
ul.tree
{
    padding: 0 0 0 20px;
    width: 320px;
}
li 
{
    position: relative; 
    margin-left: -5px;
    list-style: none;
	color:blue;
}
li input
{
    position: absolute;
    left: 0;
    margin-left: 0;
    opacity: 0;
    z-index: 2;
    cursor: pointer;
    height: 1em;
    width: 1em;
    top: 0;
}
li input + ul
{
    background: url(assets/img/arrow-down.png) 45px -3px no-repeat;
    margin: -0.938em 0 0 -44px;
    height: 1em;
}
li input + ul > li { display: none; margin-left: -14px !important; padding-left: 1px; }
li label
{
    cursor: pointer;
    display: block;
    padding-left: 24px;
}
 
li input:checked + ul
{
    background: url(assets/img/arrow-up.png) 45px 4px no-repeat;
    margin: -1.25em 0 0 -44px;
    padding: 1.563em 0 0 80px;
    height: auto;
}
li input:checked + ul > li { display: block; margin: 0 0 0.125em;}
li input:checked + ul > li:last-child { margin: 0 0 0.063em; }
</style>
</head>
<body>
	<?php include 'include/header2.php';?>
	<?php 
		$res = mysqli_query($con, "SELECT itm.*, (SELECT COUNT(*) FROM `emp` WHERE parent = itm.id) as hasChild FROM `emp` as itm"); 
 
$items = array(); 
while($row = mysqli_fetch_assoc($res)){ 
$items[$row['id']] = array("parent_id" => $row['parent'], "name" => $row['combined'],"designation"=>['designation'], "hasChild" => $row['hasChild']); 
}
?>
<div>
	<h1 style="font-family:helvetica;color:LightBlue;">EMPLOYEE HIERARCHY</h1>
	<hr>
</div>
<p>Click on the Users to expand the hierarchy</p>
<div class="trees">
<?php 
function generateTreeView($items, $currentParent, $currLevel = 0, $prevLevel = -1) {
    foreach ($items as $itemId => $item) {
        if ($currentParent == $item['parent_id']) {                       
            if ($currLevel > $prevLevel){
                echo " 
 
<ul class='tree'> "; 
            }
             
            if ($currLevel == $prevLevel){
                echo " </li>
 
 
 ";
            }
             
            $menuLevel = $item['parent_id'];
            if($item['hasChild'] > 0){
                $menuLevel = $itemId;
            }
             
            echo '<li> <label for="level'.$menuLevel.'">'.$item['name'].'</label><input type="checkbox" id="level'.$menuLevel.'"/>';             
            if ($currLevel > $prevLevel) { 
                $prevLevel = $currLevel; 
            }
             
            $currLevel++; 
             
            generateTreeView ($items, $itemId, $currLevel, $prevLevel);
            $currLevel--;
        }
    }
     
    if ($currLevel == $prevLevel) echo " </li>
 
</ul>
 
 
 ";
}
if(count($items) > 0){
    generateTreeView($items, 0);
}
?>
</div>
<div style="position:absolute; bottom:auto;">
<?php include 'include/footer.php';?>
</div>
</body>
</html>