<?php
	if(isset($_POST['idsup']))
	{
			$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
			$q = $db->prepare('DELETE FROM `administeur` WHERE `administeur`.`id` = ? ');
			$q->execute(array($_POST['idsup']));
	}
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	$q = $db->prepare('SELECT id , login FROM `administeur`');
	$q->execute();
	$rep=$q->fetchAll();
?>
<ul>
<?php
	foreach ($rep as $r ) 
	{
		?>
		
			<li><?=$r[1];?><form method="post" action="admin.php?users&sup"><button type="submit" value="<?=$r[0]?>"  name="idsup">supprimer</button></form></li>
		<?php
			
	}
?>
</ul>