<?php
 session_start();

 include('app/database.php');

if(connectToDatabase()) {
    executeDbStatement('SELECT * FROM topics ORDER BY created_at DESC');

    $topics = fetchAllRecords();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TV forum | TV Series</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
                    <li class="effect"><a href="index.php">Home/Nieuws</a></li>
                    <li class="active"><a href="series.php">TV series</a></li>
                    <li class="effect"><a href="film.php">Films</a></li>
                    <li class="effect"><a href="aanmelden.php">Aanmelden</a></li>
                    <li class="effect"><a href="login.php">Inloggen</a></li>
                </ul> <!--EINDE NAVBAR-->
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="panels">
                <?php foreach($topics as $topic): ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="http://placehold.it/140x100">
                            <div class="panel-info">
                                <h3><a href="http://localhost/forumgoed/posts.php?topic_id=<?= $topic['id']; ?>"><?= $topic['name']; ?></a></h3>
                                <p>
                                    <?= $topic['content']; ?>
                                </p>
                                <p>
                                    <?= $topic['created_at']; ?>- aantal posts
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<div class="col-md-2" id="genres">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">Genres:</h2>
        </div>
        <div class="panel-body">
            <a href="#"><p>Actie</p></a>
            <a href="#"><p>Anime</p></a>
            <a href="#"><p>Avontuur</p></a>
            <a href="#"><p>Drama</p></a>
            <a href="#"><p>Fantasy</p></a>
            <a href="#"><p>Gangster</p></a>
            <a href="#"><p>Historisch drama</p></a>
            <a href="#"><p>Horror</p></a>
            <a href="#"><p>Komedie</p></a>
            <a href="#"><p>Misdaad</p></a>
            <a href="#"><p>Musical</p></a>
            <a href="#"><p>Romantische komedie</p></a>
            <a href="#"><p>Sci-Fi</p></a>
            <a href="#"><p>Sport</p></a>
            <a href="#"><p>Thriller</p></a>
            <a href="#"><p>Western</p></a>
        </div>
    </div>
</div>
<div class="got-thumbnail">
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="img/got.jpeg" alt="...">
                <div class="caption">
                    <h3>Voorbeeld</h3>
                    <p>Bekijk nu de nieuwe trailer van het nieuwe seizoen van Game of Thrones!</p>
                    <p><a href="#" class="btn btn-primary" role="button">Klik hier!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>