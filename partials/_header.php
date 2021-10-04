<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum">Idiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Top categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
            $sql = "SELECT catagory_name,catagory_id FROM `categories` LIMIT 3";
            $rst = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($rst)){
              echo '<a class="dropdown-item" href="thread_list.php?catid='.$row['catagory_id'].'">'.$row["catagory_name"].'</a>';
            }
                
                
            echo '</div>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="contact.php" tabindex="-1" aria-disabled="true">Contacts</a>
        </li>
    </ul>
    <div  class="row mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="form-inline my-2 my-lg-0" method="get" action="search.php">
        <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <p class ="text-light my-0 mx-2">Welcome : '.$_SESSION['email'].'</p>
    </form>
    <a class="btn btn-success" href="partials/_logout.php">LogOut</a>';
    

    }
    else{
    echo '<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-success mx-2" data-toggle="modal" data-target="#login">Login</button>
    <button class="btn btn-success " data-toggle="modal" data-target="#signup">SignUp</button>';
    }
    echo '</div>

    
</div>
</nav>';
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Congrats!!</strong> You have successfully signedup, now you can log in...
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false"){
    $error = $_GET['error'];
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Sorry!! </strong>'.$error.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if(isset($_GET['loggedin']) && $_GET['loggedin'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Congrats!!</strong> You have successfully logged in...
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if(isset($_GET['loggedin']) && $_GET['loggedin'] == "false"){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Sorry!!</strong> The password you entered does\'t matched with any of the data....
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if(isset($_GET['loggedout']) && $_GET['loggedout'] == "true"){
    echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Successfully logged out</strong> Hope to see you again.....
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


?>