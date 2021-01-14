<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>My Bocuse</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg static-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="./images/chapeauu.png" alt="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
             <?php
                    if(isset($_SESSION['username'])){
                        echo '<li class="nav-item active">';
                        echo '<a class="nav-link text-white" href="profile.php">Profile
                        </a>';
                        
                        echo '<a class="nav-link text-white" href="index.php">Recettes
                        </a></li>';
                        
                        echo '<li class="nav-item"><a class="nav-link text-white" href="includes/logout.inc.php">Log out</a>
                        </li>';
                        
                    }else{
                        echo '<li class="nav-item active">';
                        echo '<a class="nav-link text-white" href="signup.php">Sign up</a>';
                        echo '<a class="nav-link text-white" href="login.php">Log in</a> </li>';
                    }
                ?> 
            </ul>
        </div>
    </div>
</nav> 
