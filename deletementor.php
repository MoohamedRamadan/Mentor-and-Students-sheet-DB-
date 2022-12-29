<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Welcome to my page">
        <link rel="stylesheet" href="Css/deleteuser.css">
        <title>Delete Page</title>
    </head>

    <body>
        <div class="father">
            
            <form action="" method="POST">

                <fieldset>

                    <legend>Delete Mentor</legend>

                    <input class="txt" type="number" placeholder="ID" name="find" required>
                    <div class="move">
                        <input class="sub" type="submit" value="Delete" name="delete">
                    </div>

                    <div class="move2">
                        <a href="delete.html">Back</a>
                     </div>

                </fieldset>

            </form>

        </div>
        
    </body>

</html>

<?php

    $mysqli = new mysqli("localhost","root","","acm");

    if(isset($_POST['delete']))
    {
        $value = $_POST['find'];
        $query = "select * from `mentors` where `mentor_id` = '$value'";
        $query_run = mysqli_query($mysqli,$query);

        $check =  $mysqli->query($query);
        
        if($check)
        {
            if (mysqli_num_rows($check) == 0){
                echo '<script type="text/javascript">alert("ID does not exist")</script>';
                die();
            }
            else{
                
                $query1 = "SELECT * from `students` where `mentor_id` = '$value'";
                $query_run1 = mysqli_query($mysqli,$query1);
                $check1 =  $mysqli->query($query1);
                
                if($check1){

                    if(mysqli_num_rows($check1) == 0)
                    {
                        $query2 = "delete from `mentors` where `mentor_id` = '$value'";
                        $query_run2 = mysqli_query($mysqli,$query2);
                        $check2 =  $mysqli->query($query2);

                        if($check2)
                        {
                            echo '<script type="text/javascript">alert("ID deleted successfully")</script>';
                        }
                    }
                    else{
                        echo '<script type="text/javascript">alert("Mentor can not be deleted")</script>';
                        die();
                    }
                }
            }
        }
    }

?>