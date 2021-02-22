<?php
session_start();
include('function.php');
$mot=motcle();
$artc=conseille($_SESSION['user'],'article');
?>
<html>

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="Apparence/transat-asso.css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <script type="text/javascript" src="Apparence/autocompletiontransat.js" async="true"></script> 
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
              ?>
              <section id="pannavblog">
              <div id="artmotcle">
              <h3>Mots clé(3 maximum)</h3>
              <div id="globmocle">
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
                        ?><a href="article.php?tag1=<?=$_GET['tag1']?>&tag2=<?=$_GET['tag2']?>&tag3=<?=$m['id']?>"><?=$m['mot']?></a><?php
                        break;
                    }
                }
              }
              ?> 
              </div>               
              </div>
            <?php if(!isset($_GET['tag1'])) {?>
						<div>
              <h3>Selectioner pour vous</h3>
            <?php
                foreach($artc as $ic) 
                {
                ?>
                <a href="article.php?id=<?=$ic['id']?>">
           		   	<div class="artlink">
                    <div class="artavmc">
           			  	 <p><?=$ic['titre']?></p>
           			  	 <p><?=date("j/m/Y ", strtotime($ic['date']))?></p>
                    </div>
                    <?php 
                      $mcledeco=decomotcle($ic['mot'],$mot);
                      if(!empty($mcledeco))
                      {?><i>Mot(s)-clé(s):</i><div class="divartmotcle"><?php
                        foreach ($mcledeco as $lmot) 
                        {
                          ?><b><?=$lmot?></b><?php
                        }
                        ?></div><?php
                      }
                    ?>
           			  </div>
           			</a>
                <?php   
                }
  							?>
  						</div>
            <?php } ?>
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
                $p=page(0,50,'article');
              }
						      

           				foreach ($p as $pl) 
           				{
           					?>
           					<a href="article.php?id=<?=$pl['id']?>">
           						<div class="artlink">
                        <div class="artavmc">
           							  <p>Titre : <?=$pl['titre']?></p>
           							  <p><?=date("j/m/Y ", strtotime($pl['date']))?></p>
                        </div>
                        <?php 
                        $mcledeco=decomotcle($pl['mot'],$mot);
                        if(!empty($mcledeco))
                        {?><i>Mot(s)-clé(s):</i><div class="divartmotcle"><?php
                         foreach ($mcledeco as $lmot) 
                        {
                          ?><b><?=$lmot?></b><?php
                        }
                        ?></div><?php
                      }
                    ?>
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
           		<article class="artartpre">
           			<section id="contart">
           				<?=$cont[0]['article']?>   
                  </section>
           				<i><?=date("j/m/Y ", strtotime($cont[0]['date']))?></i>
                  <?php 
                      $mcledeco=decomotcle($cont[0]['mot'],$mot);
                      if(!empty($mcledeco))
                      {?><i>mot(s)-clé(s):</i><div class="divartmotcle"><?php
                        foreach ($mcledeco as $lmot) 
                        {
                          ?><b><?=$lmot?></b><?php
                        }
                        ?></div><?php
                      }
                    ?>
           			
           		</article>
           		<?php
           	}
           ?>     
        </main>
        <?php include('Header-Footer/footer.php'); ?>
    </body>
</html>