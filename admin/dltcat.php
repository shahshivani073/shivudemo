<?php 

$cat_id=$_REQUEST["id"];
require '../conclass.php';
$obj=new conclass();
$res=$obj->getdata("delete from category_tbl where Category_id='$cat_id' ");
if($res==1)
		{
			header('location:viewcat.php');
		}
		else
		{
			echo "something wrong";
		}

?>