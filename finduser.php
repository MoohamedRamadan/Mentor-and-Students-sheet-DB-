<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Welcome to my page">
        <link rel="stylesheet" href="Css\111.css">
        <title>Find Page</title>
    </head>

    <body>

        <div class="father">
            
            <form action="" method="POST">

                <fieldset>

                    <legend>Find Student</legend>

                    <input class="txt" type="text" placeholder="Handle" name="find" required>
                    <div class="move">
                        <input class="sub" type="submit" value="Search" name="Search">
                    </div>

                    <div class="move2">
                        <a href="find.html">Back</a>
                     </div>

                </fieldset>

            </form>
            
            <div class="table1">
                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Level</th>
                        <th>Problems</th>
                        <th>Points</th>
                        <th>Mentor ID</th>
                        <th>Mentor Name</th>
                    </tr> <br>

                     <?php
                        
                        $mysqli = new mysqli("localhost","root","","acm");

                        if(isset($_POST['Search']))
                        {
                            $value = $_POST['find'];
                            $query = "SELECT * from `students` where `handel` = '$value'";
                            $query_run = mysqli_query($mysqli,$query);

                            $query2 = "SELECT `name` from `mentors` where `mentor_id` = (SELECT `mentor_id` from `students` where `handel` = '$value' )";
                            $query_run2 = mysqli_query($mysqli,$query2);

                            $check =  $mysqli->query($query);
                            
                            if($check)
                            {
                                if (mysqli_num_rows($check) == 0){
                                    echo '<script type="text/javascript">alert("Handle does not exist")</script>';
                                    die();
                                }
                            }

                            while($row = mysqli_fetch_array($query_run) and $row1 = mysqli_fetch_array($query_run2))
                            {
                                $title1 = $row["student_id"]; 
                                $title2 = $row["level"]; 
                                $title3 = $row["problems"];
                                $title4 = $row["points"];
                                $title5 = $row["mentor_id"];
                                $title6 = $row1["name"];
                                
                                echo "<tr>
                                <td>$title1</td>
                                <td>$title2</td>
                                <td>$title3</td>
                                <td>$title4</td>
                                <td>$title5</td>
                                <td>$title6</td>
                                </tr>";
                            }

                        }
                    ?>

                </table>
            </div>

        </div>
        
    </body>

</html>