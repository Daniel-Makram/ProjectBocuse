<?php
include_once 'header.php';
?>




<div class="login-box">
        <form action='includes/login.inc.php' method='post'>
        <h1>Login </h1>
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type='text' name='email' placeholder='Email/firstName'>
        </div>
      
        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type='password' name='pwd' placeholder='Password'>
        </div>
      <div class="d-flex justify-content-center">
        <button type="submit " class="btn" name='submit'>Log In</button>
      </div>
    <!-- </form> -->
      </div>

      <?php 
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }else if($_GET["error"]=="wronglogin"){
            echo "<p>Wrong login credentials !</p>";
        }
    }
?>
 
</body>
</html>

