
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


	<center>
<div class="row">
<h1>LIST OF USERS</h1>
</div>
</center>
<div class="container">
<div style="padding:50px;" class="row">

<table class="table" border="1">

<tr>
<th>Email_id</th>
<th>User Name</th>
<th>Mobile_no</th>
<th>City</th>
<th>Gender</th>
<th>Type</th>
<th>Action</th>
</tr>
<?php 

		$obj=new conclass();
		$res=$obj->getdata("select * from user_tbl");

while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row["Email_id"]."</td>";
	echo "<td>".$row["Username"]."</td>";
	echo "<td>".$row["Mobile_no"]."</td>";
	echo "<td>".$row["City"]."</td>";
	echo "<td>".$row["Gender"]."</td>";
	echo "<td>".$row["Type"]."</td>";
	echo '<td><a href="userdlt.php?id='.$row["Email_id"].'"><div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-danger">DELETE</button>
 </a></td>';
	echo "</tr>";
}

?>
</table>

</div>
</div>
</body>
</html>