<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">


</head>
<body >


	
<?php 
require "php/database.php";

if (isset($_POST["up"])) {
	echo "huas";
	// header('Location: upload.php');
}
if (isset($_SESSION["accout"])==false) {
		session_start();
	}

if (isset($_SESSION["accout"])==false) {
		header('location: index.php');
	}
$chane=$_SESSION["accout"] ;
$result=json_decode($chane);


if (isset($_POST["delete"])) {
	$id=$_POST["delete"];
	$sqli = "DELETE FROM image where id=".$id;
	$resulti = $db -> query($sqli);
}

if ($result[0][10]=="admin") {
	?><div class="menu1">
		<ul>
		<li>
			<img src="">
			<a href="">Home</a>

		</li>


		<li style="display: flex; position: absolute; right: 0;">
			<div>
				<img  src="<?php echo $result[0][9] ?>" style =" height: 50px;width: 50px; border-radius: 30px; border:2px solid blue;"><?php
		               		echo $result[0][3];
					$sqli = "SELECT *FROM `image`";
		        	$resulti = $db -> query($sqli) -> fetch_all();	
		        	?>
		        	<b><?php echo  "(Admin)"?></b>
			</div>
			
			
		<form action="index.php" method="post" class="logout">
			<button name="logout" alt="Logout" title="Logout"><img style="" src="image/logout.png"></button>
		</form>
			
		</li>
		</ul>
		
		
	</div>
<div class="conten">
		        	<?php

for ($i=0; $i < count($resulti); $i++) { 
	?> <div><img src="<?php echo $resulti[$i][2] ?>" style ="height:300px;width:400px;">
		
		<div>
				<img src="image/like.png" class="icon">
				 <img src="image/comment.png" class="icon">
				 <img src="image/share.png" class="icon">
		</div>
			
			
		</div><?php
}
?>
</div>
<?php

		        	
}else{

	?><form action="php/upload.php" class="menu" method="post">

		<ul>
		<li>

			<img src="image/iconlogo.png" style="height: 80px;width: 80px;">
			<input type="" name="search" style="margin-top: 20px; height: 20px; border-radius: 20px;"><img style="margin-top: 20px;width: 24px; height: 24px;" src="image/magnifying-glass.png">
			<img  src="<?php echo $result[0][9] ?>" style ="margin-left: 500px;height: 50px;width: 50px; border-radius: 30px; border:2px solid blue;">
			<b style="font-family:  lucida handwriting; margin-left: 20px;margin-top: 30px;"><?php echo $result[0][3]; ?></b>
			<?php
		               		
					$sqli = "SELECT *FROM `image`";
		        	$resulti = $db -> query($sqli) -> fetch_all();   	
		        	?>
			<div style="margin-left: 100px;">
				<button name="up" value="<?php echo $result[0][0]?> "title="Upload"><img style="" src="image/upload.png"></button>
				<button name="logout" alt="Logout" title="Logout"><img style="" src="image/logout.png"></button>
			</div>
			
			
		</li>
		</ul>
		
		
	</form>
	<form action="" method="post">
	<div class="conten">

		<?php for ($i=0; $i <count($resulti) ; $i++) { 

			$sqlim="SELECT firstname,avata FROM users where id=".$resulti[$i][1];
			$r=$db->query($sqlim)->fetch_all();

		?>

		<div style="width: 400px; display: flex;justify-content: space-between;">
			<div><img src="<?php echo $r[0][1]?>" style =" height: 50px;width: 50px; border-radius: 30px; border:2px solid blue;"><b style="font-family:  lucida handwriting";><?php echo $r[0][0]?></b></div>
			<img style="margin-right: 40px;height: 24px;" src="image/more.png">
		</div>
		<img src="<?php echo $resulti[$i][2] ?>" style ="height:600px;width:500px; ">
		<b><?php echo  $resulti[$i][3] ?></b>
		<div><?php
				$like=false;
				
				for ($j=0; $j <count(json_decode($resulti[$i][6])) ; $j++) { 
			
					if ($liked[$j]==$result[0][0]) {
						$like=true;
					
				}
				}
				
				if ($like==false) {
				 	?>
				 	<img src="image/like.png" class="icon" onclick="like(<?php echo $i; ?>,<?php  echo $result[0][0];?>)">
				 	<?php
				 } else{
				 	?>
				 	<img src="image/like (2).png" class="icon" onclick="dislike()">
				 	<?php
				 }
				 ?>
				
				 <img src="image/comment.png" class="icon">
				 <img src="image/share.png" class="icon">
		</div>
		<?php
	} ?>
	<?php
	;
	
}
 ?>
 
 	<hr>
	</div>
	</form>
<script type="text/javascript">
	// function like(id,a){
	// 			<?php $idu?>id;
	// 			<?php
	// 			$AR=json_decode($resulti[$idu][6]);
	// 					$l=?>a;<?php
	// 					array_push($AR,$l);
	// 			$ARU=json_encode($AR);
	// 					$sqlu = "UPDATE  image set liked=".$ARU." where  id=".$idu;

	// 					$resultu = $db -> query($sqlu);
	// 			 ?>
	// }
</script>
</body>
</html>
 