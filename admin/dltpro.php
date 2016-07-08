<?php 

$pro_id=$_REQUEST["id"];
require 'conclass.php';
$obj=new conclass();
$res=$obj->getdata("delete from product_tbl where Pro_id='$pro_id' ");
if($res==1)
		{
			header('location:viewproduct.php');
		}
		else
		{
			echo "something wrong";
		}

?>