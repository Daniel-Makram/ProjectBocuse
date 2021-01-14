<?php

function emptyInputSignup($firstName,$lastName,$email,$pwd,$pwdRepeat){
    $result;
    if(empty($firstName)||empty($lastName)||empty($email)||empty($pwd)||empty($pwdRepeat)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result;
    if($pwd!==$pwdRepeat){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function emailExists($connect,$username,$email){
    //prevent sql injection | select email only here but firstname is for login purpuses
    $sql = "SELECT * FROM users WHERE usersFirstName = ? OR usersEmail = ?;";
    //prepared statement
    $stmt = mysqli_stmt_init($connect);
    //check if stmt or sql failed then redirect
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    // statement, number of parameters(s=string,ss=2strings)
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

        //$row is created while the true/false is happening
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result=false;
        return $result;
    }
    //close prepared statement
    mysqli_stmt_close($stmt);
}

function createUser($connect,$firstName,$lastName,$email,$pwd){
    $accountType='student';
    //prevent sql injection by using prepared statement
    $sql = "INSERT INTO users (usersFirstName,usersLastName,userAccountType,usersEmail,usersPwd) VALUES (?,?,?,?,?);";
    //prepared statement
    $stmt = mysqli_stmt_init($connect);
    //check if stmt or sql failed then redirect
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    //hash password before sending to DB
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    /*
        //if password was hashed in older version or cost increased with better hardware
        if ( password_needs_rehash ( $hash, PASSWORD_DEFAULT ) ) {
            $newHash = password_hash( $user_input_pwd, PASSWORD_DEFAULT );
    
            TODO
            UPDATE the user's row in `log_user` to store $newHash  
          }
        }
    */


    // statement, number of parameters(s=string,ss=2strings)
    mysqli_stmt_bind_param($stmt,"sssss",$firstName,$lastName,$accountType,$email,$hashedPwd);
    mysqli_stmt_execute($stmt);
    //close prepared statement
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
   
}


function emptyInputLogin($username,$pwd){
    $result;
    if(empty($username)||empty($pwd)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function loginUser($connect, $username, $pwd){
    //using previous function
    $emailExists= emailExists($connect,$username,$username);

    if($emailExists === false){
        header('location: ../login.php?error=wronglogin');
        exit();
    }

    //get pwd from DB || if $emailExists is true , it returns assoc array
    $pwdHashed = $emailExists["usersPwd"];

    // check hash
    $checkPwd = password_verify($pwd,$pwdHashed);

    if($checkPwd ===false){
        header('location: ../login.php?error=wronglogin');
        exit();
    }else if($checkPwd===true){
        session_start();
        $_SESSION["userid"] = $emailExists["usersId"];
        $_SESSION["username"] = $emailExists["usersFirstName"];
        header("location: ../profile.php");
        exit();
    }

}

function getProfilePic($connect){
//prevent sql injection | select email only here but firstname is for login purpuses
$currentUser=$_SESSION['username'];
$sql = "SELECT Picture FROM users WHERE usersFirstName = '$currentUser' ;";


// // mysqli_free_result($result);
$result=mysqli_query($connect, $sql);
$row=mysqli_fetch_array($result);
return $row[0];
}

function isAdmin($connect){
    $currentUser=$_SESSION['userid'];
    $sql = "SELECT userAccountType FROM `users` WHERE usersid='$currentUser';";

    $result=mysqli_query($connect, $sql);
    $row=mysqli_fetch_all($result);
    if($row[0][0] === 'chef'){
        return true;
    }else{
        return false;
    }
}
function getLogTime($connect){

    //prevent sql injection | select email only here but firstname is for login purpuses
    if(isadmin($connect)){
        $currentUser='user_id';
    }else{
        $currentUser= " user_id=" . $_SESSION['userid'] ;
    }

    $sql = "SELECT time,time_left,date,users.usersFirstName FROM `time` INNER JOIN users ON time.user_id=users.usersId WHERE $currentUser AND date BETWEEN '2020-01-06' AND '2021-01-10' ORDER BY date ASC LIMIT 7;";

    // // mysqli_free_result($result);
    $result=mysqli_query($connect, $sql);
    $row=mysqli_fetch_all($result);
    return $row ;
}

function getServerTime($x){

    date_default_timezone_set('Europe/Brussels');
    $date_time = [date("d-m-Y"),date ('(D)'),date("H:i:s")];
    
    return($date_time[$x]);
}

function punchin($connect,$punchin,$punchout){
    
    $currentUser=$_SESSION['userid'];
    getServerTime(2);
    $date='2021-01-04';
    $sql = "INSERT INTO `time`(`time`, `time_left`, `date`, `user_id`) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($connect);
    //check if stmt or sql failed then redirect
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    // statement, number of parameters(s=string,ss=2strings)
    mysqli_stmt_bind_param($stmt,"sssi",$punchin,$punchout,$date,$currentUser);
    mysqli_stmt_execute($stmt);
    //close prepared statement
    if(mysqli_stmt_close($stmt)){
        header("location: ../index.php?error=none");
    }else{
        header("location: ../index.php?error=yes");

    }
    exit();

}

function getRecipe($connect){

    //prevent sql injection | select email only here but firstname is for login purpuses
    if(isadmin($connect)){
        $currentUser='auteur_id';
    }else{
        $currentUser= " auteur_id=" . $_SESSION['userid'] ;
    }

    $sql = "SELECT `sujet`,  `date`, `image`, `lien`,users.usersFirstName FROM `recettes` INNER JOIN users ON recettes.auteur_id=users.usersId WHERE $currentUser ORDER BY date ASC LIMIT 7";
    // // mysqli_free_result($result);
    $result=mysqli_query($connect, $sql);
    $row=mysqli_fetch_all($result);
    return $row ;
}


