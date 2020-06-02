<?php

// start session
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    // Redirect to @PAGE With inactive TAG
    header("Location: ?login&inactive");
}
else{
    // update last activity time stamp
    if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN'] != false ){
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    // regenerate ID;
    session_regenerate_id(true);
}

?>