<?php
include '../includes/db_connect.php';
include '../includes/header.php';
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] ==  true) {
        header("Location: profile.php");
    }
}
?>

<!-- Login form -->
<div class="container">
    <?php
    if (isset($_SESSION['user_errors'])) {
        ?>
        <p class="alert alert-danger"><?= $_SESSION['user_errors'] ?></p>
        <?php
        unset($_SESSION['user_errors']);
    }
    ?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
        <a class="navbar-brand" href="../index.php">
        <img id="img" src="../img/logo_1.jpg" alt="logo" style="width: 150px;"></a>
        <div class="container">
            <h4 class="text-warning">JOIN to g@me IT Vill@ge</h4>
            <form action="#" method="post">
                <div class="form-group">
                    <label class="text-warning" for="email">Email*:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label class="text-warning" for="pwd">Password*:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                </div>
                <input type="submit" name="submit" class="btn btn-danger" id="login" value="JOIN to game">
            </form>
        </div>
    </nav>
</div>

<?php
$loggedin = NULL;
if( isset($_POST['submit'])){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['pswd'])) {
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['pswd'], FILTER_SANITIZE_STRING);
    }else{
        $_SESSION['user_errors'] = "Try again later!";
        die(header("Location: login.php"));
    }

    $query = "SELECT `email`, `username`, users.user_id, `password` FROM `users` JOIN passwords ON users.user_id = passwords.user_id WHERE `email` = '".mysqli_real_escape_string($conn, $email)."' LIMIT 1 ";

    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)){
        $user_id_db = $row['user_id'];
        $password_db = $row['password'];
        $acount = $row['username'];
        $email_db = $row['email'];
    }
    if($email_db == $email) {
        $corect_email = TRUE;
    } else {
        $corect_email = FALSE;
        $_SESSION['user_errors'] = "Account doesn't exist!!!";
        exit(header("Location: login.php"));
    }
    if(md5($password) == $password_db) {
        $corect_password = TRUE;
    }
    else {
        $corect_password = FALSE;
        $_SESSION['user_errors'] = "Password doen't match";
        header("Location: login.php");
    }
    if($corect_email == TRUE && $corect_password == TRUE){  
        $_SESSION["loggedin"] = true;
        $_SESSION["user_id"] = $user_id_db;
        $_SESSION["username"] = $acount;
        header("Location: profile.php"); 
    }
}

include '../includes/footer.php';