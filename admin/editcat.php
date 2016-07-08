<!DOCTYPE html>
<html>
<head>

<link href="../content/bootstrap.css" rel="stylesheet" />
<script src="../scripts/jquery-1.9.1.js"></script>
<script src="../scripts/bootstrap.js"></script>


</head>
<body>
<?php 
require 'adminheader.php';
?>
	<div class="col-md-3">
	</div>
	<div class="col-md-6">
<div class="container">
<div class="panel panel-default">
  <div class="panel-heading">edit product</div>
  <div class="panel-body">

  <?php

$cat_id=$_REQUEST["id"];
$obj=new conclass();
$res=$obj->getdata("select * from category_tbl where Category_id='$cat_id'");
while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	$cat_id=$row["Category_id"];
	$cat_name=$row["Category_name"];
	
}


 ?>

<form action="updatecat.php" method="post">
	<table>
<tr>
<td>Category_id :</td>
<td><input type="text" name="txtid" value="<?php echo $cat_id ;?>" readonly></td>
</tr><tr>
<td>Category_name:</td>
<td><input type="text" name="txtname" value="<?php echo $cat_name ;?>"></td><br>
</tr>
</table><br>
  <input type="submit" name="btnupdate" value="Edit" class="btn btn-primary">

  
</div>
</div>
</div>
</form>
</body>
</html>