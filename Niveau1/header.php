<?php
session_start();
$connected_id="";
if (isset($_SESSION['connected_id'])) $connected_id = $_SESSION['connected_id'];
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Ada Reseau School</title> 
        <meta name="author" content="Julien Falconnet">
        <link rel="stylesheet" href="../style/style.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,800;0,900;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300">
        <script src="https://kit.fontawesome.com/a7ec6035d3.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <header>
        <img src="../img/logos/option 1.jpg" alt="Logo de notre réseau social"/>

            <?php 
              if (isset($_SESSION['connected_id'])) : 
            ?>
            <nav id="menu">
                <a href="news.php">Actualités</a>
                <a href="wallUser.php?user_id=<?php echo $connected_id ?>">Mur</a>
                <a href="feed.php?user_id=<?php echo $connected_id ?>">Flux</a>
                <a href="tags.php?tag_id=<?php echo $connected_id ?>">Mots-clés</a>
            </nav>
            <nav id="user">
                <a href="#">Profil</a>
                <ul>
                    <li><a href="settings.php?user_id=<?php echo $connected_id ?>">Paramètres</a></li>
                    <li><a href="followers.php?user_id=<?php echo $connected_id ?>">Mes suiveurs</a></li>
                    <li><a href="subscriptions.php?user_id=<?php echo $connected_id ?>">Mes abonnements</a></li>
                    <li><a href="deconnect.php?user_id=?>">Se déconnecter</a></li>
                </ul>
            </nav>
            <?php
                endif
            ?>


            <?php 
              if (!isset($_SESSION['connected_id'])) : 
            ?>
          
                <nav id="menu">
                    <a href="login.php">Actualités</a>
                    <a href="login.php">Mur</a>
                    <a href="login.php">Flux</a>
                    <a href="login.php">Mots-clés</a>
                </nav>
            <nav id="user-login">
                <a href="login.php">Se connecter <i class="fa-solid fa-user"></i></a>
            </nav>
            <?php
              endif
            ?>
    </header>