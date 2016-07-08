

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

$pro_id=$_REQUEST["id"];
$obj=new conclass();
$res=$obj->getdata("select * from product_tbl where Pro_id='$pro_id'");
while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	$Pro_id=$row["Pro_id"];
	$Pro_name=$row["Pro_name"];
	$Pro_price=$row["Pro_price"];
	$Pro_soh=$row["Pro_soh"];
	$Pro_mfg=$row["Pro_mfg"];
	$Pro_warranty=$row["Pro_warranty"];
	$Pro_color=$row["Pro_color"];
	$cat_id=$row["fk_cat_id"];
	$Pro_img=$row["Pro_img"];

}


 ?>

<form action="updatepro.php?img=<?php echo $Pro_img; ?>" enctype="multipart/form-data" method="post">
	<table>
<tr>
<td>Product_id :</td>
<td><input type="text" name="txtid" value="<?php echo $Pro_id ;?>" readonly></td>
</tr><tr>
<td>Product_name:</td>
<td><input type="text" name="txtname" value="<?php echo $Pro_name ;?>"></td><br>
</tr>
<tr>
<td>Price :</td>
<td><input type="text" name="txtprice" value="<?php echo $Pro_price ;?>"></td>
</tr>
<tr>
<td>Stock On Hand :</td>
<td><input type="number" name="txtsoh" value="<?php echo $Pro_soh ;?>"></td>
</tr>
<tr>
<td>Product Mfg :</td>
<td><input type="text" name="txtmfg" value="<?php echo $Pro_mfg ;?>"></td>
</tr>
<tr>
<td>Warranty :</td>
<td><input type="text" name="txtwrty" value="<?php echo $Pro_warranty ;?>"></td>
</tr>
<tr>
<td>Product Color</td>
<td><select name="txtcolor">
<option value="red" <?php if($Pro_color=="red") echo"selected" ;?>>red</option>
<option value="black" <?php if($Pro_color=="black") echo "selected" ;?>>black</option>
<option value="gray" <?php if($Pro_color=="gray") echo "selected" ;?>>gray</option>
</select></td>
</tr>
<tr>
<td>Category Name</td>
<td><select name="txtcatid">
<?php 

$obj=new conclass();
$res=$obj->getdata("select * from category_tbl");
while($row=mysql_fetch_array($res,MYSQL_ASSOC))
{
	
	$selected='';
	if($cat_id==$row["Category_id"])
	{
		$selected=" selected";
		
	}
	echo '<option'.$selected.' value="'.$row["Category_id"].'">'.$row["Category_name"].'</option>';
}

?>

</select></td>
</tr>
<tr>
<td><img src="<?php echo $Pro_img ;?>" height="100px" width="100px" ></td>
<td><input type="file" name="txtimg" >
</td>
</tr>
</table><br>
<input type="submit" name="btnupdate" value="EDIT">

  </div>
</div>
</div>
</div>
</form>
</body>
</html>