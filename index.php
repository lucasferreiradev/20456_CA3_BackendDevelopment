<!-- Login Session --> 
<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'covid');

    if(!isset($_SESSION['email'])){
        echo "<script>window.open('login.php','_self');</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
<!-- Logout button dimension -->
    <a class="btn btn-danger" style="margin-top: 25px; margin-left: 1150px; margin-right: 115px" href="logout.php">Logout</a> 
<div class="container">
  <h2>Country List</h2>
    
<!-- Database connection -->
    <div>    
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
        <th>Country Name</th>
        <th>Country Flag</th>
        <th>Country Details</th>
      </tr>
    </thead>
      
    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'covid');
      
      $select = "SELECT * FROM user";
      $run = mysqli_query($conn, $select);
      while($row_user = mysqli_fetch_array($run)) {
          $user_name = $row_user['user_name'];
          $user_image = $row_user['user_image'];
          $user_details = $row_user['user_details'];
      
      ?>
      
      <tr>
        <td><?php echo $user_name;?></td>
        <td><img src="upload/<?php echo $user_image;?>"style="margin-top: 5px; margin-left: 30px; margin-right: -115px" height="30px;"></td>
        <td><?php echo $user_details;?></td>
      </tr>
      <?php } ?>
  </table>
        
<!-- Button details and panel -->
        <a class="btn btn-primary" href="view_user.php">Country Details</a>
        <a class="btn btn-primary" href="view_cases.php">Covid Panel</a>
</div>
</div>
</body>
</html>
