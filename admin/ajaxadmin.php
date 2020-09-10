<?php 
if(isset($_GET['nm'])&&!empty($_GET['nm']))
{	
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	$sql="INSERT INTO `motcle` (`id`, `mot`) VALUES (NULL, ?);";
	$q = $db->prepare($sql);
	$q->execute(array($_GET['nm']));
	$sql="SELECT `id` FROM `motcle` WHERE mot= ? ";
	$q = $db->prepare($sql);
	$q->execute(array($_GET['nm']));
	$rep=$q->fetchAll();
	echo $rep[0]['id'];


}
?>