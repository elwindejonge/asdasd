<?php
include('app/database.php');
session_start();

if (isset($_GET['topic_id']) && !empty($_GET['topic_id'])) {
    $topic_id = $_GET['topic_id'];
} elseif (isset($_POST['topic_id']) && !empty($_POST['topic_id'])) {
    $topic_id = $_POST['topic_id'];
} else {
    header('Location: series.php');
    exit(0);
}

if(connectToDatabase()) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['textarea']) && !empty($_POST['textarea']) && isset($_SESSION['id'])) {
        //Insert post
        $content = $_POST['textarea'];
        $user_id = $_SESSION['id'];

        executeDbStatement('INSERT INTO nieuwspanel.posts (content,user_id,topic_id) VALUES (?, ? , ?)', [$content, $user_id, $topic_id]);
    }


    executeDbStatement('SELECT posts.id AS id,
                               posts.name AS name,
                               posts.content AS content,
                               posts.created_at AS created_at,
                               posts.user_id AS user_id,
                               posts.topic_id AS topic_id,
                               topics.id,
                               topics.name AS topic_name,
                               users.id,
                               users.username AS username
                        FROM posts
                        INNER JOIN topics ON topics.id = posts.topic_id
                        INNER JOIN users ON users.id = posts.user_id
                        WHERE posts.topic_id = :topic_id',
        [
            ':topic_id' => $topic_id
        ]
    );

    $posts = fetchAllRecords();

    if(empty($posts)) {
        header('Location: series.php');
        exit(0);
    }
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            height: 300
        });
    </script>

    <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function(val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function(val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });

            $('#rating-input').rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false
            });

            $('#btn-rating-input').on('click', function() {
                $('#rating-input').rating('refresh', {
                    showClear:true,
                    disabled: !$('#rating-input').attr('disabled')
                });
            });


            $('.btn-danger').on('click', function() {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function() {
                $("#kartik").rating('create');
            });

            $('#rating-input').on('rating.change', function() {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
        });
    </script>
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

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel-info text-center">
                            <h3><?= $posts[0]['topic_name']; ?></h3>
                        </div>
                    </div>
                </div>

                <?php foreach($posts as $post): ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
<!--                            <img src="http://placehold.it/140x100">-->
                            <div class="panel-info">
                               <!-- <h3><?/*= $post['name']; */?></h3>-->
                                <p>
                                    <?= $post['content']; ?>
                                </p>
                                <p>
                                    <?= $post['created_at']; ?> - <?= $post['username']; ?>
                                </p>
                            </div>
                            <input id="input-21e" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="xs" >
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel-info">
                            <h3>Reageer</h3>
                            <font color="#8b0000"><i>Let op voor reageren moet je ingelogd zijn!</i></font>
                            <p>

                            </p>
                            <?php if (isset($_SESSION['id'])) { ?>
                            <form action="posts.php" method="post">
                                <input type="hidden" name="topic_id" value="<?= $topic_id ?>">
                                <textarea id="mytextarea" name="textarea"></textarea>
                                <br/>
                                <input type="submit" class="btn btn-primary" value="Reageer">
                            </form>
                            <?php } ?>
<!--                            <a href="#">Reageer!</a>-->
                        </div>
                    </div>
                </div>
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
<script src="js/star-rating.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
</html>
