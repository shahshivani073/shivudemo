<?php 
session_start();

?>
<?php 
	$email=$_SESSION["email"];
		
require '../conclass.php';
$obj=new conclass();
$res=$obj->getdata("select * from user_tbl where Email_id='$email'");
		
		while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
{
	$uid=$row["Email_id"];
}

	?>


<nav class="navbar navbar-inverse navbar-fixed-bottam">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h1 class="navbar-brand" style="font-size:100px;">PS store</h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
			 <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class=" glyphicon glyphicon-user" aria-hidden="true"></span>  User <span class="caret"></span></a>
          <ul class="dropdown-menu">
		              <li><a href=""><?php echo $uid;?></a></li>
			<li role="separator" class="divider"></li>

            <li><a href="#"><h4>Change Password</h4></a></li>
			 <li role="separator" class="divider"></li>

            <li><a href="../index.php"><h4>LogOut</h4></a></li>
			
  </ul>
      </li>
      </ul>
	  <a href="viewcart.php"><span class="input-group-addon" style="padding:10px; width:50px;" id="sizing-addon2"><span style="width:50px;" class=" glyphicon glyphicon-shopping-cart"  aria-hidden="true"></span> </a>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
          <ul class="dropdown-menu">
		  <?php 
			
		$obj=new conclass();

		$res=$obj->getdata("select * from category_tbl");
		  while($row=MYSQL_fetch_array($res,MYSQL_ASSOC))
		{
			echo '<li><a href="catbypro.php?id='.$row["Category_id"].'"><h4>'.$row["Category_name"].'</h4></a></li>';
			echo "<li role='separator' class='divider'>"."</li>";
		}
		?>
            </ul>
        </li>
      </ul>
          </form>
        </div>
      </div>
    </nav>
