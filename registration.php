<?php     //start php tag

// TODO Als er wel een account is aangemaakt dan worden we doorgestuurd naar de inlogpagina
// TODO Als er geen account is aangemaakt dan keren we terug naar de aanmeldpagina met een melding dat er een account moet aangemaakt worden


//include connect.php page for database connection
include('app/database.php');
//if submit is not blanked i.e. it is clicked
if(isset($_REQUEST['submit'])!='')

{
    if($_REQUEST['name']=='' || $_REQUEST['email']=='' || $_REQUEST['password']=='')
    {
        echo "Vul A.U.B alle verplichte velden in!";
    }
    else
    {
        if(connectToDatabase()) {
            executeDbStatement("INSERT INTO users(username, password, email) VALUES(:username, :password, :email)",
                [
                    ':username' => $_REQUEST['name'],
                    ':password' => sha1($_REQUEST['password']),
                    ':email' => $_REQUEST['email']
                ]
            );

            header('Location: login.php');
            exit(0);
        } else {
            header('Location: aanmelden.php');
            exit(0);
        }
    }
}

?>
