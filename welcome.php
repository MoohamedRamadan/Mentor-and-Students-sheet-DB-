<?php

    // database connection code
    // $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

    $con = mysqli_connect('localhost', 'root', '','adb_task');

    if(empty($_POST["username"])||empty($_POST["email"])||empty($_POST["pass1"])||empty($_POST["pass2"])||empty($_POST["phone"])||empty($_POST["country"])||empty($_POST["gender"])){
        die("Error<br>There is missing value please fill all fields to complete your registration");   
      }

    if($_POST["username"]){

        if(preg_match("/[^A-Za-z '-]/",$_POST["username"])){
            die("Error<br>Username should be only alpha");
        }
    }
    if($_POST['pass1'] != $_POST["pass2"]){
        
        die("Error<br>Password and Confirm Password should be matched");
    }


    // get the post records
    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Password = $_POST['pass1'];
    $Phone = $_POST['phone'];
    $Country = $_POST['country'];
    $Gender = $_POST['gender'];


    // database insert SQL code
    $sql = "INSERT INTO `user_data` VALUES ('0', '$Username', '$Email', '$Password','$Phone','$Country','$Gender')";

    // insert in database 
    $rs = mysqli_query($con, $sql);

    if($_POST['gender'] == "Male"){
        echo "Welcome Mr. ". $_POST['username']. " ". "<br />";
    }
    else if ($_POST['gender'] == "Female"){
        echo "Welcome Mrs. ". $_POST['username']. " ". "<br />";
    }
    echo "Your email is ". $_POST['email']. "<br />";
    echo "Your registration is completed";

    exit();

?>
