<?php


session_start();
include "config.php";

	/*$conn = new PDO( 'mysql:host=localhost;dbname=projet_mess', 'root', '');
	if(!$conn){
		die("Error: Failed to coonect to database!");
	}*/
		if(ISSET($_POST['envoyer'])){
			echo "<script>
			alert('salyt name')
			
			</script>";
			function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
			}
            $nom = validate($_POST['nom']);
			$email = validate($_POST['mail']);
			$object = validate($_POST['sub']);
			$message = validate($_POST['mess']);
			
            if (empty($nom)) {
				echo "<script>
				alert('Please enter your name')
				window.location.replace('../contact.php')
				</script>";

			}
			if (empty($email)) {
				echo "<script>
				alert('Please enter your email')
				window.location.replace('../contact.php')
				</script>";

			}else if(empty($object)){
				echo "<script>
				alert('Please enter your subject')
				window.location.replace('../contact.php')
				</script>";
				
			}
			else if(empty($message)){
				echo "<script>
				alert('Please enter your message ')
				window.location.replace('../contact.php')
				</script>";

			}
			
			else{
				$id=$_SESSION['id_enf'];
				 
					$sql = "INSERT INTO `message_ext` (`nom_ext`,`mail_ext`,`sub_ext`,`mess_ext`,`id_enf`) VALUES ('$nom','$email', '$object', '$message',$id)";
					//$conn->exec($sql);
					$result = mysqli_query($conn, $sql)or die("database error:". mysqli_error($conn)); 
					
					if ($result) {
						header("Location: ../contact.php?success=Your message has been sent successfully");
						
					exit();
					}else {
							header("Location: ../contact.php?error=unknown error occurred");
							exit();
					}
					
				}


			}
			
		else{
			echo "<script>
	alert('salyt exit')
	window.location.replace('../contact.php')
	</script>";
			header("Location: ../contact.php");
			exit();
		}

    ?>