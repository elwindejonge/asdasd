<?php
$_dbHost = 'localhost';
$_dbName = 'nieuwspanel';
$_dbPassword = '';
$_dbUser = 'root';

$_db = null;
$_statement = null;

function connectToDatabase()
{
    global $_db, $_dbHost, $_dbName, $_dbUser, $_dbPassword;

    try {
        $_db = new PDO("mysql:host={$_dbHost};dbname={$_dbName}", $_dbUser, $_dbPassword);

        return true;
    } catch(PDOException $e) {
        echo $e->getMessage();
        $_db = null;
    }

    return false;
}

function executeDbStatement($sql, $parameters = [])
{
    global $_db, $_statement;

    if($_db != null) {
        $_statement = $_db->prepare($sql);

        if(empty($parameters))
            $_statement->execute();
        else
            $_statement->execute($parameters);
    }
}

function fetchRecord()
{
    global $_db, $_statement;

    if($_db != null) {
        return $_statement->fetch();
    }

    return null;
}

function fetchAllRecords()
{
    global $_db, $_statement;

    if($_db != null) {
        return $_statement->fetchAll();
    }

    return null;
}