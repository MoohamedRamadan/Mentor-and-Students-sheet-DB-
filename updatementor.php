<?php

    $con = new mysqli("localhost","root","","acm");

    if(isset($_POST["update"]))
    {
        $old = $_POST["old"];
        $new = $_POST["new"];

        $query = "SELECT * from `mentors` where `mentor_id` = '$old'";
        $check =  $con->query($query);

        if($check)
        {
            if (mysqli_num_rows($check) == 0)
            {
                echo '<script type="text/javascript">alert("ID does not exist")</script>';
                die();
            }
            else
            {
                $query1 = "SELECT * from `mentors` where `mentor_id` = '$new'";
                $check1 =  $con->query($query1);
                if($check1)
                {
                    if (mysqli_num_rows($check1) == 0)
                    {
                        echo '<script type="text/javascript">alert("ID does not exist")</script>';
                        die();
                    }
                    else
                    {
                        $queryr = "UPDATE `students` SET `mentor_id` = '$new' where `mentor_id` in (SELECT `mentor_id` from `mentors` where `mentor_id` = '$old')";
                        $query_run = mysqli_query($con, $queryr);
                        
                        if($query_run)
                        {
                            echo '<script type="text/javascript">alert("ID updated successfully")</script>';
                        }
                    }       
                }
            }
        }
    }
?>