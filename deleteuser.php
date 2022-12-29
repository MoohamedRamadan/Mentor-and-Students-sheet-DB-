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

                    <legend>Delete Student</legend>

                    <input class="txt" type="text" placeholder="Handle" name="find" required>
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
        $query = "select * from `students` where handel = '$value'";
        
        $check =  $mysqli->query($query);
        
        if($check)
        {
            if (mysqli_num_rows($check) == 0){
                echo '<script type="text/javascript">alert("Handle does not exist")</script>';
                die();
            }
            else{
                $query = "delete from `students` where handel = '$value'";
                $query_run = mysqli_query($mysqli,$query);
                
                if($query_run)
                {
                    echo '<script type="text/javascript">alert("Data deleted successfully")</script>';
                }
            }
        }
    }

?>