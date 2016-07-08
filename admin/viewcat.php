

<!DOCTYPE html>
<html>
<head>

<link href="../content/bootstrap.css" rel="stylesheet" />
<script src="../scripts/jquery-1.9.1.js"></script>
<script src="../scripts/bootstrap.js"></script>


</head>
<body>

<div class="row">
<?php 
require 'adminheader.php';
?>
</div>



 <center>
<div class="row">
<h1>LIST OF CATEGORIES</h1>
</div>
</center>
<div class="container">
<div style="padding-left:50px;" class="row">
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
  ADD CATEGORY
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ADD CATEGORY</h4>
      </div>
      <div class="modal-body">
	  <form action="viewcat.php" method="post">
	  <table class="table">
<tr>
<td>Category Name:</td>
<td><input type="text" name="txtname" placeholder="enter category name"></td>
</tr>

</table>

      </div>
      <div class="modal-footer">
	  <?php 

if(isset($_POST["btnadd"]))
{
	$name=$_POST["txtname"];
	

$obj=new conclass();
$res=$obj->getdata("insert into category_tbl values('NULL','$name')");
		
		if($res==1)
		{
			header('location:viewcat.php');
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
<th>Category_id</th>
<th>Category_name</th>
<th colspan="2">Action</th>
</tr>
<?php 


$obj=new conclass();
$res=$obj->getdata("select * from category_tbl");
		

while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	echo "<tr>";
	echo "<td>".$row["Category_id"]."</td>";
	echo "<td>".$row["Category_name"]."</td>";
	echo '<td><a href="editcat.php?id='.$row["Category_id"].'"><div class="btn-group" role="group" aria-label="...">
  <button type="button" class="btn btn-primary">EDIT</button>
 </a></td>';
	echo '<td><a href="dltcat.php?id='.$row["Category_id"].'"><div class="btn-group" role="group" aria-label="...">
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