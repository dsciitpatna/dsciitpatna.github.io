<?php
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


    $addeventsuccess="";
    $addeventfailure="";
    if (isset($_POST['addevent'])) {
        $title= mysqli_real_escape_string($mysqli, $_POST['title']);
        $short_desc= mysqli_real_escape_string($mysqli, $_POST['short_desc']);
        $long_desc= mysqli_real_escape_string($mysqli, $_POST['long_desc']);
        $date= mysqli_real_escape_string($mysqli, $_POST['date']);
        $sql = "SELECT * FROM timeline WHERE title = '" . $title . "'";
        $res = $mysqli->query($sql);
        $res = mysqli_fetch_assoc($res);
        if($res) {
            $addeventfailure="Event already exists";
        } else {
            // create sql
            $sql = "INSERT INTO timeline(title,short_desc,long_desc,date) VALUES('$title','$short_desc','$long_desc','$date')";

            // save to db and check
            if(mysqli_query($mysqli, $sql)){
                $addeventsuccess="Event added";
            } else {
                $addeventfailure="Error";
            }
        }
    }
    $deleteeventsuccess="";
    $deleteeventfailure="";
    if (isset($_POST['deleteevent'])) {
        $id= mysqli_real_escape_string($mysqli, $_POST['id']);
        $sql = "SELECT * FROM timeline WHERE id = '" . $id . "'";
        $res = $mysqli->query($sql);
        $res = mysqli_fetch_assoc($res);
        if(!$res) {
            $deleteeventfailure="No data";
        } else {
            $sql = "DELETE FROM timeline WHERE id = '" . $id . "'";
            $ret = $mysqli->query($sql);
            if(!$ret) {
                $deleteeventfailure="Error";
            } else {
                $deleteeventsuccess="Deleted event record";
            }
        }
        
    }


    $addprojectsuccess="";
    $addprojectfailure="";
    if (isset($_POST['addproject'])) {
        $title= mysqli_real_escape_string($mysqli, $_POST['title']);
        $description= mysqli_real_escape_string($mysqli, $_POST['description']);
        $filter= mysqli_real_escape_string($mysqli, $_POST['filter']);
        $github_link= mysqli_real_escape_string($mysqli, $_POST['github_link']);
        $status= mysqli_real_escape_string($mysqli, $_POST['status']);
        $sql = "SELECT * FROM projects WHERE title = '" . $title . "'";
        $res = $mysqli->query($sql);
        $res = mysqli_fetch_assoc($res);
        if($res) {
            $addprojectfailure="Project already exists";
        } else {
            // create sql
            $sql = "INSERT INTO projects(title,description,filter,github_link, status) VALUES('$title','$description','$filter','$github_link', '$status')";

            // save to db and check
            if(mysqli_query($mysqli, $sql)){
                $addprojectsuccess="Project added";
            } else {
                $addprojectfailure="Error";
            }
        }
    }
    $deleteprojectsuccess="";
    $deleteprojectfailure="";
    if (isset($_POST['deleteproject'])) {
        $id= mysqli_real_escape_string($mysqli, $_POST['id']);
        $sql = "SELECT * FROM projects WHERE id = '" . $id . "'";
        $res = $mysqli->query($sql);
        $res = mysqli_fetch_assoc($res);
        if(!$res) {
            $deleteprojectfailure="No data";
        } else {
            $sql = "DELETE FROM projects WHERE id = '" . $id . "'";
            $ret = $mysqli->query($sql);
            if(!$ret) {
                $deleteprojectfailure="Error";
            } else {
                $deleteprojectsuccess="Deleted project record";
            }
        }
        
    }
    if (isset($_POST['updateproject'])) {
        $id= mysqli_real_escape_string($mysqli, $_POST['id']);
        $status= mysqli_real_escape_string($mysqli, $_POST['status']);
        $sql = "UPDATE projects SET status = '" . $status . "' WHERE id = '" . $id . "'";
        $ret = $mysqli->query($sql);        
    }


    $addbuddingprojectsuccess="";
    $addbuddingprojectfailure="";
    if (isset($_POST['addbuddingproject'])) {
        $title= mysqli_real_escape_string($mysqli, $_POST['title']);
        $description= mysqli_real_escape_string($mysqli, $_POST['description']);
        $filter= mysqli_real_escape_string($mysqli, $_POST['filter']);
        $sql = "SELECT * FROM buddingProjects WHERE title = '" . $title . "'";
        $res = $mysqli->query($sql);
        $res = mysqli_fetch_assoc($res);
        if($res) {
            $addbuddingprojectfailure="Budding Project already exists";
        } else {
            // create sql
            $sql = "INSERT INTO buddingProjects(title,description,filter) VALUES('$title','$description','$filter')";

            // save to db and check
            if(mysqli_query($mysqli, $sql)){
                $addbuddingprojectsuccess="Budding Project added";
            } else {
                $addbuddingprojectfailure="Error";
            }
        }
    }
    $deletebuddingprojectsuccess="";
    $deletebuddingprojectfailure="";
    if (isset($_POST['deletebuddingproject'])) {
        $id= mysqli_real_escape_string($mysqli, $_POST['id']);
        $sql = "SELECT * FROM buddingProjects WHERE id = '" . $id . "'";
        $res = $mysqli->query($sql);
        $res = mysqli_fetch_assoc($res);
        if(!$res) {
            $deletebuddingprojectfailure="No data";
        } else {
            $sql = "DELETE FROM buddingProjects WHERE id = '" . $id . "'";
            $ret = $mysqli->query($sql);
            if(!$ret) {
                $deletebuddingprojectfailure="Error";
            } else {
                $deletebuddingprojectsuccess="Deleted budding project record";
            }
        }
        
    }


    $deleteprojectideasuccess="";
    $deleteprojectideafailure="";
    if (isset($_POST['deleteprojectidea'])) {
        $id= mysqli_real_escape_string($mysqli, $_POST['id']);
        $sql = "DELETE FROM projectIdeas WHERE id = '" . $id . "'";
        $ret = $mysqli->query($sql);
        if(!$ret) {
            $deleteprojectideafailure="Error";
        } else {
            $deleteprojectideasuccess="Deleted project idea";
        }        
    }




    // Getting projects data

    $query = 'SELECT * FROM projects ORDER BY created_date DESC';
    $ress = mysqli_query($mysqli, $query);
    $projects = mysqli_fetch_all($ress, MYSQLI_ASSOC);

    $query = 'SELECT * FROM buddingProjects ORDER BY created_date DESC';
    $ress = mysqli_query($mysqli, $query);
    $buddingProjects = mysqli_fetch_all($ress, MYSQLI_ASSOC);

    $query = 'SELECT * FROM timeline ORDER BY date DESC';
    $ress = mysqli_query($mysqli, $query);
    $events = mysqli_fetch_all($ress, MYSQLI_ASSOC);

    $query = 'SELECT * FROM projectIdeas ORDER BY date DESC';
    $ress = mysqli_query($mysqli, $query);
    $projectIdeas = mysqli_fetch_all($ress, MYSQLI_ASSOC);

    mysqli_free_result($ress);
    mysqli_close($mysqli);

?>

<?php include('templates/header.php'); ?>

    <?php if(isset($_SESSION['email'])) { ?>

        <style>
            .nav{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .nav button{
                transform: skewX(-30deg);
                padding: 10px;
                margin: 5px 5px;
                border: none;
                outline: none;
                background: #0062ff;
                color: #fff;
                font-weight: bold;
                box-shadow: 0 5px 10px rgba(0,0,0,.5);
                transition: .3s;
            }
            .nav button:hover{
                transform: skewX(-25deg);
                background: #009f00;
                box-shadow: 0 5px 10px rgba(0,0,0,.8);
            }
            .nav button.active{
                background: #009f00;
                box-shadow: 0 5px 15px #fff;
            }
            #tabbed-content .panel{
                display: none;
            }
            #tabbed-content .panel.active{
                display: block;
            }
            .panel{
                border-radius: 10px;
                margin-top: 20px;
                box-shadow: 0 5px 20px #fff;
            }
        </style>

        <div class="container-fluid">
            <div id="tabbed-content">

                <div class="nav tabs">
                    <button data-target="#one" class="active">Leaderboard</button>
                    <button data-target="#two">Timeline</button>
                    <button data-target="#three">Projects</button>
                    <button data-target="#four">Budding Projects</button>
                    <button data-target="#five">Project Ideas</button>
                </div>
                <div class="container">
                    <form action="" method="POST" style="float: right">
                        <input type="submit" name="logout" value="Logout" class="btn btn-primary" />
                    </form>
                </div>  

                <!-- Id=1 -->
                <div class="panel active" id="one" style="clear: both">
                    <div class="container-fluid">  

                        <h2 class="text-center" >Get student info</h2>
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
                </div>



                <!-- Id=2 -->
                <div class="panel" id="two">
                    <div class="container-fluid">  

                        <h2 class="text-center">Add Event</h2>
                        <div class="container" style="max-width: 600px;">
                            <form class="shadow" action="" method="POST" style="padding : 50px">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" required />
                                </div>
                                <div class="form-group">
                                    <label for="rollno">Short Description</label>
                                    <input type="text" class="form-control" name="short_desc" required />
                                </div>
                                <div class="form-group">
                                    <label for="points">Long Description</label>
                                    <input type="text" class="form-control" name="long_desc" required />
                                </div>
                                <div class="form-group">
                                    <label for="points">Date (YYYY-MM-DD)</label>
                                    <input type="date" class="form-control" name="date" required />
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="addevent" class="btn btn-primary" />
                                </div>
                                <h5 class="text-success"><?php echo $addeventsuccess?></h5>
                                <h5 class="text-danger"><?php echo $addeventfailure?></h5>
                            </form>
                        </div>
                        <br><br>

                        <!-- Display all budding projects -->
                        <div class="container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($events as $event) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $event['id'] ?></th>
                                            <td><?php echo $event['title'] ?></td>
                                            <td><?php echo $event['date'] ?></td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $event['id']?>"/>
                                                    <button type="submit" name="deleteevent" class="btn btn-primary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                    </div>
                </div>


                <!-- Id=3 -->
                <div class="panel" id="three">
                    <div class="container-fluid">  

                        <h2 class="text-center">Add Project</h2>
                        <div class="container" style="max-width: 600px;">
                            <form class="shadow" action="" method="POST" style="padding : 50px">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" required />
                                </div>
                                <div class="form-group">
                                    <label for="filter">Filter</label>
                                    <select class="browser-default custom-select" name="filter">
                                        <option selected value="web">Web</option>
                                        <option value="app">App</option>
                                        <option value="ml">ML</option>
                                        <option value="block">Blockchain & Cryptocurrency</option>
                                        <option value="iot">IOT</option>
                                        <option value="cloud">Cloud</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Short Description</label>
                                    <input type="text" class="form-control" name="description" required />
                                </div>
                                <div class="form-group">
                                    <label for="github_link">Github Link</label>
                                    <input type="text" class="form-control" name="github_link" required />
                                </div>
                                <div class="form-group">
                                    <label for="filter">Status (Ongoing or Completed)</label>
                                    <select class="browser-default custom-select" name="status">
                                        <option selected value=0>Ongoing</option>
                                        <option value=1>Completed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="addproject" class="btn btn-primary" />
                                </div>
                                <h5 class="text-success"><?php echo $addprojectsuccess?></h5>
                                <h5 class="text-danger"><?php echo $addprojectfailure?></h5>
                            </form>
                        </div>
                        <br><br>

                        <!-- Display all projects -->
                        <div class="container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Filter</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Update Status</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($projects as $project) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $project['id'] ?></th>
                                            <td><?php echo $project['title'] ?></td>
                                            <td><?php echo $project['filter'] ?></td>
                                            <td>
                                                <?php if($project['status']) { ?>
                                                    <span class="text-success">Completed</span>
                                                <?php } else { ?>
                                                    <span class="text-danger">Ongoing</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $project['id']?>"/>
                                                    <div class="form-group">
                                                        <label for="filter">Status (Ongoing or Completed)</label>
                                                        <select class="browser-default custom-select" name="status">
                                                            <option selected value=0>Ongoing</option>
                                                            <option value=1>Completed</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="updateproject" class="btn btn-primary" />
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $project['id']?>"/>
                                                    <button type="submit" name="deleteproject" class="btn btn-primary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                    </div>
                </div>

                <!-- Id=4 -->
                <div class="panel" id="four">
                    <div class="container-fluid">  

                        <h2 class="text-center">Add Budding Project</h2>
                        <div class="container" style="max-width: 600px;">
                            <form class="shadow" action="" method="POST" style="padding : 50px">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" required />
                                </div>
                                <div class="form-group">
                                    <label for="filter">Filter</label>
                                    <select class="browser-default custom-select" name="filter">
                                        <option selected value="web">Web</option>
                                        <option value="app">App</option>
                                        <option value="ml">ML</option>
                                        <option value="block">Blockchain & Cryptocurrency</option>
                                        <option value="iot">IOT</option>
                                        <option value="cloud">Cloud</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Short Description</label>
                                    <input type="text" class="form-control" name="description" required />
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="addbuddingproject" class="btn btn-primary" />
                                </div>
                                <h5 class="text-success"><?php echo $addbuddingprojectsuccess?></h5>
                                <h5 class="text-danger"><?php echo $addbuddingprojectfailure?></h5>
                            </form>
                        </div>
                        <br><br>

                        <!-- Display all budding projects -->
                        <div class="container">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Filter</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($buddingProjects as $buddingProject) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $buddingProject['id'] ?></th>
                                            <td><?php echo $buddingProject['title'] ?></td>
                                            <td><?php echo $buddingProject['filter'] ?></td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $buddingProject['id']?>"/>
                                                    <button type="submit" name="deletebuddingproject" class="btn btn-primary">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                    </div>
                </div>

                <!-- Id=5 -->
                <div class="panel" id="five">
                    <br><br>
                    <div class="container-fluid">  
                        <!-- Display all projects -->
                        <div class="container">
                            <h5 class="text-success"><?php echo $deleteprojectideasuccess?></h5>
                            <h5 class="text-danger"><?php echo $deleteprojectideafailure?></h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Delete Idea</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($projectIdeas as $projectIdea) : ?>
                                        <tr>
                                            <th scope="row"><?php echo $projectIdea['name'] ?></th>
                                            <th scope="row">
                                                <a href="mailto:<?php echo $projectIdea['email'] ?>">
                                                <?php echo $projectIdea['email'] ?>
                                                </a>
                                            </th>
                                            <td><?php echo $projectIdea['organization'] ?></td>
                                            <td><?php echo $projectIdea['title'] ?></td>
                                            <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $projectIdea['id']?>"/>
                                                <button type="submit" name="deleteprojectidea" class="btn btn-primary">Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <br><br>
                    </div>
                </div>

            </div>
        </div>
                        
    <?php } else { ?>
        <div class="container">
            <h3 class="text-danger text-center">Unauthorized Admin</h3>
        </div>
    <?php } ?>

<?php include('templates/footer.php'); ?>