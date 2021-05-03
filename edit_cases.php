<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Session</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    
<!-- Logout session -->
<body>
    <a class="btn btn-danger" style="margin-top: 25px; margin-left: 1150px; margin-right: 215px" href="logout.php">Logout</a> 
<div class="container">
    
<!-- Database connection (get) -->
  <h2>Edit Country</h2>

     <?php        
        $conn = mysqli_connect('localhost', 'root', '', 'covid');
            if(isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                
            $select = "SELECT * FROM cases WHERE user_id='$edit_id'";
            $run = mysqli_query($conn, $select);
            $row_user = mysqli_fetch_array($run); 
                $user_name = $row_user['user_name'];
                $user_email = $row_user['user_cases'];
                $user_email = $row_user['user_deaths'];
                $user_email = $row_user['user_vaccine'];
                $user_image = $row_user['user_image'];
            }
    ?>
    
<!-- Variables Form -->
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" placeholder="Name" name="user_name">
    </div>
    <div class="form-group">
        <label>Cases:</label>
        <input type="text" class="form-control" placeholder="Cases" name="user_cases">
    </div>
    <div class="form-group">
        <label>Deaths:</label>
        <input type="text" class="form-control" placeholder="Deaths" name="user_deaths">
    </div>
    <div class="form-group">
        <label>Vaccine:</label>
        <input type="text" class="form-control" placeholder="Vaccine" name="user_vaccine">
    </div>
        <div class="form-group">
        <label>Image:</label>
      <input type="file" class="form-control" placeholder="Name" name="image">
    </div>
    
<!-- Buttons -->
      <input type="submit" name="insert-btn" class="btn btn-primary"/>
      <a class="btn btn-primary" href="view_cases.php">Covid Panel</a>
  </form>

<!-- Database connection (post) -->
    <?php 
      
        $conn = mysqli_connect('localhost', 'root', '', 'covid');
        
            if(isset($_POST['insert-btn'])) {

                $euser_name = $_POST['user_name'];
                $euser_cases = $_POST['user_cases'];
                $euser_deaths = $_POST['user_deaths'];
                $euser_vaccine = $_POST['user_vaccine'];
                $eimage = $_FILES['image']['name'];
                $eimage_tmp = $_FILES['image']['tmp_name'];
      
                if(empty($eimage)) {
                    $eimage= $user_image;
                }
    
            $update = "UPDATE cases SET user_name='$euser_name',user_cases='$euser_cases', user_deaths='$euser_deaths', user_vaccine='$euser_vaccine', user_image='$eimage' WHERE user_id='$edit_id' "; 
                
                $run_update = mysqli_query($conn,$update);
            if ($run_update === true) {
                echo "Data Updated";
               move_uploaded_file($eimage_tmp,"upload/$eimage");
            } else {
                echo "Failed, try again";
         }
      }    
    ?>
    
        </div>
    </body>
</html>
