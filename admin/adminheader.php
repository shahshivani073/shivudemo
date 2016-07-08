<?php 
session_start();
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

          <h1 class="navbar-brand" style="font-size:100px;">PS store</h1>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control"  placeholder="Search...">
			 <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class=" glyphicon glyphicon-user" aria-hidden="true"></span>  User <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href=""><?php echo $uid;?></a></li>
			<li role="separator" class="divider"></li>
			<li><a href="userdetail.php">View Users</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="../index.php"><span class=" glyphicon glyphicon-off" aria-hidden="true"></span> LogOut  </a></li>
  </ul>
      </li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="viewcat.php">View Categories</a></li>
			</ul>
        </li>
      </ul>
	  <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="viewproduct.php">View Product</a></li>
			</ul>
        </li>
      </ul>
    
          </form>
        </div>
      </div>
    </nav>
