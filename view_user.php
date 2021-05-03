<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Session</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
    
<!-- Logout button dimension -->
    <a class="btn btn-danger" style="margin-top: 5px; margin-left: 1150px; margin-right: 215px" href="logout.php">Logout</a>

<!-- Database connection -->
<div class="container">
  <h2>Country Details</h2>
    <?php        
        $conn = mysqli_connect('localhost', 'root', '', 'covid');
        if(isset($_GET['del'])) {
            $del_id = $_GET['del'];
        $delete = "DELETE FROM user WHERE user_id='$del_id'";
        $run_delete = mysqli_query($conn, $delete);
            if($run_delete === true){
                echo "record deleted";
            }else{
                echo "Failed, tru again";
            }
        }
    ?>
    
<!-- Bootstrap table layout -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Image</th>
        <th>Details</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
      
    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'covid');
      
      $select = "SELECT * FROM user";
      $run = mysqli_query($conn, $select);
      while($row_user = mysqli_fetch_array($run)) {
          $user_id = $row_user['user_id'];
          $user_name = $row_user['user_name'];
          $user_email = $row_user['user_email'];
          $user_password = $row_user['user_password'];
          $user_image = $row_user['user_image'];
          $user_details = $row_user['user_details'];      
      ?>

      <tr>
        <td><?php echo $user_id;?></td>
        <td><?php echo $user_name;?></td>
        <td><?php echo $user_email;?></td>
        <td><?php echo $user_password;?></td>
        <td><img src="upload/<?php echo $user_image;?>"height="30px;"></td>
        <td><?php echo $user_details;?></td>
          
<!-- Buttons edit and delete -->
          <td><a class="btn btn-danger" href="view_user.php?del=<?php echo $user_id;?>">Delete</a></td>
          <td><a class="btn btn-success" href="edit_user.php?edit=<?php echo $user_id;?>">Edit</a></td>
      </tr>
      <?php } ?>
  </table>
    
<!-- Buttons add and home -->
            <a class="btn btn-primary" href="add_user.php">Add New</a>
            <a class="btn btn-primary" href="index.php">Home</a>
        </div>
    </body>
</html>
