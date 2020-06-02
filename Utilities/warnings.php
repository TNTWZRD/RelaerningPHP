<?php
// This file contains all Alerts:
// Documentation: https://getbootstrap.com/docs/4.5/components/alerts/

// PRIMARY:
    // LogOut Success
    if(array_key_exists('loggedOut', $_GET)) echo '
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>See You Later!</strong> You have been Logged Out!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';

// SECONDARY:

// SUCCESS:
    // Login Success
    if(array_key_exists('loginSuccess', $_GET)) echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!</strong> You have been logged in!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    // Register Success
    if(array_key_exists('registerSuccess', $_GET)) echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!!</strong> You have been Registered, You can now login!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';

// DANGER:
    // Already Registered
    if(array_key_exists('emailExists', $_GET)) echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> Email already registered, try logging in, if you forgot your password try resetting it!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';

// WARNING:
    // Inactivity
    if(array_key_exists('inactive', $_GET)) echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> You have been logged out due to inactivity!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    // Already Logedin
    if(array_key_exists('alreadyLoggedin', $_GET)) echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Warning!</strong> You Are already Logged In!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    // Username Already Registered
    if(array_key_exists('usernameAlreadyRegistered', $_GET)) echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> That username is already registered.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';

// INFO:

// LIGHT:

// DARK:

?>