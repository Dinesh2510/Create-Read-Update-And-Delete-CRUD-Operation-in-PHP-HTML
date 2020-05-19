
<?php
require_once('connection.php');
 $user_id=$_GET['user_id'];
$DeleteUser="UPDATE `user_info` SET `disable_flag`= 1 WHERE user_id= $user_id";
$result = mysqli_query($conn,$DeleteUser);


if ($result) {
   
	echo '<script>
   alert("Success");
   window.location.href = "index.php";
   
    </script>';

    } else {

    echo '<script>
  	alert("Fail");
    window.location.href = "index.php";

   
    </script>';
    }

    
    
?>

 