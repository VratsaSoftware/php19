<?php
    include 'includes/header.php';

?>
    <main class="container">
      <div class="row" style="margin: auto !important; width: 50% !important;">
        <?php 
        if (isset($_SESSION['loggedin'])) {
          ?>
            <a class="btn btn-danger" id="login" href="login/profile.php">Profile</a>
          <?php
        }else{
        ?>
          <a class="btn btn-danger" id="login" href="login/login.php" style="margin: 10px; text-align: center">Login</a>
          <a class="btn btn-primary" id="registration_form" href="login/registration_form.php" style="margin: 10px; text-align: center">Registration</a>
        <?php } ?>
      </div>
   
        <section id="index_content" class="p-3 my-3 bg-dark text-white">
            <h3><strong>Welcome to the favorite developer board game</strong></h3>
            <div style="column-count: 1;">
            <img style="width:52%;" src="img/picture_background.jpg" class="img-responsive rounded-circle" id="img_first_page" alt="background" id="img"> 
                <p>Every Friday night a group of super-cool programmers gather to play their favorite boarding game- &bdquo; IT Village &rdquo;. They are so tired of coding during the week that they continually forget the rules of the program. It is also very difficult to work with paper and throw dice and take a very important decision-the game should be developed and turned into a computer game.
                It is a well-known fact that the programstites are lazy people. They started programming the new game, but stopped.</p> 
                <p><b>Rules:</b></p>
                <p>Each game player starts with 50 coins. The game is over when you finish the coins, buy all the motels, no more moves or step N field.</p>
                <p><b>Fields:</b></p>
                <ul>
                	<li><span style=" color: #340F70; ">P</span>  -  WI-FI - bar ( loss 5 coins)</li>
                	<li><span style=" color: #340F70; ">I</span>  -  WI-FI - motel</li>
                	<li><span style=" color: #340F70; ">F</span>  -  Freelance project ( win 20 coins)</li>
                	<li><span style=" color: #340F70; ">S</span>  -  Storm ( loss 2 turns)</li>
                	<li><span style=" color: #340F70; ">V</span>  -  Super PHP ( multiply your coins by 10)</li>
                	<li><span style=" color: #340F70; ">N</span>  -  VratsaSoftwareSchool (Automaticaly win the game)</li>
                </ul>
          </div>
        </section>
    </main>
<?php
include 'includes/footer.php';
?>
