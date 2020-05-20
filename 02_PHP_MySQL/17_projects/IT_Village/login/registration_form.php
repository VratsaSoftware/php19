<?php
include '../includes/db_connect.php';
include '../includes/header.php';
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] ==  true) {
        header("Location: profile.php");
    }
}

if (isset($_SESSION['user_errors'])) {
    ?>
    <p class="alert alert-danger"><?= $_SESSION['user_errors']?></p>
    <?php
    unset($_SESSION['user_errors']);
}
?>
<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
        <a href="../index.php">
            <img id="img" src="../img/logo_1.jpg" alt="logo" class="rounded" style="width: 200px; margin: 10px;">
        </a>
        <div class="container">
            <h4 class="text-warning">Cre@te an @ccount in IT Vill@ge</h4>
            <form action="#" method="Post">
                <div class="form-group">
                    <label class="text-warning" for="name">* IT Village user:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your user name" name="name">
                </div>
                <div class="form-group">
                    <label class="text-warning" for="email"> * Em@il:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your em@il" name="email">
                </div>
                <div class="form-group">
                    <label class="text-warning" for="pwd">* Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="pswd">
                </div>
                <div class="form-group">
                    <label class="text-warning" for="rep_pwd">* Repeat your password:</label>
                    <input type="password" class="form-control" id="rep_pwd" placeholder="Repeat your password" name="rep_pswd">
                </div>
                <input type="submit" name="submit" class="btn btn-primary" id="registration_form" value="Create account">
            </form>
        </div>
    </nav>
</div>
<?php
if( isset($_POST ['submit'])){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && is_string($_POST['name']) && isset($_POST['pswd']) && isset($_POST['rep_pswd'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $error = false;
    } else {
        $error = true;
        $_SESSION['user_errors'] = "Please fill all fields!!!";
        exit(header("Location: registration_form.php"));
    }
    if($_POST['pswd'] == $_POST['rep_pswd']){
        $password = filter_var($_POST['pswd'], FILTER_SANITIZE_STRING);
        $error = false;
    }else {
        $error = true;
        $_SESSION['user_errors'] = "Passwords doen't match!!!";
        exit(header("Location: registration_form.php"));
    }
       // Check if email already exists in DB 
    $query = "SELECT `email` FROM `users` WHERE `email` = '".mysqli_real_escape_string($conn, $email)."'";
    $result = mysqli_query($conn, $query);

    $email_exist_arr = mysqli_fetch_assoc($result);

    if ($email_exist_arr['email'] != NULL) {
        $_SESSION['user_errors'] = "Email already exist!!!";
        exit(header("Location: registration_form.php"));
    }else{
        $email_exist = false;
    }
    // Check if have anothe ruser with this username
    $query = "SELECT `username` FROM `users` WHERE `username` = '".mysqli_real_escape_string($conn, $name)."'";
    $result = mysqli_query($conn, $query);

    $username_exist_arr = mysqli_fetch_assoc($result);

    if ($username_exist_arr['username'] != NULL) {
        $_SESSION['user_errors'] = "Username already exist!!!";
        exit(header("Location: registration_form.php"));
    }else{
        $username_exist = false;
    }
    // Check if hav eno errors and add th euser account info in DB
    if ($error == false && $email_exist == false && $username_exist == false) {
        
    
        $query = "INSERT INTO `users`(`username`, `email`, `role_id`, `date_registered`) VALUES ('".mysqli_real_escape_string($conn, $name)."', '".mysqli_real_escape_string($conn, $email)."', 2, NOW())";

        $user_result = mysqli_query($conn, $query);

        $query = "SELECT user_id FROM users WHERE username = '".mysqli_real_escape_string($conn, $name)."'LIMIT 1";

        $result = mysqli_query($conn, $query);

        $user_id_arr = mysqli_fetch_assoc($result);
        $user_id = $user_id_arr['user_id'];

        $password_secure = mysqli_real_escape_string($conn, $password);
        $password_hashed = md5($password_secure);

        $password_query = "INSERT INTO `passwords`(`user_id`, `password`) VALUES ('".$user_id."','". $password_hashed ."')"; 
        $password_result = mysqli_query($conn, $password_query);
        //insert data in result db table
        $query = "INSERT INTO `results`(`user_id`) VALUES ('".$user_id."')";

        $result = mysqli_query($conn, $query);
        // If everything is OK redirect the user to the login page
        if ($user_result == true && $password_result == true && $result == true) {
            header("Location: login.php");  
        }
    }
}

include '../includes/footer.php';