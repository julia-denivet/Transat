<?php
session_start();
include('function.php');
$artc=conseille($_SESSION['user'],'article');
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
              $mot=motcle();
              ?>
              <section id="pannavblog">
              <div id="artmotcle">
              <h3>mots clé(3 maximum)</h3>
              <?php  
              foreach ($mot as $m) 
              {
                if(!isset($_GET['tag1']))
                {
                  ?><a href="article.php?tag1=<?=$m['id']?>"><?=$m['mot']?></a><?php
                }
                if(isset($_GET['tag1'])&&!isset($_GET['tag2']))
                {
                    if($_GET['tag1']==$m['id'])
                    {
                      ?><a href="article.php" class="tagselect"><?=$m['mot']?></a><?php
                    }
                    else
                    {
                      ?><a href="article.php?tag1=<?=$_GET['tag1']?>&tag2=<?=$m['id']?>"><?=$m['mot']?></a><?php
                    }
                    
                }
                if (isset($_GET['tag1']) && isset($_GET['tag2']) && !isset($_GET['tag3'])) 
                {                
                    switch ($m['id']) 
                    {
                      case $_GET['tag1']:
                        ?><a href="article.php?tag1=<?=$_GET['tag2']?>" class="tagselect"><?=$m['mot']?></a><?php
                        break;
                      case $_GET['tag2']:
                        ?><a href="article.php?tag1=<?=$_GET['tag1']?>" class="tagselect"><?=$m['mot']?></a><?php
                        break;
                      default:
                        ?><a href="article.php?tag1=<?=$_GET['tag1']?>&tag2=<?=$_GET['tag2']?>&tag3=<?=$m['id']?>" ><?=$m['mot']?></a><?php
                        break;
                    }
                }
                if (isset($_GET['tag1']) && isset($_GET['tag2']) && isset($_GET['tag3'])) 
                {                
                    switch ($m['id']) 
                    {
                      case $_GET['tag1']:
                        ?><a href="article.php?tag1=<?=$_GET['tag2']?>&tag2=<?=$_GET['tag3']?>" class="tagselect"><?=$m['mot']?></a><?php
                        break;
                      case $_GET['tag2']:
                        ?><a href="article.php?tag1=<?=$_GET['tag1']?>&tag2=<?=$_GET['tag3']?>" class="tagselect"><?=$m['mot']?></a><?php
                        break;
                      case $_GET['tag3']:
                        ?><a href="article.php?tag1=<?=$_GET['tag1']?>&tag2=<?=$_GET['tag2']?>" class="tagselect"><?=$m['mot']?></a><?php
                        break;
                      default:
                        ?><a href="article.php?tag1=<?=$_GET['tag1']?>&tag2=<?=$_GET['tag2']?>&tag3=<?=m['id']?>"><?=$m['mot']?></a><?php
                        break;
                    }
                }
              }
              ?>                
              </div>
             
						<div>
              <h3>Selectioner pour vous</h3>
            <?php
                foreach($artc as $ic) 
                {
                ?>
                <a href="article.php?id=<?=$ic['id']?>">
           		   	<div>
           			  	<p><?=$ic['titre']?></p>
           			  	<p><?=$ic['date']?></p>
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
              if(isset($_GET['tag1']))
              { 

                $db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
                if(isset($_GET['tag1']) && !isset($_GET['tag2']))
                {
                  $tagsql="SELECT * FROM `article` WHERE mot LIKE '%".$_GET['tag1']."!!%' ";
                }
                if (isset($_GET['tag1']) && isset($_GET['tag2']) && !isset($_GET['tag3'])) 
                {
                  $tagsql="SELECT * FROM `article` WHERE mot LIKE '%".$_GET['tag1']."!!%' && mot LIKE '%".$_GET['tag2']."!!%'";
                }
                if (isset($_GET['tag1']) && isset($_GET['tag2']) && isset($_GET['tag3']))
                {
                  $tagsql="SELECT * FROM `article` WHERE mot LIKE '%".$_GET['tag1']."!!%' && mot LIKE '%".$_GET['tag2']."!!%' && mot LIKE '%".$_GET['tag3']."!!%'";
                }
                $q = $db->prepare($tagsql);
                $q->execute();
                //$q->debugDumpParams();
                $p=$q->fetchAll();
              }
              else
              {
                $p=page(0,4,'article');
              }
						      

           				foreach ($p as $pl) 
           				{
           					?>
           					<a href="article.php?id=<?=$pl['id']?>">
           						<div>
           							<p><?=$pl['titre']?></p>
           							<p><?=$pl['date']?></p>
           							<p><?=$pl['categorie']?></p>
           						</div>
           					</a>
           					<?php
           				}
            ?>     
            </section>
            <?php
           	}
           	else
           	{	//article
           		$cont=read($_GET['id'],'article');
           		?>
           		<article>
           			<h><?=$cont[0]['titre']?></h>
           			<section>
           				<?=$cont[0]['article']?>
           				<i><?=$cont[0]['date']?></i>
           				<p>catégorie : <a href=""><?=$cont[0]['categorie']?></a></p>
           			</section>
           		</article>
           		<?php
           	}
           ?>     
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>