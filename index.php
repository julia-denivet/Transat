<?php
session_start();
include('function.php');
$artc=conseille($_SESSION['user'],'article');
$resc=conseille($_SESSION['user'],'ressources');
?>
<html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="Apparence/transat-asso.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" src="Apparence/index.js" async="true"></script> 
       
       
    </head>

    <body class="body_index">
        <?php include('Header-Footer/header.php'); ?>
        <main class="container-fluid">
            <div class="index_flex">
                
                <div class="newletters_index">
                        <div class="plan-index">
                            <p>PLANNING</p>
                            <div id="newsplan">
                                <?php include('planning.php')?>
                            </div>
                        </div>
                        <div class="entete">
                            <p>NEWSLETTERS</p>
                            <div>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                            </div>
                        </div>
                       
                </div>
                        <div class="flyer_texte_index">
                            <div class="carousel_flyer">
                                    <div id="carouselExampleControls" class="carousel slide col-8" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                            <img class="img_carousel_index" src="Medias/Transat/img1.jpg" class="d-block w-100" alt="...">
                                            </div>
                                            <div class="carousel-item">
                                            <img class="img_carousel_index" src="Medias/Transat/img2.jpg" class="d-block w-100"  alt="...">
                                            </div>
                                            <div class="carousel-item">
                                            <img class="img_carousel_index" src="Medias/Transat/img3.jpg" class="d-block w-100"  alt="...">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>   
                            </div>
                           
                        </div>
                        <div>
                            <h1>Conseillé pour vous</h1>
                            <h2>Articles</h2>
                            <ul>
                                <?php
                                    foreach 
                                        ($artc as $ic) 
                                    {
                                        ?>
                                        <li>
                                            <p><?=$ic['titre']?></p>
                                            <p>Catégorie :<?=$ic['categorie']?></p>
                                            <a href="article.php?id=<?=$ic['id']?>">Lire</a>
                                        </li>
                                        <?php   
                                    }
                                ?>
                            </ul>
                            <h2>Ressources</h2>
                            <ul>
                                 <?php
                                    foreach 
                                        ($resc as $ic) 
                                    {
                                        ?>
                                        <li>
                                            <p><?=$ic['titre']?></p>
                                            <p>Catégorie :<?=$ic['categorie']?></p>
                                            <a href="ressource.php?id=<?=$ic['id']?>">Lire</a>
                                        </li>
                                        <?php   
                                    }
                                ?>
                            </ul>
                        </div>
                       
            </div>    
                                
                    
                
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>