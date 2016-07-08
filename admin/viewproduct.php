

<!DOCTYPE html>
<html>
<head>

<link href="../content/bootstrap.css" rel="stylesheet" />
<script src="../scripts/jquery-1.9.1.js"></script>
<script src="../scripts/bootstrap.js"></script>


</head>
<body>
<div class="row">
<?php require 'adminheader.php' ?>
</div>


 <center>
<div class="row">
<h1>LIST OF PRODUCTS</h1>
</div>
</center>
<div class="container">
<div style="padding-left:50px;" class="row">
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  ADD PRODUCT
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ADD PRODUCT</h4>
      </div>
      <div class="modal-body">
	  <form action="viewproduct.php" method="post">
	  <table class="table">
<tr>
<td>Product Name :</td>
<td><input type="text" name="txtname" placeholder="enter product name" required></td>
</tr>
<tr>
<td>Price :</td>
<td><input type="text" name="txtprice" placeholder="enter price" required></td>
</tr>
<tr>
<td>Stock On Hand :</td>
<td><input type="number" name="txtsoh"></td>
</tr>
<tr>
<td>Product Mfg :</td>
<td><input type="text" name="txtmfg" placeholder="enter mfg" required></td>
</tr>
<tr>
<td>Warranty :</td>
<td><input type="text" name="txtwrty" placeholder="enter warranty" required></td>
</tr>
<tr>
<td>Product Color</td>
<td><select name="txtcolor">
<option value="red">red</option>
<option value="black">black</option>
<option value="gray">gray</option>
</select></td>
</tr>
<tr>
<td>Category Name :</td>
<td><select name="txtid">
<?php 

		$obj=new conclass();
		$res=$obj->getdata("select * from category_tbl");
while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	echo '<option value="';
	echo $row["Category_id"];
	echo '">';
	echo $row["Category_name"];
	echo '</option>';
}

?>
</select></td>
</tr>

</table>

      </div>
      <div class="modal-footer">
	  <?php 


if(isset($_POST["btnadd"]))
{
	$name=$_POST["txtname"];
	$price=$_POST["txtprice"];
	$soh=$_POST["txtsoh"];
	$mfg=$_POST["txtmfg"];
	$warranty=$_POST["txtwrty"];
	$color=$_POST["txtcolor"];
	$cat_id=$_POST["txtid"];

		$obj=new conclass();
		$res=$obj->getdata("insert into product_tbl values('NULL','$name','$price','$soh','$mfg','$warranty','$color','$cat_id')");

		if($res==1)
		{
			header('location:viewproduct.php');
		}
		else
		{
			echo "something wrong";
		}
}


?>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="btnadd" value="add" class="btn btn-primary">  
      </div>
	  </form>
    </div>
  </div>
</div>
 </div>
 </div>
 <center>
<div class="container">
<div style="padding:20px;" class="row">
<table class="table" border="1">
<tr>
<th>Product Id</th>
<th>Product Image
<th>Product Name</th>
<th>Price</th>
<th>Stock on hand</th>
<th>Mfg</th>
<th>Warranty</th>
<th>Color</th>
<th>Category Id</th>
<th colspan="2">Action</th>
</tr>
<?php 

		$obj=new conclass();
		$res=$obj->getdata("select p.*,c.* from product_tbl as p,category_tbl as c where c.Category_id=p.fk_cat_id  ");

while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	$img=$row["Pro_img"];
	echo "<tr>";
	echo "<td>".$row["Pro_id"]."</td>";
	echo '<td>';
	echo "<img src='$img' width='100px' hieght='100px'>";
	echo '</td>';
	echo "<td>".$row["Pro_name"]."</td>";
	echo "<td>".$row["Pro_price"]."</td>";
	echo "<td>".$row["Pro_soh"]."</td>";
	echo "<td>".$row["Pro_mfg"]."</td>";
	echo "<td>".$row["Pro_warranty"]."</td>";
	echo "<td>".$row["Pro_color"]."</td>";
	echo "<td>".$row["Category_name"]."</td>";
	echo '<td><a href="editpro.php?id='.$row["Pro_id"].'"><div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-primary">EDIT</button>
 </a></td>';
	echo '<td><a href="dltpro.php?id='.$row["Pro_id"].'"><div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-danger">DELETE</button>
 </a></td>';
	echo "</tr>";
}

?>
</table><br><br>
</div>
</div>
</form>                   

</body>
</html>