<?php
include_once 'header.php';
?>


<div class="login-box">
        <form action='includes/signup.inc.php' method='post'>
        <h1>Sign Up </h1>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type='text' name='firstname' placeholder='Firstname'>
        </div>
      
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type='text' name='lastname' placeholder='Lastname'>
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type='text' name='email' placeholder='Email'>
          </div>

          <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type='password' name='pwd' placeholder='Password'>
          </div>

          <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type='password' name='pwdrepeat' placeholder='Repeat password'>
          </div>
      <div class="d-flex justify-content-center">
        <button type="submit " class="btn" name='submit' >Sign Up</button>
    </form>
  </div>
      </div>
   
      <?php 
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }else if($_GET["error"]=="invalidemail"){
            echo "<p>Invalid Email! </p>";
        }else if($_GET["error"]=="passwordsdontmatch"){
            echo "<p>Passwords Don't Match!</p>";
        }else if($_GET["error"]=="emailtaken"){
            echo "<p>Email is already taken !</p>";
        }else if($_GET["error"]=="stmtfailed"){
            echo "<p>Something went wrong, please try again! </p>";
        }else if($_GET["error"]=="none"){
            echo "<p>You have successfully signed up! </p>";
        }
    }
?>
</body>

</html>