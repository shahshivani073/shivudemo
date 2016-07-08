
<html>
<head>
<link href="../content/bootstrap.css" rel="stylesheet" />
<script src="../scripts/jquery-1.9.1.js"></script>
<script src="../scripts/bootstrap.js"></script>

</head>
<body>
<?php 
require 'userheader.php';
?>

<form method="post" action="viewcart.php" enctype="multipart/form-data">
<div class="container"
<div class="row">
 <div class="panel panel-default">
  <div class="panel-heading"><?php 
$email_id=$_SESSION["email"];
echo $email_id;
?>
</div>
  <div class="panel-body">
     <center>
<table class="table table-striped">

<?php 
$email_id=$_SESSION["email"];

 $obj=new conclass();

		$res=$obj->getdata("select p.*,o.* from product_tbl as p,order_tbl as o where fk_email='$email_id' and o.fk_pro_id=p.Pro_id");

while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	echo '<tr><td><img src="'.$row["Pro_img"].'" height="150px" width="150px"></td>';
	echo '<td><span style="color:blue;" class="label">Oder_id :</span>'.$row["o_id"].'</td>';
	echo '<td><span style="color:blue;" class="label">Amount :</span>'.$row["o_amount"].'</td>';
	echo '<td><span style="color:blue;" class="label">Date :</span>'.$row["o_date"].'</td>';
	echo '<td><span style="color:blue;" class="label">Name of product :</span>'.$row["Pro_name"].'</td>';
	echo '<td><span style="color:blue;" class="label">Qty :</span>'.$row["o_qty"].'</td>';
//	echo '<td>'.$row["flag"].'</td>';
	echo '<td><a href="cartdelete.php?order_id='.$row["o_id"].'">
	<span class="input-group-addon" style="padding:10px; width:50px; color:red;" id="sizing-addon2">
	<span style="width:50px;" class=" glyphicon glyphicon-trash"  aria-hidden="true"></span></a></td></tr>';
	
	
}		
?>	

</table>
</div>
</center>

   </div>
</div>
<center>
<a href="checkout.php"><button type="button" class="btn btn-primary">CheckOut</button></a>
</center>
</form>
</body>
</html>