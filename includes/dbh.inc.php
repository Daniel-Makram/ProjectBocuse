<?php
require_once 'secret.php';


$server_Name = "localhost";
$Db_UserName = $rootuser;
$Db_Pwd = $rootpwd;
$Db_Name = "mybocuse";

// Connect to DB 
$connect = mysqli_connect($server_Name, $Db_UserName , $Db_Pwd, $Db_Name);

//check connection
if(!$connect){
echo 'Connection error:' . mysqli_connect_error();
}

// if($connect){
// // write query for all users

// $sql ='SELECT Name, LastName, Account_Type, Photo,id FROM `user info`';

// //make query & get result

// $result = mysqli_query($connect, $sql);

// //fetch resulting rows as array

// $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// //clean result from memory

// mysqli_free_result($result);

// //close connection to DB
// mysqli_close($connect);
// }

/*Don't use php closing tag if file only contains php Bcs empty lines after closing tags may cause error
*/