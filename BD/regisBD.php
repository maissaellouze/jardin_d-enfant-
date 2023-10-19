<?php 
session_start(); 
include "config.php";
// error_reporting(0); 
echo"<script>
alert('hmkjhgii')
</script>";
if (isset($_POST['cin']) && isset($_POST['name_par']) &&  isset($_POST['name_enf']) && isset($_POST['uname']) && isset($_POST['password'])
     && isset($_POST['re_password'])  && isset($_POST['date']) && isset($_POST['lieu'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$cin = validate($_POST['cin']);
	$name_par = validate($_POST['name_par']);
	$name_enf = validate($_POST['name_enf']);
	$date_naisa=validate ($_POST['date']);
	$lieu_naiss=validate ($_POST['lieu']);
	$uname = validate($_POST['uname']);
	//$name = validate($_POST['name']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	/*
	 $file_tmp=$_FILES["image"]["tmp_name"];
	
	 $file_name=$_FILES["image"]["name"];
	 $file_size=$_FILES["image"]["size"];
	 $file_type=$_FILES["image"]["type"];*/
	
	
	$user_data = 'uname='. $uname. '&name_par='. $name_par;


	if (empty($uname)) {
		header("Location: ../regis.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: ../regis.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: ../regis.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: ../regis.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: ../regis.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{
		$sql = "SELECT * FROM parents WHERE cin_parent='$cin'and nom_enfant='$name_enf' ";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			header("Location: ../regis.php?error=enfant deja inscrit  &$user_data");
	        exit();
		} else {
			// hashing the password
			

			$sql = "SELECT * FROM parents WHERE user_name='$uname' ";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				header("Location: ../regis.php?error=The username is taken try another&$user_data");
				exit();
			}else {
				 $pass = md5($pass);
		
				 
			// if (is_uploaded_file($_FILES[$_POST['image']]['tmp_name'])) {
			// 	echo "File ". $_FILES['image']['name'] ." téléchargé avec succès.\n";
			// 	echo "Affichage du contenu\n";
			// 	readfile($_FILES['image']['tmp_name']);
			//  } else {
			// 	echo "Attaque possible par téléchargement de fichier : ";
			// 	echo "Nom du fichier : '". $_FILES['image']['tmp_name'] . "'.";
			//  }
				
				echo"<script>
		alert('hii')
	</script>";
				$file=addslashes((file_get_contents($_FILES['image']['tmp_name'])));
		//$result=addslashes(fread(fopen($file_tmp,"r"),$file_size));
			$sql2 = "INSERT INTO parents(cin_parent,nom_parent,nom_enfant,date_naiss,lieu_naiss,user_name, password,image) VALUES('$cin','$name_par','$name_enf','$date_naisa','$lieu_naiss','$uname', '$pass', '$file')";
			
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: ../regis.php?success=Your account has been created successfully");
				exit();
			}else {
					header("Location: ../regis.php?error=unknown error occurred&$user_data");
					exit();
			}
			}
		}
	}
		
	}else{
		header("Location: ../regis.php");
		exit();
	}

