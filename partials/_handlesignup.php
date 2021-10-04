<?php
$showAlert = 'false';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('_dbconnect.php');
    $user_email = $_POST['uemail'];
    $user_pass = $_POST['pass'];
    $user_cpass = $_POST['cpass'];
    


    // checking if the user email already exist
    $query = "SELECT * FROM `user` where user_email = '$user_email'";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);
    if ($numRows>0){
        // echo 'the email already exists';
        $showerror = "the email already exist, please try another email";
        // header("location: /forum/index.php?signupsuccess=false&error=$showerror");

    }
    else{
        if($user_pass == $user_cpass){
            $qry = "INSERT INTO `user` (`user_email`, `user_pass`) VALUES ('$user_email', '$user_pass')";
            $rst = mysqli_query($conn, $qry);
            if($rst){
                $showAlert = true;
                header("location: /forum/index.php?signupsuccess=true");
                exit();
            }
    
        }
        else{
            // echo "password doesn't matched";
            // header("location: /forum/index.php?signupsuccess=false");
            $showerror = "password don't matched";

        }
    }
        header("location: /forum/index.php?signupsuccess=false&error=$showerror");

    

}


?>