<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
li{
	display: flex;
}
.menu{
	position: sticky;
	 top: 0;
	 background-color: lightblue;
	 width: auto;
	 height: 70px;
}
.menu ul li a{
	text-decoration: none;
	color: white;
	font-size: 14px;
}
.conten{
	display: flex;
	align-items: center;
	flex-direction: column;
}

	</style>
</head>
<body>


	
<?php 
if (isset($_POST["up"])) {
	echo "huas";
	// header('Location: upload.php');
}
require "database.php";

$chane=$_COOKIE['accout'];
$result=json_decode($chane);


if ($result[0][10]=="admin") {
					?><div class="menu">
		<ul>
		<li>
			<img  src="<?php echo $result[0][9] ?>" style ="height: 50px;width: 50px; border-radius: 30px; border:2px solid blue;"><?php
		               		echo $result[0][3];
					$sqli = "SELECT *FROM `image`";
		        	$resulti = $db -> query($sqli) -> fetch_all();
		        	$imageurl="(Admin)";
		        	
		        	?><b><?php echo  $imageurl?></b>
			<a href="">asdasf</a>
			<a href="">sdgdfg</a>
		</li>
		</ul>
		
		
	</div>
<div class="conten">
		        	<?php

for ($i=0; $i < 20; $i++) { 
	?> <div><img src="<?php echo $resulti[0][1] ?>" style ="height:300px;width:400px;"></div><?php
}
?>
</div>
<?php

		        	
}else{

	?><form action="php/upload.php" class="menu" method="post">
		<ul>
		<li>
			<img  src="<?php echo $result[0][9] ?>" style ="height: 50px;width: 50px; border-radius: 30px; border:2px solid blue;"><?php
		               		echo $result[0][3];
					$sqli = "SELECT *FROM `image`";
		        	$resulti = $db -> query($sqli) -> fetch_all();
		        	$imageurl="";
		        	
		        	?><b><?php echo  $imageurl?></b>
			<a href="">asdasf</a>
			<a href="">sdgdfg</a>
			<button name="up" value="<?php echo $result[0][0]?>">Upbox</button>
		</li>
		</ul>
		
		
	</form>
	<?php for ($i=0; $i <count($resulti) ; $i++) { 
		?><img src="<?php echo $resulti[$i][1] ?>" style ="height:300px;width:400px; border-radius: 30px; border:2px solid blue;"><?php
	} ?>
	<?php
	echo $result[0][3];
	
}

 ?>

</body>
</html>
 