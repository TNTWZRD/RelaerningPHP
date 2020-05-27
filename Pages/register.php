<form class="form-signin" action="/Utilities/register.php" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Register Form</h1>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <br>
    <a href="?login">
        <button class="btn btn-lg btn-warning btn-block" type="button">Sign In</button>
    </a>
</form>