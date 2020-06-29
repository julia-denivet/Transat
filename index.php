<?php
session_start();

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
                            <div class="newletters_index">
                                <div class="entete">
                                    <p>PRESENTATION</p>
                                    <div>
                                        <p>
                                            L'association <b>Transat</b> est une association de <b>personnes trans</b>, à visée militante et d'entraide, basée sur <b>Marseille</b> et ses environs. 
                                        </p>
                                        <p>
                                            Aujourd'hui, le sujet de la transidentité est encore tres <b>méconnu du grand public.</b> Les personnes trans sont encore largement exposées au quotidien à des préjugés transphobes.
                                        </p>
                                        <p>
                                            Par ailleurs, ces <b>préjugés</b> peuvent venir ralentir ou empêcher <b>des démarches de transition</b>(changer d'état civil, accéder à des traitements médicaux etc.), souvent <b>nécessaires</b> pour le bien-être des personnes.
                                        </p>
                                        <p>
                                            Dans ce cadre, nos actions visent à <b>sensibiliser le public</b> à la question de la transidentité, et <b>apporter du soutien</b> aux personnes concerné.es, dans un objectif de <b>défense</b> de nos <b>droits</b> et de <b>lutte</b> contre la <b>transphobie</b>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
            </div>    
                                
                    
                
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>