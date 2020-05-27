<?php

session_start();
session_regenerate_id();

// Get MYSQL Settings from config.json
$string = file_get_contents('..\Resources\config.json');
$CONFIG = json_decode($string, true);

// Create Mysql Connection
$link = mysqli_connect('localhost', $CONFIG['MYSQL']['Username'], $CONFIG['MYSQL']['Password'], $CONFIG['MYSQL']['Database']);

// Check for errors
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Inform of success
echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// Get Variables
$USERNAME = $_POST['inputEmailUsername'];

// HASH Password Before Storing
$PASSWORD = $_POST['inputPassword'];

// Check if user in DB
$sql = "SELECT * FROM users WHERE `Username` LIKE '".$USERNAME."' OR `Email` LIKE '".$USERNAME."'";
$result = $link->query($sql);
if($result->num_rows > 0){
    $USER = null;
    while($row = $result->fetch_assoc()){
        echo "\n\nUsername: " . $row["Username"]. " - Email: " . $row["Email"]. "<br>";
        if(password_verify($PASSWORD, $row["Password"])){
            $USER = $row;
            $USER["Password"] = null;
            echo "Password Matches!!";
            break;
        } 
    }
    if($USER){
        // USER In SYSTEM
        $_SESSION["LOGGEDIN"] = true;
        $_SESSION["USER"] =  $USER;

        header("Location: /?home&loginSuccess");
        mysqli_close($link);
        exit();
    }else{
        // USER Not In SYSTEM
        //header("Location: /?login&loginError");
        mysqli_close($link);
        exit();
    }

    mysqli_close($link);
    exit();
}else{
    // USER Not In SYSTEM
    //header("Location: /?login&loginError");
    mysqli_close($link);
    exit();
}

?>