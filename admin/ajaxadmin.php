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
//var_dump($_GET);
if(isset($_POST['ni']) && isset($_POST['nin']))
{	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	$sql="INSERT INTO `imageplan` (`id`, `nom`) VALUES (NULL, ?);";
	$q = $db->prepare($sql);
	$q->execute(array($_POST['nin']));
	$_POST['ni']=str_replace(" ", "+",$_POST['ni'] );
	$imgsq=base64_decode($_POST['ni']);

	file_put_contents("../Medias/Logos/plan/".$_POST['nin'].".png", $imgsq);
	//$a= str_replace(" ","+",$_GET['ni']);
	echo $_POST['nin'];
	//var_dump()
}

?>