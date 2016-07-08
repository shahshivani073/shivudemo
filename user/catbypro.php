<?php 
require '../condition.php';
?>
<!DOCTYPE html>
<html>
<head>
<link href="../content/bootstrap.css" rel="stylesheet" />
<script src="../scripts/jquery-1.9.1.js"></script>
<script src="../scripts/bootstrap.js"></script>

</head>
<body>
<div class="row">
<div  class="col-md-12">
<?php 
  require 'userheader.php';
?>
</div>
</div>


<div class="container-fluid">

<div class="row">
<div  class="col-sm-3 col-md-2 sidebar">
          <ul  class="nav nav-sidebar">
            <li class="active"><a href="userview.php"><h1>Categories</h1> <span class="sr-only">(current)</span></a></li>
          <?php  $obj=new conclass();

		$res=$obj->getdata("select * from category_tbl");
		$obj1=new conclass();

		$res1=$obj1->getdata('select count(p.Pro_id)"cnt",c.* from category_tbl as c,product_tbl as p where p.fk_cat_id=c.Category_id group by c.Category_name');

		while($row=MYSQL_fetch_array($res1,MYSQL_ASSOC))
		{
			
		
echo '<li ><a href="catbypro.php?id='.$row["Category_id"].'"><h4>'.$row["Category_name"].'</h4>';
			echo '<span class="badge">'.$row["cnt"].'</span></a>
				<li>';

		}
		?>
			</ul>
          </div>
		  
<div class="col-sm-6 col-sm-offset-6 col-md-8 col-md-offset-1">
<?php 
$id=$_REQUEST["id"];
$obj=new conclass();

		$res=$obj->getdata("select * from product_tbl where fk_cat_id='$id'");
		while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
		{
			$img=$row["Pro_img"];
			$name=$row["Pro_name"];
			$price=$row["Pro_price"];
			$mfg=$row["Pro_mfg"];
			$war=$row["Pro_warranty"];
			$color=$row["Pro_color"];
		 
  echo'<div class="col-sm-6 col-md-4">';
		echo '<div class="thumbnail">';
      echo "<img src='$img' style='height:200px;' >";
      echo '<div class="caption">';
        echo "<h3>$name</h3>";
        echo "<p>Price : $price<br>Mfg : $mfg<br>Warranty : $war<br>Color : $color</p>";
        echo '<p><a href="buy.php?id='.$row["Pro_id"].'" class="btn btn-primary" role="button">BUY</a> </p>';
		echo '<p><a href="addcart1.php?id='.$row["Pro_id"].'" class="btn btn-danger" role="button">ADD To CART </a> </p>';
		echo '</div>';
    echo '</div>';
	 echo '</div>';
		}
		?>
          </div>
		  
		</div>
		</div>
		</body>
		</html>