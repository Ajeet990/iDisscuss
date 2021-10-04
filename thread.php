<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>I_discuss forum</title>
</head>

<body>
<?php include('partials/_dbconnect.php'); ?>

    <?php include('partials/_header.php'); ?>

    <?php
    $id = $_GET['threadid'];
    $qry = "SELECT * FROM `threads` WHERE thread_id = $id";
    $rst = mysqli_query($conn, $qry);
   
    while ( $row = mysqli_fetch_assoc($rst)){
       
       $ttitle = $row['thread_title'];
       $tdescr = $row['thread_descr'];
       $thread_user_id = $row['thread_user_id'];

       $query2 = "SELECT user_email FROM `user` WHERE sno = '$thread_user_id'";
       $result2 = mysqli_query($conn, $query2);
       $row2 = mysqli_fetch_assoc($result2);
       $posted_by = $row2['user_email'];
    }
    
    ?>

    <?php
    
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "POST"){
        // insert into data into database
        $cmt = $_POST['cmt'];
        $sno = $_POST['sno'];
        $qry = "INSERT INTO `comments` (`comment_content`, `thread_id`, `commented_by`) VALUES ('$cmt', '$id', '$sno')";
        $rst = mysqli_query($conn, $qry);
        
        if($rst){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success </strong>Your comment has been recorded...
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    }
    
    ?>

    <!-- jumbotron starts here -->
    <div class="container my-2">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $ttitle;  ?> </h1>
            <p class="lead"><?php echo $tdescr; ?></p>
            <hr class="my-4">
            <p>
            <h3>Rules of this Forum</h3>
            # No Spam / Advertising / Self-promote in the forums. ...<br>
            # Do not post copyright-infringing material. ...<br>
            # Do not post “offensive” posts, links or images. ...<br>
            # Remain respectful of other members at all times.</p>
            <p>Asked by:<em><?php echo $posted_by; ?></em></p>
        </div>
    </div>

    <div class="container">
        <h1>Discussion On this problem</h1>
<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

        echo '<!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Reply to this question
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Your Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method ="post" action = "'.$_SERVER["REQUEST_URI"].'">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Your comment regarding above question</label>
                                <div class="form-group">

                                    <textarea class="form-control" name="cmt" id="exampleFormControlTextarea1"
                                        rows="3"></textarea>
                                    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">

                                </div>
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>';
    }
    else{
        echo '<div class="jumbotron jumbotron-fluid">
        <div class="container">
          
          <p class="lead">Your are not loggedin, Please log in to ask a question of reply to any question...</p>
        </div>
      </div>';
    }

?>

    <div class="container">
        <?php
            $id = $_GET['threadid'];
            $query = "SELECT * FROM `comments` WHERE thread_id = $id";
            $result = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_assoc($result)){
               
                $comment = $row['comment_content'];
                $cmt_time = $row['comment_time'];
                $userid = $row['commented_by'];
                $query2 = "SELECT user_email FROM `user` WHERE sno = '$userid'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                
            
            echo '<div class="media my-3">
            <img src="img/userr.jpg" width="60px" class="mr-3 " alt="...">
            <div class="media-body">
            <p class ="font-weight-bold my-0">'.$row2['user_email'].' at:'.$cmt_time.'</p>
                <p class="mt-0">'.$comment.'</p>
                
                </div>
                </div>';
            }
           
    ?>
    </div>
    </div>


    <?php include('partials/_footer.php'); ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>