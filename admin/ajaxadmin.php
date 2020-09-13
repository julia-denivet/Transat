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

if(isset($_POST['img']))
{
	$rd= rand(100, 999);
	$t=time();
	$nomimg=$t."rd".$rd;
	//echo $nomimg;
	if($_POST['img']!="")
	{
		$_POST['img']=str_replace(" ", "+",$_POST['img'] );
		$imgsq=base64_decode($_POST['img']);
		$f = finfo_open();
		$typeimg = finfo_buffer($f, $imgsq, FILEINFO_MIME_TYPE);
		$a=explode("/", $typeimg);
		file_put_contents("../imgserveur/".$nomimg.".".$a[1], $imgsq);
		echo "imgserveur/".$nomimg.".".$a[1];
	}

}
?>