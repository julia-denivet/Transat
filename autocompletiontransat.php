<?php
 if (!empty($_GET['str'])) 
 {
    $connexion = mysqli_connect('localhost', 'root','', 'transat');
    mysqli_set_charset($connexion, "utf8");
    $sql = "SELECT * FROM article WHERE titre  like '%".$_GET['srt']."%' UNION SELECT * FROM ressources WHERE titre like '%".$_GET['srt']."%'"; 
    $query = mysqli_query($connexion,$sql);
    while ($data = mysqli_fetch_assoc($query)) 
    {
      { ?>
         <a  href="element.php?id=<?=$data['id']?>"><div><?=$data['titre']?></div></a>
      <?php
     } 	

    }
 }

?> 