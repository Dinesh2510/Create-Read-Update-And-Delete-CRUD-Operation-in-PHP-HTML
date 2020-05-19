<!DOCTYPE html>
<?php include 'connection.php';
include 'header.php';
$user_id =null;

?>
<style type="text/css">img {
  border-radius: 50%;
}</style>>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Users</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
											
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						 <th>User ID</th>
                        <th>Name</th>
                         <th>Profile</th>
                        <th>Email</th>
						<th>Address</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                	 <?php

                      $SelectUserData="SELECT * FROM user_info WHERE `disable_flag`= '0' ORDER BY user_id DESC";
                      $result = mysqli_query($conn,$SelectUserData);
                      while($row = mysqli_fetch_assoc($result)) { 
                       $user_id=$row['user_id'];
                      ?>

                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td><?php echo $row["user_id"];?></td>
                        <td><?php echo $row["name"];?></td>
                        <td> <img src="<?php echo $row["user_image"];?>" alt="Avatar" style="width:50px"></td>
                        <td><?php echo $row["email"];?></td>
						<td><?php echo $row["password"];?></td>
                        <td><?php echo $row["contact_no"];?></td>
                        <td>

                       <a href=" edit.php?user_id=<?php echo $user_id; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
 
                            <a href="delete.php?user_id=<?php echo $user_id; ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                        </td>
                    </tr>
 					<?php  } ?>
                   
                </tbody>
            </table>
<?php
$sql = $conn->query("SELECT COUNT(*) FROM user_info WHERE disable_flag='0'");
$row = $sql->fetch_row();
$count = $row[0];
//echo "$row[0]";
?>        
			<div class="clearfix">
                <div class="hint-text">Showing <b><?php echo $row[0]?></b> out of <b><?php echo $row[0]?></b> entries</div>
               
            </div>
        </div>
    </div>

	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="add_user.php"  enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="username" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Address</label>
							<textarea class="form-control" name="address" required></textarea>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="text" name="phone" class="form-control" required>
						</div>	
						<div class="form-group">
							<label>Profile</label>
							<input type="file" name="user_image" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
</body>
</html>                                		                            