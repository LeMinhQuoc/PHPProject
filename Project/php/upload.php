<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	require "database.php";
	session_start();
	if (isset($_POST["logout"])) {
		session_unset();
		session_destroy();

		header("location: ../index.php");
	}

	if (isset($_POST["upfile"])) {
			$tmp_name= $_FILES["images"]["tmp_name"];
			 $fname = basename($_FILES["images"]["name"]);
			 
        
			move_uploaded_file($tmp_name, "../image/".$fname);
          $id=$_POST['id'];
          $status=$_POST['status'];
         
          echo $id;
		$sql="INSERT INTO image(userid,image,ustatus) VALUES (".$id.",'image/".$fname."','".$status."')";
		$db->query($sql);
		header("location: ../Main.php");
	}  
	?>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="images" id="images" style="display: none;">
		<label for="images"><img src="../image/photo-camera.png" style=" height: 15px"></label>


		<input hidden="" type="text" name="id" value="<?php echo $_POST['up'] ?>">
		<input type="" name="status">
		<input type="submit" name="upfile" value="up">
	</form>
	

</body>
</html>