<?php
// Importing database connection
require("./config/db.php");

$error = 0;

if(isset($_GET['token'])) {
    //Starting a session to get the token
    $sql = "SELECT timestamp FROM admins WHERE token  = '" . $_GET['token'] . "'";
    $ret = $mysqli->query($sql);
    $ret = mysqli_fetch_assoc($ret);
    $delta = 172800;
    $timestamp = $ret["timestamp"];
    $time = $_SERVER['REQUEST_TIME'] - $timestamp;
    if ($time < $delta) {
        // Checking if Password is Entered
        if (isset($_POST["create-password"])) {
            // Hashing the password
            $password = sha1($_POST["passwordini"]);

            // Making query to set the hashed password according to token
            $sql = "UPDATE admins SET password = '" . $password . "' WHERE token = '" . $_GET['token'] . "'";
            $ret = $mysqli->query($sql);

            // Redirecting to login page again
            header("Location: adminlogin.php");
        }
    } else {

        $error = 1;
    }
}else {

    $error = 1;
}



?>
<?php require("./templates/header.php"); ?>
<?php if (!$error) : ?>
    <div class="container" style="max-width: 600px; margin-top: 50px">
        <form class="shadow" action="" method="POST" style="padding : 50px">
            <div class="form-group">
                <label for="password">Create your password</label>
                <input type="password" class="form-control" name="passwordini" required />
            </div>
            <div class="form-group">
                <input type="submit" name="create-password" class="btn btn-primary" />
            </div>
        </form>
    </div>
<?php else : ?>
    <h1 class="text-danger text-center">Link Expired</h1>
<?php endif; ?>
<?php require("./templates/footer.php");
?>