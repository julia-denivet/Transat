<?php
session_start();
include('function.php');
$artc=dernier('article');
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
                                    
                                </div>
                                <div class="entete">
                                    <h3>Nos Derniers Articles</h3>
                                    <ul class="ulent">
                                        <?php
                                            foreach 
                                                ($artc as $ic) 
                                            {
                                        ?>
                                                <li>
                                                    <p><?=$ic['titre']?></p>
                                                    <p>le <?=date("j/m/Y",strtotime($ic['date']))?></p>
                                                    <a href="article.php?id=<?=$ic['id']?>">Lire</a>
                                                </li>
                                        <?php   
                                            }
                                        ?>
                                    </ul>
                                    <h3>Ressources</h3>
                                    <h2 id="h2_acceuil_conseille">Conseillé pour vous</h2>
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
                <div id="contSlid"> 
                	<div class="slideshow">
                    	<ul>
                        	<li><img class="img_slideshow" src="Medias/Transat/img1.jpg" alt="" /></li>
	                    	<li><img class="img_slideshow" src="Medias/Transat/img2.jpg" alt=""  /></li>
	                    	<li><img class="img_slideshow" src="Medias/Transat/img3.jpg" alt="" /></li>
                    	</ul>
                	</div>
                	<div id="text-index">
                	L'association Transat est un collectif de personnes trans, à visée militante et d'entraide, basé sur Marseille et ses environs. Aujourd'hui, le sujet de la transidentité est encore très méconnu du grand public. Les personnes trans sont encore largement exposées au quotidien à des préjugés transphobes. Par ailleurs, ces préjugés peuvent venir ralentir ou empêcher des démarches de transition (changer d'état civil, accéder à des traitements médicaux etc.) souvent nécessaires pour le bien-être des personnes. Dans ce cadre, nos actions visent à sensibiliser le public à la question de la transidentité, et apporter du soutien aux personnes concerné.es, dans un objectif de défense de nos droits et de lutte contre la transphobie. Nos objectifs : → sensibiliser la société aux problématiques liées à la transidentité ; → s'entraider entre personnes trans ; → défendre et plaider pour les droits des personnes trans ; → lutter contre la transphobie. Nous organisons des permanences et des activités pour les personnes trans et leurs proches, dans une démarche de valorisation de l'échange, de soutien, d'écoute, et d'empowerment. Nous organisons et participons à des événements et/ou formations, dans le but de sensibiliser le public aux questions ayant trait à la transidentité. Nous allons à la rencontre des institutions publiques ou privées pour faire valoir les droits des personnes trans. Nous nous inscrivons dans une approche inclusive, féministe et intersectionnelle, et privilégions autant que possible une posture d'ouverture et de dialogue.
                	</div>
                </div>




                       
            </div>    
                                
                    
            <script type="text/javascript" src="Apparence/carousel.js" async="true"></script>
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>