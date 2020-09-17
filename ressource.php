<?php
session_start();
include('function.php');
$resc=conseille($_SESSION['user'],'ressources');
?>
<html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="Apparence/transat-asso.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>  
       
       
    </head>

    <body>
        <?php include('Header-Footer/header.php'); ?>
        <main id="blogmain">
           <?php
           	if(!isset($_GET['id'])) 
           	{
           		if(isset($_GET['p']))
           		{
           			//page suivante
           		}
           		else
           		{
           			//pas de page
           			if(!isset($_GET['cat']))
           			{	
           				$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
						      $q = $db->prepare("SELECT DISTINCT categorie FROM ressources");
						      $q->execute();
						//$q->debugDumpParams();
						      $repcat=$q->fetchAll();
						?>
            <section id="pannavblog">
						<section id="artmotcle">
              <h3>Catégorie</h3>
						<?php
           				foreach ($repcat as $cat) 
           				{
           					?>
           					<a href="ressource.php?cat=<?=$cat[0]?>"><?=$cat[0]?></a>
           					<?php
           					
           				}
           				?>
           				</section>
           				<div>
           					<h3>Selectioner pour vous</h3>
           					<?php
                                    foreach 
                                        ($resc as $ic) 
                                    {
                                        ?>
                                        <a href="ressource.php?id=<?=$ic['id']?>">
           									<div class="artlink resart">
           										<p><?=$ic['titre']?></p>
           										<p><?=date("j/m/Y ", strtotime($ic['date']))?></p>
           										<p><?=$ic['categorie']?></p>
           									</div>
           								</a>
                            			<?php   
                                    }
  							?>
  						</div>
            </section>
            <section id="resblog">
  						<?php
           				$p=page(0,4,'ressources');
           				foreach ($p as $pl) 
           				{
           				?>
           				<a href="ressource.php?id=<?=$pl['id']?>">
           					<div class="artlink resart">
           						<p><?=$pl['titre']?></p>
           						<p><?=date("j/m/Y ", strtotime($pl['date']))?></p>
           						<p><?=$pl['categorie']?></p>
           					</div>
           				</a>
           				<?php
           				}
          ?></section><?php 
           			}

           		
           		}
           	}
           	else
           	{	//article
           		$cont=read($_GET['id'],'ressources');
           		?>
           		<article class="artartpre" >
           			<h><?=$cont[0]['titre']?></h>
           			<section id="contart">
           				<?=$cont[0]['article']?>   
                </section>
                  <a href="ressource/<?=$cont[0]['id']?>">lien vers le pdf</a>
           				<i><?=date("j/m/Y ", strtotime($cont[0]['date']))?></i>
           				<p>catégorie : <a href="ressource.php?cat=<?=$cont[0]['categorie']?>"><?=$cont[0]['categorie']?></a></p>
           			
           		</article>
           		<?php
           	}
           ?>     
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>