<?php
$showAlert = 'false';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('_dbconnect.php');
    $login_email = $_POST['lemail'];
    $login_pass = $_POST['lpass'];
  
    // checking if the user email already exist
    $query = "SELECT * FROM `user` where user_email = '$login_email'";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);
    if ($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if($login_email == $row['user_email'] && $login_pass == $row['user_pass']){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['email'] = $login_email;
            header("location:/forum/index.php?loggedin=true");
            exit();
        }
        
    }
    header("location:/forum/index.php?loggedin=false");
}


?>