<!-- Function that end the session returning to the login page. --> 
<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'covid');
    
        echo "<script>window.open('login.php','_self');</script>";
            
            session_destroy;
?>