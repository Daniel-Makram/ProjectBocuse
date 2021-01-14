<?php

include_once 'header.php';


/* Hide error from webpage
 error_reporting(0);*/



if(isset($_SESSION['username'])){
    require_once './includes/dbh.inc.php';
    require_once './includes/functions.inc.php';

    echo '<p>Hello There '.$_SESSION['username'].'</p>';

    $logtimes= getLogTime($connect);
    $recipies= getRecipe($connect);
    

    ?>
        <section class='signup-form'>
        <h2>Enter login time</h2>
         <form action='includes/punch.inc.php' method='post'>
        <input type='text' name='punchin' placeholder='Enter Arrival time hh:mm:ss'>
        <input type='text' name='punchout' placeholder='Enter Departure time hh:mm:ss'>
        <button type="submit " name='submit'>Log In</button>
        </form>
        </section>
    <?php
    
    // $current_time = getServerTime(2);
    // $current_day = getServerTime(1);
    // $current_date = getServerTime(0);
    // echo "Current date and local time on this server is <br>";
    // echo $current_time. $current_date. $current_day;
    
    ?>
    <section class='wrapper'>
        <div class='wrapper'>
    <table>
         <h2>Hi <?php echo $_SESSION['username'] ?></h2>
         <h3>Those are your student's weekly log</h3>
         <tr>
            <th>User</th>
            <th>Arrival</th>
            <th>Departure</th>
            <th>Date</th>
        </tr>
        <tr>
        <?php
         foreach($logtimes as $logtime){
             echo '<tr><th>'.$logtime[3].'</th><th>'. $logtime[0].'</th><th>'. $logtime[1].'</th><th>'. $logtime[2].'</th></tr>';
            
         }?>
    </table>
        </div>
        <div class='wrapper'>
    <table>
         <h2>Hi <?php echo $_SESSION['username'] ?></h2>
         <h3>This is your weekly log</h3>
         <tr>
            <th>Arrival</th>
            <th>Departure</th>
            <th>Date</th>
        </tr>
         <?php
         foreach($logtimes as $logtime){
             echo '<tr><th>'. $logtime[0].'</th><th>'. $logtime[1].'</th><th>'. $logtime[2].'</th></tr>';
            
         }?>
    </table>


        </div>
        <h2>Recettes</h2>
    <div class="d-flex justify-content-center">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">auteur</th>
                    <th scope="col">Reçette</th>
                    <th scope="col">Date</th>
                    <th scope="col">Img</th>
                    <th scope="col">lien</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($recipies as $recipe){
                    echo '<tr><td>'. $recipe[4].'</td><td>'. $recipe[0].'</td><td>'. $recipe[1].'</td><td>'. $recipe[2].'</td><td>'. $recipe[3].'</td></td>';
                    
                }?>
            </tbody>
        </table>

    </div>
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary btn-lg">
            Edit recettes
        </button>
    </div>
    <div>
        <div class="presence">
            <label for="file">Attendences:</label>
            <progress id="file" max="100" value="90"> 90% </progress>
        </div>
    </div>




</body>

</html>
<?php
}

?>
