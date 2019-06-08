<?php

// Enabling Database Connection
require("./config/db.php");
require("./config/config.php");

$email = $password = '';
$errors = array('email' => '', 'reset-email' => '', 'noData' => '', 'resetPassword' => '', 'resetPwdMailInfo' => '');

// Reset password php for admins only
if (isset($_POST['reset-pwd'])) {
    $resetemail=$_POST['reset-email'];

    if (!filter_var($resetemail, FILTER_VALIDATE_EMAIL)) {
        $errors['reset-email']= "Enter correct email";
        $errors['noData']="";
        $errors['resetPassword']="";
        $errors['resetPwdMailInfo'] = "";
    } else {
        // Make sql query to database
        $sql = "SELECT * FROM admins WHERE email = '" . $resetemail . "'";
        $result = $mysqli->query($sql);
        $result = mysqli_fetch_assoc($result);
        // If email found create a token and send an mail to the email containing a random link to change password
        if ($mysqli->affected_rows > 0) {
            $timestamp = $_SERVER['REQUEST_TIME'];
            $token  = sha1(uniqid($username, true));
            $sql = "UPDATE admins SET token = '" . $token . "',timestamp = '" . $timestamp . "' WHERE email = '" . $resetemail . "'";
            $result = $mysqli->query($sql);
            $url = ROOT_URL."linkpage.php?token=$token";
            // Send the mail

            $to=$resetemail;
            $from="From: ashyadavash@gmail.com";
            $subject  = 'Change Password Link';
            $message= "Change the passworrd by clickin gon this link $url";


            $ret = mail($to, $subject, $message, $from);
                if ($ret) {
                    $errors['resetPwdMailInfo']=1;
                } else {
                    $errors['resetPwdMailInfo']=0;
                }
        }
        //If email not found return an error message
        else {
            $errors['reset-email']= "No data found";
            $errors['noData']="";
            $errors['resetPassword']="";
            $errors['resetPwdMailInfo'] = "";
        }
    }
}

// Login php for admins only
if (isset($_POST["submit-button"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Perform email check
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Wrong email";
        $errors['noData']="";
        $errors['resetPassword']="";
        $errors['resetPwdMailInfo'] = "";

    } else {
        // Making SQL query to the database

        $sql = "SELECT password FROM admins WHERE email = '" . $_POST['email'] . " '";
        $res = $mysqli->query($sql);

        // Checking if any row exists with given email

        if ($res->num_rows > 0) {
            $row = mysqli_fetch_assoc($res);

            // New User If Password is NULL
            if ($row["password"] == NULL) {
                $errors['resetPassword']="Reset your password by clicking the button below";
                $errors['email'] = "";
                $errors['noData']="";
                $errors['resetPwdMailInfo'] = "";
            } else {

                // Hashing the password
               $password = sha1($_POST["password"]);


                // Allowing login and redirecting to main page
                if ($row['password'] == $password) {
                    session_start();
                    $_SESSION["email"] = $email;
                    header("Location: ./admin.php");
                } else {
                    $errors['noData']="Invalid id/password match";
                    $errors['email'] = "";
                    $errors['resetPassword']="";
                    $errors['resetPwdMailInfo'] = "";
                }
            }
        } else {
            $errors['noData'] = "No admin record found for this email";
            $errors['email'] = "";
            $errors['resetPassword']="";
            $errors['resetPwdMailInfo'] = "";
        }
    }
}

?>




<?php require("./templates/header.php"); ?>

<?php if ($errors['resetPwdMailInfo'] === 1 ){ ?>
    <div class='text-center'><i class='fas fa-check-circle'></i><h5>Reset password-link mail sent</h5></div>
    <?php }else if($errors['resetPwdMailInfo'] === 0){ ?>
    <div class='text-center'><i class='fas fa-times-circle'></i><h5>Error mail not sent</h5></div>
<?php } ?>

<div class="container shadow p-5 mb-5">

    <div class="text-danger"><h5 class="text-center"><?php echo $errors['noData']; ?></h5></div>
    <div class="text-danger"><h6 class="text-center"><?php echo $errors['resetPassword'];?></h6></div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="identification">
                Email :
            </label>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo htmlspecialchars($email) ?>" required />
            <div class="text-danger"><?php echo $errors['email']; ?></div>
        </div>
        <div class="form-group">
            <label for="password">
                Password :
            </label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required />
        </div>
        <div class="form-group">
            <input type="submit" name="submit-button" class="btn btn-primary" />
        </div>
    </form>

    
    <!-- Reset password modal for admins only -->
    <button type="button" class="btn btn-info btn-lg reset-password-btn" data-toggle="modal" data-target="#myModal">Reset Password</button>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <form action="adminlogin.php" method="POST">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <form action="student-login.php" method="POST">
                        <div class="modal-header">
                            <h4 class="modal-title">Reset Password Form</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="email" class="form-control" name="reset-email" placeholder="Enter email" required />
                                <div class="text-danger"><?php echo $errors['reset-email']; ?></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="reset-pwd" class="btn btn-primary" value="Submit" />
                        </div>
                    </form>
                </div>

            </div>
        </form>
    </div>
    
</div>


<?php require("./templates/footer.php");