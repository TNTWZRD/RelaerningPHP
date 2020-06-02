<?php
if(isset($_SESSION['LOGGEDIN']) && $_SESSION['LOGGEDIN'] != false){
    header("Location: ?home&alreadyLoggedin");
}
?>
<form class="form-signin" action="/Utilities/login.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address / Username</label>
    <input type="text" id="inputEmail" name="inputEmailUsername" class="form-control" placeholder="Email address / Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <br>
    <a href="?register">
        <button class="btn btn-lg btn-warning btn-block" type="button">Register</button>
    </a>
</form>