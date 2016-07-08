<?php 

$Email=$_REQUEST["id"];
require 'conclass.php';
$obj=new conclass();
$res=$obj->getdata("delete from user_tbl where Email_id='$Email' ");
if($res==1)
		{
			header('location:userdetail.php');
		}
		else
		{
			echo "something wrong";
		}

?>