<?php 

	$Pro_id=$_POST["txtid"];
	$Pro_name=$_POST["txtname"];
	$Pro_price=$_POST["txtprice"];
	$Pro_soh=$_POST["txtsoh"];
	$Pro_mfg=$_POST["txtmfg"];
	$Pro_warranty=$_POST["txtwrty"];
	$Pro_color=$_POST["txtcolor"];
	$cat_id=$_POST["txtcatid"];

if($_FILES["txtimg"]["size"]>0)
{

$Pro_img="../images/".$_FILES["txtimg"]["name"];
move_uploaded_file($_FILES["txtimg"]["tmp_name"],$Pro_img);
}

	echo $Pro_img;
require '../conclass.php';
$obj=new conclass();
$res=$obj->getdata("update product_tbl set Pro_img='$Pro_img',Pro_name='$Pro_name',Pro_price='$Pro_price',Pro_soh='$Pro_soh',
Pro_mfg='$Pro_mfg',Pro_warranty='$Pro_warranty',Pro_color='$Pro_color',
fk_cat_id='$cat_id' where Pro_id='$Pro_id'");

		if($res==1)
		{
			header('location:viewproduct.php');
		}
		else
		{
			echo "something wrong";
		}
?>
