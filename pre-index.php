<?php
session_start();
include('function.php');
if(isset($_POST['user']))
{
    switch ($_POST['user']) 
    {
        case 'stupide':
            header("location: pre-index.php");
            break;
        case 's':
            $_SESSION['user']='S';//sante
            break;
        case 't':
             $_SESSION['user']='T'; //transgenre
            break;
        case 'p':
             $_SESSION['user']='P'; //proche
            break;
        case 'a':
             $_SESSION['user']='A'; //autre
            break;
        default:
            $_SESSION['user']='A';
            break;
    }

    if(isset($_SESSION['user']))
    {
        //recup ip la hasher puis la comparer avec full ip tab
        $ip=mdpHash(getIp());
        $db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
        $q = $db->prepare('SELECT * FROM `stat` WHERE ip = ?');
        $q->execute(array($ip));
        $rep=$q->fetchAll();
        if(empty($rep))
        {
            $q = $db->prepare('INSERT INTO `stat` (`ip`, `status`) VALUES (?, ?);');
            $q->execute(array($ip,$_SESSION['user']));
        }
        header("location: index.php");
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="Apparence/transat-asso.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
       
    </head>

    <body class="body_pre_index">
        <?php include('Formulaires/formulaire-entree.php'); ?>
    </body>
</html>