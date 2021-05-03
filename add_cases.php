<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add New Cases</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
    
<!-- Logout Session -->
<body>
    <a class="btn btn-danger" style="margin-top: 25px; margin-left: 1330px; margin-right: 215px" href="logout.php">Logout</a>
<div class="container">

<h2>New Cases</h2>
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
    <a class="btn btn-primary" href="view_user.php">Country Details</a>
  </form>

<!-- Database connection (post) -->
    <?php 
    $conn = mysqli_connect('localhost', 'root', '', 'covid');
    
    if(isset($_POST['insert-btn'])) {
    
    $user_name = $_POST['user_name'];
    $user_cases = $_POST['user_cases'];
    $user_deaths = $_POST['user_deaths'];
    $user_vaccine = $_POST['user_vaccine'];
    $image = $_FILES['user_image'];
    $tmp_name = $_FILES['user_image'] ['tmp_name'];
    
    $insert = "INSERT INTO cases (user_name, user_cases, user_deaths, user_vaccine, user_image) 
    VALUES('$user_name','$user_cases','$user_deaths','$user_vaccine','$image')";
     
    $run_insert = mysqli_query($conn, $insert);
        if($run_insert === true){
            echo "Data Inserted";
            move_uploaded_file($tmp_name, "upload/$image");
        }else{
            echo "Failed, try again";
        }       
    } 
    ?>
        </div>
    </body>
</html>
