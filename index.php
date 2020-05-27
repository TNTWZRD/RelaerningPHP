
<!doctype html>

<?php include('Utilities/session.php'); ?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Relearning PHP Social Media</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <meta name="theme-color" content="#563d7c">
    <link href="style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/?home">TheTechSocial</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/?news">News</a>
                </li>
                <?php if(!isset($_SESSION['LOGGEDIN']) || $_SESSION['LOGGEDIN'] == false ){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?login">Login</a>
                    </li>
                <?php } else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?logout">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">

    <div class="starter-template">
        <?php 
            $PageURL = 'Pages/' . array_key_first($_GET) . '.php';
            if(file_exists($PageURL)) include($PageURL);
            else include('ERROR/404.php'); 
        ?>
    </div>

    </main><!-- /.container -->
</body>
</html>