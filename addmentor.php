<?php

    // database connection code
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

    $con = new mysqli('localhost', 'root', '','acm');

    if($_POST["name"]){

        if(preg_match("/[^A-Za-z '-]/",$_POST["name"])){
            die("Error<br>Name should be only alpha");
        }
    }


    // get the post records
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // check if handle exist or not
    $query = "SELECT * from `mentors` where `email` = '$email'";
    $check =  $con->query($query);

    if($check)
    {
        if (mysqli_num_rows($check) > 0){
            echo '<script type="text/javascript">alert("Email already taken")</script>';
            die();
        }
        else
        {
            // database insert SQL code
            $sql = "INSERT INTO `mentors` (`name`,`email`,`phone`) VALUES ('$name', '$email','$phone')";

            // insert in database 
            $rs = mysqli_query($con, $sql);

            echo '<script type="text/javascript">alert("Your registration is complete")</script>';
        }
    }
?>
