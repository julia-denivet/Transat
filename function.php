<?php
function mdpHash($mdp)//hash des string
{
	$mdp=hash('sha512', $mdp);
	$mdp= "E!j".$mdp."NJlm";
	$mdp=hash('sha256', $mdp);
	return $mdp ;
}

function conexionAdmin($login,$mdp)//permet aux admin de se conecter
{	
	$mdp=mdpHash($mdp);
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	$q = $db->prepare('SELECT * FROM `administeur` WHERE login = ? AND password = ? ');
	$q->execute(array($login, $mdp));
	$rep=$q->fetch();
	if(empty($rep))
	{
		$error="désolé mais vous ne sembler pas étre une persone concérnné";

		return $error;
	}
	else
	{
		$_SESSION['admlogin'] = $rep['login'];
		$_SESSION['admid'] = $rep['id'];
		$_SESSION['admstat'] = $rep['statut'];
	}
	
}

function newuser($login,$mdp,$remdp,$statut)//permet à l'admin de rajouter un utilisateur
{
	if($mdp==$remdp)
	{
		$mdpHash=mdpHash($mdp);
		$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
		$q = $db->prepare('INSERT INTO `administeur` (`id`, `login`, `password`, `statut`) VALUES (NULL, ?, ?, ?);');
		$q->execute(array($login, $mdpHash,$statut));

	}
}



function changmdp($oldmdp,$newmdp,$confmdp,$iduser)
{		
	$oldmdp=mdpHash($oldmdp);
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	$q = $db->prepare('SELECT * FROM `administeur` WHERE id = ? AND password = ? ');
	$q->execute(array($iduser,$oldmdp));
	$rep=$q->fetch();
	if(empty($rep))
	{
		$error="mot de passe incorect";
		return $error;
	}
	else
	{
		if($newmdp==$confmdp)
		{
			$mdp=mdpHash($newmdp);
			$q = $db->prepare('UPDATE `administeur` SET `password` = ? WHERE `administeur`.`id` = ?');
			$q->execute(array($mdp,$iduser));
		}
		else
		{
			$error="nouveau mot de passe et confirmation mot de passe diférent";
			return $error;
		}
	}
	var_dump($rep);

}
function newplan($title,$date,$hdeb,$mdeb,$hfin,$mfin,$lieu,$desc)
{
	$sql="INSERT INTO `agenda` ( `id_admin`, `date`, `description`, `titre`, `hdeb`, `mdeb`, `hfin`, `mfin`, `lieu`) VALUES (?,?,?,?,?,?,?,?,?);";
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	$q = $db->prepare($sql);
	$q->execute(array($_SESSION['admid'],$date,$desc,$title,$hdeb,$mdeb,$hfin,$mfin,$lieu));
}
?>