<?php 
session_start();
?>
 
<?php 
$pro_id=$_REQUEST["id"];

 $email_id=$_SESSION["email"];
 require '../conclass.php';
$obj=new conclass();

		$res=$obj->getdata("select * from product_tbl where Pro_id='$pro_id'");
  while($row=mysql_fetch_array($res,MYSQL_ASSOC))
  {
	  $price=$row["Pro_price"];
	 
  }
  
 $qty=1;

 $amt=$qty*$price;

 $order_date="24/6/16";
 $flag="cart";
 
  $res=mysql_query("insert into order_tbl values(NULL,'$amt','$order_date','$pro_id','$email_id','$qty','$flag')");
  if($res==1)
  {
	  header('Location:viewcart.php');
  }
  else
  {
	  echo "something went wrong";
  }

?>