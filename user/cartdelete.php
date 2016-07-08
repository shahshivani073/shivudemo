<?php 
$order_id=$_REQUEST["order_id"];
		$con=mysql_connect('localhost','root','');
    mysql_select_db('shopping',$con);
    $res=mysql_query("delete from order_tbl where o_id='$order_id'",$con);
	echo $res;
	if($res==1)
	{
		 header('Location:viewcart.php');
 	
	} 
	else
	{
		echo "something went wrong";
	}




?>