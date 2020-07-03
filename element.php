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
        <?php include('Header-Footer/header.php'); 

        

        
        
        
        ?>

        
        <main class="container-fluid">
            <section>
                <article>
                    <div>
                        Titre
                    </div>
                    <div>
                        Catégories
                    </div>
                    <div>
                        date
                    </div>
                    <div>
                        article
                    </div>
                </article>
                <article>
                <?php 
                 if (isset($_GET['id'])) 
                 {
                     $connexion = mysqli_connect('localhost', 'root', '', 'transat');
                     mysqli_set_charset($connexion, "utf8");
                     $sql = "SELECT * FROM article  WHERE id= '".$_GET['id']."' UNION SELECT * FROM ressources WHERE id='".$_GET['id']."'";
                     $query = mysqli_query($connexion, $sql);
                     while ($data = mysqli_fetch_assoc($query))
                    var_dump($data);

                     {
         
                 }
                
                   
                ?>
                    <div>
                        <?php echo $data['titre']; ?>
                    </div>
                    <div>
                        <?php echo $data['categorie']; ?>
                    </div>
                    <div>
                        <?php echo $data['date'];   ?>
                    </div>
                    <div>
                        <?php echo $data['article']; ?>
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