<?php
    // TMP Logout an redirect to home
    session_unset();
    header("Location: ?home");
?>