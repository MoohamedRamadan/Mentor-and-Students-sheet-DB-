<?php

    $con = new mysqli("localhost","root","","acm");

    if(isset($_POST["update"]))
    {
        $old = $_POST["old"];
        $new = $_POST["new"];

        $query = "SELECT * from `students` where `handel` = '$old'";
        $check =  $con->query($query);

        if($check)
        {
            if (mysqli_num_rows($check) == 0)
            {
                echo '<script type="text/javascript">alert("Handle does not exist")</script>';
                die();
            }
            else
            {
                $query1 = "SELECT * from `students` where `handel` = '$new'";
                $check1 =  $con->query($query1);
                if($check1)
                {
                    if (mysqli_num_rows($check1) > 0)
                    {
                        echo '<script type="text/javascript">alert("Handle already taken")</script>';
                        die();
                    }
                    else
                    {
                        $queryr = "UPDATE `students` SET `handel` = '$new' where `handel` = '$old'";
                        $query_run = mysqli_query($con, $queryr);
                        
                        if($query_run)
                        {
                            echo '<script type="text/javascript">alert("Handle updated successfully")</script>';
                        }
                    }       
                }
            }
        }
    }
?>