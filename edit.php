<?php include 'connection.php';
include 'header.php';
?>


<style type="text/css">img {
  border-radius: 50%;
}

</style>
 <?php 
        $passed_card_id=$_REQUEST['user_id'];
         $SelectUserData="Select * from `user_info` WHERE  `disable_flag`='0' AND `user_id`='$passed_card_id'";
        $result = mysqli_query($conn,$SelectUserData);
        while($row = mysqli_fetch_assoc($result)) 
        { 
           	$user_id=$row['user_id'];
            $username=$row['name'];
			$email=$row['email'];
			$phone=$row['contact_no'];
			$address=$row['password'];
            $image=$row["user_image"];
		}
 ?>

		<div class="modal-dialog">
			<div class="modal-content">
				<form  method="post" action="edit_user_code.php"  enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Users</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required>
							<input type='hidden' id='user_id' name="user_id" value="<?php echo $user_id; ?>">

						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" value="<?php echo $email; ?>" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<input class="form-control" name="address" type="text" name="address" value="<?php echo $address; ?>">
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" required>
						</div>	
						<div class="form-group">
							<label>Profile</label>
							<img src="<?php echo $image; ?>" alt="Avatar" style="width:50px">
							<input type="file" name="user_image"class="form-control" value="<?php echo $image; ?>"  >
						</div>	

					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	