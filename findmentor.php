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

                    <legend>Find Mentor</legend>

                    <input class="txt" type="number" placeholder="Mentor ID" name="find" required>
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Students</th>
                    </tr>
                     <?php
                        
                        $mysqli = new mysqli("localhost","root","","acm");

                        if(isset($_POST['Search']))
                        {
                            $value = $_POST['find'];
                            $query = "SELECT * from `mentors` where `mentor_id` = '$value'";
                            $query_run = mysqli_query($mysqli,$query);
                            
                            $check =  $mysqli->query($query);

                            $query2 = "SELECT `handel` from `students` where `mentor_id` = (SELECT `mentor_id` from `mentors` where `mentor_id` = '$value' )";
                            $query_run2 = mysqli_query($mysqli,$query2);
  
                            if($check)
                            {
                                if (mysqli_num_rows($check) == 0){
                                    echo '<script type="text/javascript">alert("Mentor does not exist")</script>';
                                    die();
                                }
                            }

                            while($row = mysqli_fetch_array($query_run) and $row1 = mysqli_fetch_array($query_run2))
                            {
                                $title1 = $row["name"]; 
                                $title2 = $row["phone"];
                                $title3 = $row["email"];
                                $title4 = $row1["handel"];
                                    echo "<tr>
                                    <td>$title1</td>
                                    <td>$title2</td>
                                    <td>$title3</td>
                                    <td>$title4</td>
                                    </tr>";
                            }

                            while($row1 = mysqli_fetch_array($query_run2))
                            {
                                $title1 = ""; 
                                $title2 = "";
                                $title3 = "";
                                $title4 = $row1["handel"];
                                    echo "<tr>
                                    <td>$title1</td>
                                    <td>$title2</td>
                                    <td>$title3</td>
                                    <td>$title4</td>
                                    </tr>";
                            }
                        }
                    ?>
                </table>
                
            </div>

        </div>
        
    </body>

</html>