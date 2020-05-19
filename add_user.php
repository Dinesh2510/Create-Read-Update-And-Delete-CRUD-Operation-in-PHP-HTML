 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
 <?php 

 require_once('connection.php');
 
 
            $username=$_POST['username'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];

 $uploaded = false;
 $filepath_image = '';
if(isset($_FILES)){
   $filetmp= $_FILES["user_image"]["tmp_name"];
  $filename_image= $_FILES["user_image"]["name"];
  $filetype= $_FILES["user_image"]["type"];
  $filepath_image= "user_images/".$filename_image;
  $imgsize=filesize($filetmp); 

  if(!move_uploaded_file($filetmp,$filepath_image)){
    $uploaded = false;

     echo '<script>
   alert("Fail to upload errors");
   window.location.href = "index.php";
    </script>';
            //return false;
  }else{
    $uploaded = true;
  }
}
 $InsertData= "INSERT INTO `user_info`( `name`, `email`, `contact_no`, `user_image`,  `password`) VALUES ('$username', '$email' ,  '$phone', '$filepath_image', '$address' )";

// var_dump($InsertData);die();
 $resultData=mysqli_query($conn,$InsertData);
 if ($resultData) {
   
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

 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>