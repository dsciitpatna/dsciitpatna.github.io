<?php
	require('config/config.php');
    require('config/db.php');
    session_start();

    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        session_abort();
        header("Location: index.php");
    }

    $result=array();
    $result['points']=NULL;
    $result['rollno']=NULL;
    $result['name']=NULL;
    $nodata="";
    if (isset($_POST['getpoints'])) {
        $rollno= mysqli_real_escape_string($mysqli, $_POST['rollno']);
        $sql = "SELECT * FROM leaderboard WHERE rollno = '" . $rollno . "'";
        $result = $mysqli->query($sql);
        $result = mysqli_fetch_assoc($result);
        if(!$result) {
            $nodata="No result found";
        }
    }

    $updatesuccess="";
    $updatefailure="";
    if (isset($_POST['updatepoints'])) {
        $rollno= mysqli_real_escape_string($mysqli, $_POST['rollno']);
        $points= mysqli_real_escape_string($mysqli, $_POST['points']);
        $sql = "SELECT * FROM leaderboard WHERE rollno = '" . $rollno . "'";
        $result = $mysqli->query($sql);
        $result = mysqli_fetch_assoc($result);
        if(!$result) {
            $updatefailure="No result found";
        } else {
            $sql = "UPDATE leaderboard SET points = '" . $points . "' WHERE rollno = '" . $rollno . "'";
            $ret = $mysqli->query($sql);
            if(!$ret) {
                $updatefailure="Error";
            }
            else{
                $updatesuccess="Updated";
            }
        }
        
    }

    $addsuccess="";
    $addfailure="";
    if (isset($_POST['adduser'])) {
        $name= mysqli_real_escape_string($mysqli, $_POST['name']);
        $rollno= mysqli_real_escape_string($mysqli, $_POST['rollno']);
        $points= mysqli_real_escape_string($mysqli, $_POST['points']);
        $sql = "SELECT * FROM leaderboard WHERE rollno = '" . $rollno . "'";
        $result = $mysqli->query($sql);
        $result = mysqli_fetch_assoc($result);
        if($result) {
            $addfailure="Student already exists";
        } else {
            $sql = "UPDATE leaderboard SET points = '" . $points . "' WHERE rollno = '" . $rollno . "'";
            $ret = $mysqli->query($sql);
            if(!$ret) {
                $failure="Error";
            }
            else{
                // create sql
                $sql = "INSERT INTO leaderboard(name,rollno,points) VALUES('$name','$rollno','$points')";

                // save to db and check
                if(mysqli_query($mysqli, $sql)){
                    $addsuccess="Student added";
                } else {
                    $addfailure="Error";
                }
            }
        }
        
    }

    $deletesuccess="";
    $deletefailure="";
    if (isset($_POST['deleteuser'])) {
        $rollno= mysqli_real_escape_string($mysqli, $_POST['rollno']);
        $sql = "SELECT * FROM leaderboard WHERE rollno = '" . $rollno . "'";
        $result = $mysqli->query($sql);
        $result = mysqli_fetch_assoc($result);
        if(!$result) {
            $deletefailure="No data";
        } else {
            $sql = "DELETE FROM leaderboard WHERE rollno = '" . $rollno . "'";
            $ret = $mysqli->query($sql);
            if(!$ret) {
                $deletefailure="Error";
            } else {
                $deletesuccess="Deleted student record";
            }
        }
        
    }

?>

<?php include('templates/header.php'); ?>

    <?php if(isset($_SESSION['email'])) { ?>
        
        <div class="container-fluid">
            <br>
            <div class="container">
                <form action="" method="POST" style="float: right">
                    <input type="submit" name="logout" value="Logout" class="btn btn-primary" />
                </form>
            </div>    

            <h2 class="text-center" style="clear: both">Get student info</h2>
            <div class="container" style="max-width: 600px;">
                <form class="shadow" action="" method="POST" style="padding : 50px">
                    <div class="form-group">
                        <label for="rollno">Enter Roll no of student to get current points</label>
                        <input type="text" class="form-control" name="rollno" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="getpoints" class="btn btn-primary" />
                    </div>
                    <?php if($result['rollno']) { ?>
                        <hr>
                        <h5>Roll No: <?php echo $result['rollno']; ?></h5>
                        <h5>Name: <?php echo $result['name']; ?></h5>
                        <h5>Points: <?php echo $result['points']; ?></h5>
                    <?php } else {?>
                        <h5 class="text-danger"><?php echo $nodata;?></h5>
                    <?php } ?>
                </form>
            </div>
            <br><br>
            <h2 class="text-center">Update student's points</h2>
            <div class="container" style="max-width: 600px;">
                <form class="shadow" action="" method="POST" style="padding : 50px">
                    <div class="form-group">
                        <label for="rollno">Roll no of student</label>
                        <input type="text" class="form-control" name="rollno" value="<?php echo $result['rollno'] ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="points">Update Points of student</label>
                        <input type="text" class="form-control" name="points" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="updatepoints" class="btn btn-primary" />
                    </div>
                    <h5 class="text-success"><?php echo $updatesuccess?></h5>
                    <h5 class="text-danger"><?php echo $updatefailure?></h5>
                </form>
            </div>
            <br><br>
            <h2 class="text-center">Add student info</h2>
            <div class="container" style="max-width: 600px;">
                <form class="shadow" action="" method="POST" style="padding : 50px">
                    <div class="form-group">
                        <label for="name">Name of student</label>
                        <input type="text" class="form-control" name="name" required />
                    </div>
                    <div class="form-group">
                        <label for="rollno">Roll no of student</label>
                        <input type="text" class="form-control" name="rollno" required />
                    </div>
                    <div class="form-group">
                        <label for="points">Points of student</label>
                        <input type="text" class="form-control" name="points" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="adduser" class="btn btn-primary" />
                    </div>
                    <h5 class="text-success"><?php echo $addsuccess?></h5>
                    <h5 class="text-danger"><?php echo $addfailure?></h5>
                </form>
            </div>
            <br><br>
            <h2 class="text-center">Delete student info</h2>
            <div class="container" style="max-width: 600px;">
                <form class="shadow" action="" method="POST" style="padding : 50px">
                    <div class="form-group">
                        <label for="rollno">Roll no of student</label>
                        <input type="text" class="form-control" name="rollno" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="deleteuser" class="btn btn-primary" />
                    </div>
                    <h5 class="text-success"><?php echo $deletesuccess?></h5>
                    <h5 class="text-danger"><?php echo $deletefailure?></h5>
                </form>
            </div>
            <br><br>
        </div>
    <?php } else { ?>
        <div class="container">
            <h3 class="text-danger text-center">Unauthorized Admin</h3>
        </div>
    <?php } ?>
<?php include('templates/footer.php'); ?>