<?php 
session_start();
include "config.php";
//echo"hi";
  $id_enf=$_SESSION['id_enf'];
  $code=$_POST['pay'];
    
  $sql1 = "INSERT INTO Etd_inscrit(id_enf,code_mat,date_insc) VALUES('$id_enf','$code',CURDATE())";
			
			$result1 = mysqli_query($conn, $sql1);
			if ($result1) {
        $req="update cours set nbrEtdInsc = nbrEtdInsc+1 where code_mat=".$code;
        $result2 = mysqli_query($conn, $req);
        header("Location: ../home.php?inscription reussit");
        echo "<script>
        alert('inscription reussit');
        </script>";
			}else {
					header("Location: ../home.php?error=unknown error occurred");
					exit();
			}
			



      // $sql2 = "SELECT nbrEtdInsc FROM cours WHERE code_mat=$code";
      // $result2 = mysqli_query($conn, $sql2);
			// if ($result2) {
				
			// }else {
			// 		header("Location: ../home.php?error=unknown error occurred");
			// 		exit();
			// }
    


 




  

?>
  

