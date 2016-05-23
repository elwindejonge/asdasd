<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['id']) && !isset($_SESSION['email'])) {
    /*
     * Er is blijkbaar niet ingelogd, want deze drie sessie variabelen bestaan niet
     * Dus gaan we terug naar het login formulier
     */
    $_SESSION['error_messages'][] = 'Voor het dashboard moet je ingelogd zijn.';
    header('Location: login.php');
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TV forum | Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<div class="container">
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
                    <li class="active"><a href="index.php">Home/Nieuws</a></li>
                    <li class="effect"><a href="series.php">TV series</a></li>
                    <li class="effect"><a href="film.php">Films</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Uitloggen</a></li>
                </ul> <!--EINDE NAVBAR-->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Het laatste nieuws:</h1></div>
                    <div class="panel-body">
                        <button type="button" class="list-group-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="nieuws-foto">
                                        <img src="img/got.jpeg" height="150" width="150">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="nieuws-titel" id="test1">
                                        <h2>Nieuwe trailer Game of Thrones seizoen 6 uitgebracht</h2>
                                        <div class="nieuws-tekst">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nihil minus, contraque illa hereditate dives ob eamque rem laetus. Vitiosum est enim in dividendo partem in genere numerare. Quid censes in Latino fore? Quod cum dixissent, ille contra.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="test">
                                    <h3>Geplaatst op:</h3>
                                    <div class="datum">
                                        <p><h4>4-4-2016</h4></p>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <button type="button" class="list-group-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="nieuws-foto">
                                        <img src="img/breakingbad.png" height="150" width="150">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="nieuws-titel" id="test1">
                                        <h2>Breaking bad krijgt sequel genaamd "Better call Saul"</h2>
                                        <div class="nieuws-tekst">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nihil minus, contraque illa hereditate dives ob eamque rem laetus. Vitiosum est enim in dividendo partem in genere numerare. Quid censes in Latino fore? Quod cum dixissent, ille contra.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="test">
                                    <h3>Geplaatst op:</h3>
                                    <div class="datum">
                                        <p><h4>3-28-2016</h4></p>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <button type="button" class="list-group-item news-post">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="nieuws-foto">
                                        <img src="img/twd.jpg" height="150" width="150">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="nieuws-titel" id="test1">
                                        <h2>The walking dead vernieuwd tot seizoen 8</h2>
                                        <div class="nieuws-tekst">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nihil minus, contraque illa hereditate dives ob eamque rem laetus. Vitiosum est enim in dividendo partem in genere numerare. Quid censes in Latino fore? Quod cum dixissent, ille contra.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="test">
                                    <h3>Geplaatst op:</h3>
                                    <div class="datum">
                                        <p><h4>3-26-2016</h4></p>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--EIND PANELS-->
</div> <!--EIND CONTAINER-->

<div id="aanmelden-succes">
    <div class="alert alert-success fade in" role="alert">
        <strong>Succesvol aangemeld!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
</div>

<div class="col-md-4"> <!--BEGIN RECENTE POSTS-->
    <div id="recente-posts">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" id="recente-posts-title">recente posts:</h2>
            </div>
            <div class="panel-body">
                <button type="button" class="list-group-item">
                    <div class="row" id="recente-posts-post">
                        <div class="wolkje">
                            <span class="glyphicon glyphicon-comment"></span>
                        </div>
                        <div class="tekst-recente-posts">
                            <a href="#">pietergriep reageert op: *naam topic* - *reactie*</a>
                        </div>
                    </div>
                </button>
                <button type="button" class="list-group-item">
                    <div class="row" id="recente-posts-post">
                        <div class="wolkje">
                            <span class="glyphicon glyphicon-comment"></span>
                        </div>
                        <div class="tekst-recente-posts">
                            <a href="#">Elwin090 reageert op: *naam topic* - *reactie*</a>
                        </div>
                    </div>
                </button>
                <button type="button" class="list-group-item">
                    <div class="row" id="recente-posts-post">
                        <div class="wolkje">
                            <span class="glyphicon glyphicon-comment"></span>
                        </div>
                        <div class="tekst-recente-posts">
                            <a href="#">basanninga reageert op: *naam topic* - *reactie*</a>
                        </div>
                    </div>
                </button>
                <button type="button" class="list-group-item">
                    <div class="row" id="recente-posts-post">
                        <div class="wolkje">
                            <span class="glyphicon glyphicon-comment"></span>
                        </div>
                        <div class="tekst-recente-posts">
                            <a href="#">Jens reageert op: *naam topic* - *reactie*</a>
                        </div>
                    </div>
                </button>
                <button type="button" class="list-group-item">
                    <div class="row" id="recente-posts-post">
                        <div class="wolkje">
                            <span class="glyphicon glyphicon-comment"></span>
                        </div>
                        <div class="tekst-recente-posts">
                            <a href="#">Johanstr reageert: *naam topic* - *reactie*</a>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div> <!--EIND RECENTE POSTS-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
