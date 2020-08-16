<?php
session_start();
include('function.php');
$artc=conseille($_SESSION['user'],'article');
$resc=conseille($_SESSION['user'],'ressources');
//var_dump($_SESSION['user'])
?>
<html>

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="Apparence/transat-asso.css">
        <script type="text/javascript" src="Apparence/autocompletiontransat.js" async="true"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
       
       
    </head>

    <body class="body_index">
        <?php include('Header-Footer/header.php'); ?>
        <main class="container-fluid">
            <div class="index_flex">
                <div id="flex_planning_news_index">
                    <div class="newletters_index">
                        <div class="plan-index">
                            <h1 id="h1_acceuil_agenda">AGENDA</h1>
                            <div id="newsplan">
                                <?php include('planning.php')?>
                            </div>
                            <div>
                                <div id="h1_h2_index">
                                    <h1 id="h1_acceuil_newsletters">NEWSLETTERS</h1>
                                    <h2 id="h2_acceuil_conseille">Conseillé pour vous</h2>
                                </div>
                                <div class="entete">
                                    <h3>Articles</h3>
                                    <ul class="ulent">
                                        <?php
                                            foreach 
                                                ($artc as $ic) 
                                            {
                                        ?>
                                                <li>
                                                    <p><?=$ic['titre']?></p>
                                                    <p>Catégorie : <?=$ic['categorie']?></p>
                                                    <a href="article.php?id=<?=$ic['id']?>">Lire</a>
                                                </li>
                                        <?php   
                                            }
                                        ?>
                                    </ul>
                                    <h3>Ressources</h3>
                                    <ul class="ulent">
                                        <?php
                                            foreach 
                                                ($resc as $ic) 
                                            {
                                        ?>
                                                <li>
                                                    <p><?=$ic['titre']?></p>
                                                    <p>Catégorie : <?=$ic['categorie']?></p>
                                                    <a href="ressource.php?id=<?=$ic['id']?>">Lire</a>
                                                </li>
                                        <?php   
                                            }
                                        ?>
                                    </ul>

                                </div>     
                            </div>
                        </div>     
                    </div>
                </div>
                <div id="contSlid">                <div class="slideshow">
                    <ul>
                        <li><img class="img_slideshow" src="Medias/Transat/img1.jpg" alt="" /></li>
	                    <li><img class="img_slideshow" src="Medias/Transat/img2.jpg" alt=""  /></li>
	                    <li><img class="img_slideshow" src="Medias/Transat/img3.jpg" alt="" /></li>
                    </ul>
                </div>
                </div>




                       
            </div>    
                                
                    
            <script type="text/javascript" src="Apparence/carousel.js" async="true"></script>
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>