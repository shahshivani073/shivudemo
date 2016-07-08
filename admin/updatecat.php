<?php 
if(isset($_POST["btnupdate"]))
{
	$Category_id=$_POST["txtid"];
	$Category_name=$_POST["txtname"];
	
require '../conclass.php';
$obj=new conclass();
$res=$obj->getdata("update category_tbl set Category_name='$Category_name' where Category_id='$Category_id'");
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
