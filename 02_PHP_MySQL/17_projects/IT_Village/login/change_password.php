<?php
$error = "";
include '../includes/db_connect.php';
include '../includes/header.php';

if ($_SESSION['loggedin'] != true) {
  header("Location: login.php");
}

if (isset($_SESSION['user_errors'])) {
    ?>
    <p class="alert alert-danger"><?= $_SESSION['user_errors']?></p>
    <?php
    unset($_SESSION['user_errors']);
}
?>
<!-- Change password -->
<div class="container">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="nav">
        <a class="navbar-brand" href="profile.php">
        <img id="img" src="../img/picture_background.jpg" alt="Go back to your profile" style="width: 350px;"></a>
        <div class="container">
        <h4 class="text-warning">Ch@nge p@ssword</h4>
            <form action="#" method="Post">
                <div class="form-group">
                    <label class="text-warning" for="pwd">* Password:</label>
                    <input class="form-control" type="password" id="pwd" name="pwd" placeholder="Your password">
                </div>
                <div class="form-group">
                    <label class="text-warning" for="new_pwd">* New password:</label>
                    <input class="form-control" type="password" id="new_pwd" name="new_pwd" placeholder="Your new password">
                </div>
                <div class="form-group">
                    <label class="text-warning" for="rep_new_pwd">* Repeat password:</label>
                    <input type="password" class="form-control" id="rep_new_pwd" name="rep_new_pwd" placeholder="Repeat your new password">
                </div>
                <input class="btn btn-primary" type="submit" name="submit" id="change_password" value="Change password">
            </form>
        </div>
    </nav>
</div>

<?php
if( isset($_POST['submit'])){
    if(!empty($_POST['pwd']) && !empty($_POST['new_pwd']) && !empty($_POST['rep_new_pwd'])) {
        $old_password = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
        $new_password = filter_var($_POST['new_pwd'], FILTER_SANITIZE_STRING);
        $rep_new_password = filter_var($_POST['rep_new_pwd'], FILTER_SANITIZE_STRING);
    } 
    else{
        $_SESSION['user_errors'] = "Please fill all fields";
        exit(header("Location: change_password.php"));
    }

    $read_query = "SELECT password FROM passwords WHERE user_id = '".$_SESSION['user_id']."' LIMIT 1 ";
    $result = mysqli_query($conn, $read_query);

    $db_password_arr = mysqli_fetch_assoc($result);
    $db_password = $db_password_arr['password'];

    if($db_password != md5($old_password)) {
        $_SESSION['user_errors'] = "Your password does not match!";
        exit(header("Location: change_password.php"));
    }

    if($new_password == $rep_new_password) {
        $db_password_new = md5($new_password);
    } else {
        $_SESSION['user_errors'] = "New password does not match!";
        exit(header("Location: change_password.php"));
    }

    $update = "UPDATE `passwords` SET `password`='".$db_password_new."' WHERE user_id = '".$_SESSION['user_id']."'";
    $result_update = mysqli_query($conn, $update);

    if($result_update) {
        header("Location: profile.php");
    }
}
include '../includes/footer.php';
