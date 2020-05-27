<?php
    // TMP Login an redirect to home
    $_SESSION['LOGGEDIN'] =  true;
    header("Location: ?home");
?>