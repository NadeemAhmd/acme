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
  background-color: white;
}
/* Style the active/current link*/
.header a.active {
  background-color: #4CAF50;
  color: white;
}
/* Float the link section to the right */
.header-right {
  float: right;
}
</style>
</head>
<body>
	<div class="header">
		<a href="#default" class="navbar-brand"><span>ACME</span>&nbsp;Pvt Ltd</a>
		<div class="header-right">
			<a class="active" href="#home">Home</a>
			<a href="#contact">Contact</a>
			<a href="#about">About</a>
		</div>
	</div>

</body>
</html>