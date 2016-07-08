<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link href="content/bootstrap.css" rel="stylesheet" />
<script src="scripts/jquery-1.9.1.js"></script>
<script src="scripts/bootstrap.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-bottam">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1 class="navbar-brand" style="font-size:100px;">PS store</h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <form  action="index.php" method="post" class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">

			 <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class=" glyphicon glyphicon-user" aria-hidden="true"></span>  User <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title" >LogIn</h3>
  </div></li>
  <li><div style="padding:20px; width:250px;" class="input-group"><span class="input-group-addon" id="sizing-addon2"><span class=" glyphicon glyphicon-user" aria-hidden="true"></span></span>
  <input type="text" name="txtname" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
  </div></li>
  <li><div style="padding:20px;" class="input-group"><span class="input-group-addon" id="sizing-addon2"><span class=" glyphicon glyphicon-lock" aria-hidden="true"></span></span>
  <input type="password" name="txtpassword" class="form-control" placeholder="password" aria-describedby="sizing-addon2">
</div></li>

<li><div style="padding:20px;" class="input-group"><div  class="btn-group">
  
  <!-- Button trigger modal -->
<input type="submit" class="btn btn-primary btn-lg" name="btnsubmit" data-toggle="modal" value="LogIn" >

 <div style="padding-left:100px;">   
 <input type="submit" class="btn btn-success btn-lg" name="btn1" data-toggle="modal" value="SignUp" >


 </input>
  </div>
</li>
  </div>
</div>
</div>
</div>
<?php 
if(isset($_POST["btn1"]))
{
	header('location:signup.php');
}
if(isset($_POST["btnsubmit"]))
{
$email=$_POST["txtname"];
$password=$_POST["txtpassword"];
require 'conclass.php';
$obj=new conclass();

		$res=$obj->getdata("select * from user_tbl where Email_id='$email' and Password='$password'");
while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	if($row["Type"]=='user')
{
		$_SESSION["email"]=$email;
	header('location:user\userview.php');
}
else
{
	$_SESSION["email"]=$email;
	header('location:admin\viewproduct.php');

}
}
}
?>
</a>
			 
  </ul>
      </li>
      </ul>
          </form>
        </div>
      </div>
    </nav>
	<div class="container">
<div class="row">	
  <marquee scrollamount="30">
		<img src="images/bags.jpg" width="500" height="500">
		<img src="images/iphone.jpg" width="500" height="500">
		<img src="images/shirt.jpg" width="500" height="500">
  </marquee>
        </div>
		</div>
		</form>
</body>
</html>

