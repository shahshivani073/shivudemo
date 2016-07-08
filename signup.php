<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function allnumeric(uzip)
{
		var numbers=/^[0-9]+$/;
		if(uzip.value.match(numbers))
		{
			return true;
		}
		else
		{
				alert('only allow  numeric characters ')
				uzip.value="";
				uzip.focus();
				return false;
				
		}
}

function ValidateEmail(uemail)
{
		val mailf=/^+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if uemail.value.match(mailf))
		{
				return true;
		}
		else
		{
			alert('you have entered an invalid email address')
			return false;
		}
}


</script>
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
          
        
        </div>
      </div>
    </nav>

<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">SIGNUP FORM</div>
  <div class="panel-body">
<?php 

if(isset($_POST["btnsubmit"]))
{
	$email=$_POST["txtmail"];
	$name=$_POST["txtname"];
	$password=$_POST["txtpassword"];
	$cmfpassword=$_POST["txtpassword1"];
	$city=$_POST["txtcity"];
	$mobile=$_POST["txtmobile"];
	$gender=$_POST["txtgender"];
	$type="user";
	if($cmfpassword==$password)
	{
	require 'conclass.php';
$obj=new conclass();

		$res=$obj->getdata("insert into user_tbl values('$email','$name','$password','$city','$mobile','$gender','$type')");
		if($res==1)
		{
			header('location:index.php');
		}
	}
		else
		{
			echo "something wrong";
		}
}


?>
<center>
<form  name="form1" action="signup.php" method="post">
<table class="table">
<tr>
<td>Email :</td>
<td><input type="email" name="txtmail"  onblur="ValidateEmail(document.form1.txtmail)" placeholder="enter Email_id" required></td>
</tr>
<tr>
<td>User Name :</td>
<td><input type="text" name="txtname" placeholder="enter user name" required></td>
</tr>
<tr>
<td>Password :</td>
<td><input type="password" name="txtpassword" placeholder="enter password" required></td>
</tr>
<tr>
<td>Confirm Password :</td>
<td><input type="password" name="txtpassword1" placeholder="renter password" required></td>
</tr>
<tr>
<td>City :</td>
<td><select name="txtcity">
<option>ahmedabad</option>
<option>surat</option>
<option>baroda</option>
<option>rajkot</option>
</select></td>
</tr>
<tr>
<td>Mobile_no :</td>
<td><input type="text" name="txtmobile" maxlength="10" onblur="allnumeric(document.form1.txtmobile)" required></td>
</tr>
<tr>
<td>Gender :</td>
<td><input type="radio" name="txtgender" value="male">Male<input type="radio" name="txtgender" value="female">Female</td>
</tr>
</table>
<br><br>
 <!-- Button trigger modal -->
<input type="submit" class="btn btn-primary btn-lg" name="btnsubmit" data-toggle="modal" value="Signup" >

</form>

  </div>
</div>
</div>
<div class="col-md-3">
</div>
</div>

</body>
</html>