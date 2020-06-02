<?php
// Get MYSQL Settings from config.json
$string = file_get_contents('Resources\config.json');
$CONFIG = json_decode($string, true);

// Create Mysql Connection
$link = mysqli_connect($CONFIG['MYSQL']['Host'], $CONFIG['MYSQL']['Username'], $CONFIG['MYSQL']['Password'], $CONFIG['MYSQL']['Database']);

// Get All Posts
$sql = "SELECT * FROM `posts` JOIN `users` ORDER BY TimeStamp DESC";
$result = $link->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        unset($row['Password']);
        //echo json_encode($row);
        echo ' 
        <div class="post">
            <h1>'.$row["Title"].'</h1><h5><a href="?user='.$row["Username"].'">'.$row["Username"].'</a></h5>
            <p class="lead">'.$row["Message"].'</p>
            <small>'.$row["TimeStamp"].' - Likes: '.$row["Likes"].'</small>
        </div>';
    }
}

mysqli_close($link);
exit();

?>