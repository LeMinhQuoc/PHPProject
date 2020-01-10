<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/themelogin.css">
</head>
<body >



<div>

	<div class="header" id="header">
		<img src="image/iconlogo.png" style="height: 80px;width: 80px;">
		<h3 style=" color: white;font-family: Florence, cursive">BAMBOO</h3>
		<ul>
			<li style="list-style-type: none;">

			</li>
			
		</ul>
		<div id="fisrt">
				<button style="margin-top: 18px;" onclick="loginform()">Login</button>
			</div>
	</div>

	<div style="display: flex;">
		<img src="image/login.png" style="position: absolute; z-index: -1; left: 300; width: 206px;height: 382px;">

		<div class="login-form" id="login-form">


	<form  action="" method="post"  >
		<h1 style="color: white;font-family: Florence, cursive">VN BamBoo</h1>
		<div style="display: flex;flex-direction: column;">
			<input class="inputf" type="" name="username">
			<input class="inputf" type="password" name="password">
		</div>
		<div style="display: flex;flex-direction: column;">
			<button name="check" style="font-family: Florence, cursive" class="login-b" value="<?php echo $countlogin ?>"> Login </button>

			<button name="signin" style="font-family: Florence, cursive" class="signin-b" onclick="hideloginform()">Sign in</a></button>
		</div>
		
	</form>
	
	
</div>			<div id="body">
				<?php require "php/signin.php"?>
				</div>
	</div>
	
	</div>

<!-- <div class="furter">
	<div>DESIGN BY QUOC</div>
	<div></div>

	<div></div>
</div> -->



	<?php
	session_start();
	if (isset($_POST["logout"])) {
		session_unset();
		session_destroy();

	}
	
	if (isset($_SESSION["accout"])) {
		header("location: Main.php");
	}
	if (isset($_POST["signin-bi"])) {
		

		if (isset($_POST["firstname"])!=""&&isset($_POST["lastname"])!=""&&isset($_POST["phone"])!=""&&isset($_POST["age"])!=""&&isset($_POST["email"])!=""&&isset($_POST["gender"])!="") {

			$usernames=$_POST["username"];
			$passwords=$_POST["password"];
			$firstname=$_POST["firstname"];
			$lastname=$_POST["lastname"];
			$phone=$_POST["phone"];
			$age=$_POST["age"];
			$email=$_POST["email"];
			$gender=$_POST["gender"];

			 $tmp_name = $_FILES["avata"]["tmp_name"];
			 $fname = basename($_FILES["avata"]["name"]);
			 
        
			 if (move_uploaded_file($tmp_name, "image/".$fname)) {
		        echo "The file ". basename( $_FILES["avata"]["name"]). " has been uploaded.";
		    } 

			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "socialnet";

			$db = new mysqli($servername, $username, $password, $database);
			$sql="INSERT INTO `users`(username,passwords,firstname,lastname,phone,age,email,gender,avata) values ('".$usernames."','".$passwords."','".$firstname."','".$lastname."','".$phone."','".$age."','".$email."','".$gender."',"."'"."image/".$fname."'".")";
			$db->query($sql);
			echo "dang ky tc!";
		}else{
			echo "error sign up!";
		}
	}

	$countlogin=2;
		require "php\database.php";
		if (isset($_POST["signin"])) {
			$countlogin=1;
			require "php\signin.php";
		}
		if (isset($_POST['check'])) {
			
    	if (isset($_POST['username']) && isset($_POST['password'])) {
    	if (isset($_POST['check'])==1) {
    		$countlogin=$_POST['check'];
    		# code...
		    	}else{$countlogin=0;}
		    	
		        $ktra = 0;
		        $username = $_POST["username"];
		        $password = $_POST["password"];

		        $sql = "SELECT *FROM `users` where username"."=". "'".$username."'"."AND passwords=". "'".$password. "'";
		        $result = $db -> query($sql) -> fetch_all();

			if ($result!=null) {
							$_SESSION["accout"] =json_encode($result);
							
		               		$countlogin=1;
		                	$ktra++;
		                	
		                	header("location: Main.php");
		                	
           				 }
            }
  		   	if ($ktra == 0) {
		       	 require "php\worng.php";
		    		}
			}

		?>





<script >

document.getElementById("login-form").style.display = "none";
if (<?php echo $countlogin ?>==1)
 {
	document.getElementById("fisrt").style.display = "none";
	document.getElementById("header").style.display = "none";
}



function loginform(){
	document.getElementById("login-form").style.display = "flex";
	document.getElementById("fisrt").style.display = "none";
	
	document.getElementById("body").style.display = "none";
}

function hideloginform(){
	document.getElementById("login-form").style.display = "none";
	document.getElementById("fisrt").style.display = "none";
	document.getElementById("header").style.display = "none";

}

							
</script>
</body>
</html>

