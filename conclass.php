<?php
class conclass{
	public function getdata($query)
	{
		$con=MYSQL_connect('localhost','root','');
		MYSQL_select_db('shopping',$con);
		$res=MYSQL_query($query,$con);
		return $res;
	}
}

 ?>