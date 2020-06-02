<?php

// Get MYSQL Settings from config.json
$string = file_get_contents('..\Resources\config.json');
$CONFIG = json_decode($string, true);

// Create Mysql Connection
$link = mysqli_connect($CONFIG['MYSQL']['Host'], $CONFIG['MYSQL']['Username'], $CONFIG['MYSQL']['Password'], $CONFIG['MYSQL']['Database']);

// Check for errors
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Inform of success
echo "Success: A proper connection to MySQL was made! The database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

// Get Variables
$USERNAME = $_POST['inputUsername'];
$EMAIL    = $_POST['inputEmail'];

// HASH Password Before Storing
$PASSWORD = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);

// Check if user in DB
$sql = "SELECT * FROM users WHERE Email LIKE '" . $EMAIL . "';";
$result = $link->query($sql);
echo json_encode($result);
if($result && $result->num_rows > 0){
    // USER IN SYSTEM
    header("Location: /?login&emailExists");
    mysqli_close($link);
    exit();
}

// Check if user in DB
$sql = "SELECT * FROM users WHERE Username LIKE '" . $USERNAME . "';";
$result = $link->query($sql);
echo json_encode($result);
if($result && $result->num_rows > 0){
    // USER IN SYSTEM
    header("Location: /?register&usernameAlreadyRegistered");
    mysqli_close($link);
    exit();
}

// User not ion DB add 
$sql = "INSERT INTO users (`Username`, `Email`, `Password`) VALUES ('" . $USERNAME . "', '" . $EMAIL . "', '" . $PASSWORD . "')";
$result = $link->query($sql);
echo json_encode($result);
if($result){
    // Record added successfully.
    header("Location: /?login&registerSuccess");
    mysqli_close($link);
    exit();
}

?>