<h1>
HOME
</h1>

<?php if(isset($_SESSION['USER'])){ echo "Hello, ". $_SESSION['USER']['Username']; }?>