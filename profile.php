<?php

include_once 'header.php';
require_once './includes/dbh.inc.php';
require_once './includes/functions.inc.php';


?>


<h1 class="myprofile">Your profile</h1>
        <div>
            <div class="card">
                <img class="myself card-img-top" src='<?php echo getProfilePic($connect) ?>' alt='no pic'>

                <div class="card-body">
                    
                    <h4 class="card-title"><?php echo $_SESSION['username']; ?></h4>
                    <p class="card-text">
                        <ul>
                            <li>exemple.02@gmail.com</li>
                            <li>Apprenti</li>
                        </ul>
                        <button type = "button" class = "btn btn-primary btn-sm">
                        Edit 
                     </button>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>