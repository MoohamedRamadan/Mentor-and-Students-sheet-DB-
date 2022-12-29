<?php

    // database connection code
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

    $con = new mysqli('localhost', 'root', '','acm');

    if($_POST["handle"]){

        if(preg_match("/[^A-Za-z '-]/",$_POST["handle"])){
            die("Error<br>Username should be only alpha");
        }
    }


    // get the post records
    $handle = $_POST['handle'];
    $level = $_POST['level'];
    $problems = $_POST['problems'];
    $mentor = $_POST['mentor'];


    // check if handle exist or not
    $query = "SELECT * from `students` where `handel` = '$handle'";
    $check =  $con->query($query);

    $query2 = "SELECT * from `mentors` where `mentor_id` = '$mentor'";
    $check2 =  $con->query($query2);

    if($check || $check2)
    {
        if (mysqli_num_rows($check) > 0){
            echo '<script type="text/javascript">alert("Handle already taken")</script>';
            die();
        }
        else if (mysqli_num_rows($check2) == 0){
            echo '<script type="text/javascript">alert("Mentor not found")</script>';
            die();
        }
        else
        {
            // database insert SQL code
            
            $sql = "INSERT INTO `students` (`handel`,`level`,`problems`,`points`,`mentor_id`) VALUES ('$handle', '$level', '$problems',total('$problems'),'$mentor')";

            // insert in database 
            $rs = mysqli_query($con, $sql);

            echo '<script type="text/javascript">alert("Your registration is complete")</script>';
        }
    }
?>
