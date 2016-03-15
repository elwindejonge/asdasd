<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>film forum</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">Film forum</a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navHeaderCollapse">

            <ul class="nav navbar-nav navbar-right">

                <li><a href="index.html">Home/Nieuws</a></li>
                <li><a href="series.html">TV series</a></li>
                <li><a href="#">Films</a></li>
                <li><a href="#">Mijn favorieten</a></li>
                <li class="active"><a href="aanmelden.html">Aanmelden</a></li>
                <li><a href="login.html">Inloggen</a></li>

            </ul>
        </div>
    </div>
</div>

<div class="aanmelden">
    <div class="container" style="margin-top:30px">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <h1>Aanmelden</h1></h3>
                </div>

                <div class="panel-body">
                    <form name="registration" method="post" action="registration.php" role="form">
                        <div class="row">
                            <div class="col-xs-12">
                        <div class="form-group">
                            <input type="text" name="name" value="" id="display_name" class="form-control " placeholder="Gebruikersnaam" tabindex="3">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" value="" id="email" class="form-control " placeholder="Email Adres" tabindex="4">
                        </div>
                                <div class="form-group">
                                    <input type="password" name="password" value="" id="password" class="form-control " placeholder="Wachtwoord" tabindex="5">
                                </div>

                        <div class="input-group">
                            <div class="checkbox" style="margin-top: 0px;">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Onthoud mij
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-default navbar-btn">Aanmelden</button>

                        <hr style="margin-top:10px;margin-bottom:10px;" >

                        <div class="form-group">

                            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Wachtwoord vergeten?</a></div>

                        </div>
                    </form>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>
