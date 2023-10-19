<?php 
session_start(); 
include "config.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM parents WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['nom_enfant'] = $row['nom_enfant'];
            	$_SESSION['id_enf'] = $row['id_enf'];
				$_SESSION['image'] = $row['image'];
            	header("Location: ../home.php");
		        exit();
            }else{
				header("Location: ../login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../login.php");
	exit();
}
?>