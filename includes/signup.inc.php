<?php

if(isset($_POST["submit"])){
    
    $firstName =$_POST["firstname"];
    $lastName =$_POST["lastname"];
    $email =$_POST["email"];
    $pwd =$_POST["pwd"];
    $pwdRepeat =$_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    //Error Handlers
    if(emptyInputSignup($firstName,$lastName,$email,$pwd,$pwdRepeat) !==false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidEmail($email) !==false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdMatch($pwd,$pwdRepeat) !==false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if(emailExists($connect,$firstName,$email) !==false){
        header("location: ../signup.php?error=emailtaken");
        exit();
    }

    createUser($connect,$firstName,$lastName,$email,$pwd);
}else{
    header("location: ../signup.php");
    exit();
}                                           