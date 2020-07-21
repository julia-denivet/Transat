<?php
 if (!empty($_GET['srt'])) 
 {
    $connexion = mysqli_connect('localhost', 'root','', 'transat');
    mysqli_set_charset($connexion, "utf8");
    $sqla = "SELECT * FROM article WHERE titre  like '%".$_GET['srt']."%' LIMIT 5;";
    $sqlr = "SELECT * FROM ressources WHERE titre like '%".$_GET['srt']."%' LIMIT 5;";
    $querya = mysqli_query($connexion,$sqla);
    $queryr = mysqli_query($connexion,$sqlr);
    while ($data = mysqli_fetch_assoc($querya)) 
    {
       ?>
        <a  href="article.php?id=<?=$data['id']?>"><div><?=$data['titre']?></div></a>
      <?php
    }
    while ($data = mysqli_fetch_assoc($queryr)) 
    {
       ?>
        <a  href="ressource.php?id=<?=$data['id']?>"><div><?=$data['titre']?></div></a>
      <?php
    }
 }

?> 