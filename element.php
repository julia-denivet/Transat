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
        <?php include('Header-Footer/header.php');?>

        
        <main id="element">
            <section id="element_affichage">
                <article id="element_affichage_header">
                    <div class="element_affichage_compartiment">
                        <h1>Titre</h1>
                    </div>
                    <div class="element_affichage_compartiment">
                        <h1>Catégories</h1>
                    </div>
                    <div class="element_affichage_compartiment">
                        <h1>Date</h1>
                    </div>
                    <div class="element_affichage_compartiment">
                        <h1>Article</h1>
                    </div>
                </article>
                <article id="element_affichage_element"> 
                <?php 
                    if (isset($_GET['id'])) 
                        {
                        $connexion = mysqli_connect('localhost', 'root', '', 'transat');
                        mysqli_set_charset($connexion, "utf8");
                        $sql = "SELECT * FROM article  WHERE id= '".$_GET['id']."' UNION SELECT * FROM ressources WHERE id='".$_GET['id']."'";
                        $query = mysqli_query($connexion, $sql);   
         
                    }
                
                   
                ?>
                <?php
                     while ($data = mysqli_fetch_assoc($query))
                     {
                        date_default_timezone_set('Europe/Paris');
                        $now = $data['date']; 
                        $newDate = date("d-m-Y", strtotime($now));
                       

                ?>
                    <div class="element_affichage_compartiment">
                        <?=$data['titre']?>
                    </div>
                    <div class="element_affichage_compartiment">
                        <?=$data['categorie']?>
                    </div>
                    <div class="element_affichage_compartiment">
                        <?=$newDate?>
                    </div>
                    <div class="element_affichage_compartiment" id="element_article">
                        <?=$data['article']?>
                    </div>

                <?php
                } 
                ?>
                </article>
                
            </section>

                                
                    
                
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>