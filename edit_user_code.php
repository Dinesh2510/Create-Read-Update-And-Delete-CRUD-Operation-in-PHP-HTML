 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
 <?php 

 require_once('connection.php');
              $user_id=$_POST['user_id'];
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
  $imgsize=filesize($filetmp);  //to get image size


  if(!move_uploaded_file($filetmp,$filepath_image)){
    $uploaded = false;
    echo '<script>
   
       setTimeout(function () { 
                                swal({
                                  title: "Error!",
                                  text: "Error while uploading File.",
                                  type: "error",
                                  confirmButtonText: "OK"
                                },
                                function(isConfirm){
                                  if (isConfirm) {
                                    window.location.href = "edit_post.php";
                                  }
                                }); }, 1000);
   
            </script>';
            //return false;
  }else{
    $uploaded = true;
  }
}


 


 $UpdateData="UPDATE `user_info` SET `name`='$username',`email`='$email',`contact_no`='$phone',`password`='$address' ";

 if( $uploaded == true ){
  $UpdateData .= " ,`user_image`='$filepath_image' WHERE `user_id` = $user_id";
 }else{
  $UpdateData .= " WHERE `user_id` = $user_id";
 }
 //var_dump($UpdateData);die; 
 $resultData=mysqli_query($conn,$UpdateData);
 if($resultData)
 {	
	echo '<script>
   alert("Success");
   window.location.href = "index.php";
   
    </script>';
                
            
    } else {
     echo '<script>
   alert("Fail to Update!");
   window.location.href = "index.php";
   
    </script>';
    }
    			
  
    						
?>

 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 