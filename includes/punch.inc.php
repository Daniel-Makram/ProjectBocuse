<?php
session_start();
if(isset($_POST["submit"])){

    $punchin = $_POST['punchin'];
    $punchout = $_POST["punchout"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($punchin,$punchout) !==false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    punchin($connect,$punchin,$punchout);
    
} else{
    header('location: ../index.php');
    exit();
}