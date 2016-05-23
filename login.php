<?php
/*
 * We starten de sessie op zodat we toegang hebben tot de
 * sessie variabelen (cookies op de server)
 */
session_start();
/*
 * Standaard vullen we de twee variabelen met een lege string
 */
$error_messages = [];
$username = '';
/*
 * Alleen als de sessie variabele error_message is gevuld stoppen
 * we deze in de variabele $error_message. Later zullen we deze gebruiken.
 */
if(isset($_SESSION['error_messages'])) {
    $error_messages = $_SESSION['error_messages'];
    unset($_SESSION['error_messages']);
}
/*
 * Alleen als de sessie variabele username is gevuld stoppen
 * we deze in de variabele $username. Later zullen we deze gebruiken.
 */
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    unset($_SESSION['username']);
}
?>
<!DOCTYPE html>
<html lang="nl" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8">
    <title>TV forum | Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top"> <!--NAVBAR-->
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">TV forum</a>
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="effect"><a href="index.php">Home/Nieuws</a></li>
                    <li class="effect"><a href="series.php">TV series</a></li>
                    <li class="effect"><a href="film.php">Films</a></li>
                    <li class="effect"><a href="aanmelden.php">Aanmelden</a></li>
                    <li class="active"><a href="login.php">Inloggen</a></li>
                </ul> <!--EINDE NAVBAR-->
            </div>
        </div>
    </div>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="text-center">Inloggen</h1>
        </div>
        <div class="modal-body">
            <?php
            /*
             * We willen de alert box alleen laten zien als er ook
             * een error_message is, dus niet een lege string is.
             */
            if(!empty($error_messages)):
                ?>
                <div class="alert alert-danger" role="alert" id="error-box">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Fout! </strong><br />
                    <ul>
                        <?php foreach($error_messages as $error_message): ?>
                            <li><?= $error_message; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php
            endif;
            ?>
            <form method="POST" action="app/authenticate.php" class="col-md-12 center-block" id="foutfix">
                <div class="form-group">
                    <label for="username">Gebruikersnaam</label>
                    <input name="username" type="text" class="form-control input-lg" placeholder="Gebruikersnaam">

                </div>
                <div class="form-group">
                    <label for="username">Wachtwoord</label>
                    <input name="password" type="password" class="form-control input-lg" placeholder="Wachtwoord">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-lg btn-primary" value="Inloggen">
                    <span class="pull-right"><a href="aanmelden.php">Aanmelden</a></span><span><a href="#">Wachtwoord vergeten?</a></span>
                </div>
            </form>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button type="button" class="btn btn-default navbar-btn">Annuleren</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>