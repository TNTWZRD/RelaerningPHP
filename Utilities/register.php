<?php

// Get MYSQL Settings from config.json
$string = file_get_contents('..\Resources\config.json');
$CONFIG = json_decode($string, true);

// Create Mysql Connection
$link = mysqli_connect($CONFIG['MYSQL']['Host'][$CONFIG['MYSQL']['USEHost']], $CONFIG['MYSQL']['Username'], $CONFIG['MYSQL']['Password'], $CONFIG['MYSQL']['Database']);

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
$USERNAME = $_POST['inputUsername'];
$EMAIL    = $_POST['inputEmail'];

// HASH Password Before Storing
$PASSWORD = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);

// Check if user in DB
$sql = "SELECT * WHERE users.Username LIKE `" . $USERNAME . "` OR users.Email LIKE `" . $EMAIL . "`";
$result = $link->query($sql);
if($result->num_rows > 0){
    // USER IN SYSTEM
    header("Location: /?login&alreadyRegisterd");
    mysqli_close($link);
    exit();
}

// User not ion DB add 
$sql = "INSERT INTO users (`Username`, `Email`, `Password`) VALUES ('" . $USERNAME . "', '" . $EMAIL . "', '" . $PASSWORD . "')";
if($link->query($sql) === TRUE){
    // Record added successfully.
    header("Location: /?login&registerSuccess");
    mysqli_close($link);
    exit();
}

?>