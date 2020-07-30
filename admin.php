
<?php
/*
	var nessessaire:
		
	var demandé:
	mdp et login admin

	var modifiable ou créable:	
	admin

	sql nessessaire:
	admin

	sql demandé:

	sql modifiable ou créable:	
	new article, new produit
*/
session_start();
include('function.php');

	if(isset($_POST['subAdmin']))
	{
		$error=conexionAdmin($_POST['logAdmin'],$_POST['passAdmin']);
	}
	if(isset($_GET['deco']))
	{
		session_destroy();
		header('location: admin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Apparence/admin.css">
	<title>Admin transat</title>
</head>
<body>
<?php if(!isset($_SESSION['admid'])){ ?>
<form id="coAdmin" method="post" action="admin.php">
	<label>Login :</label>
	<input type="text" name="logAdmin">
	<label>Mot De Passe :</label>
	<input type="password" name="passAdmin">
	<input type="submit" name="subAdmin">
	<?php
	if(isset($error))
	{
		echo "<b id='erradm'>$error</b>";	
	}
	?>
</form>

<?php
	
 }
else
{
	if(empty($_GET))
		{	//menu de base
			?>
			
				<a href="admin.php?deco">deconexion</a>
				<a href="admin.php?modpas">modifier mot de passe</a>
			
			<?php
			if($_SESSION['admstat']==0)
			{
				?>
				<a href="admin.php?users">Gestion Utillisateur</a>
				<a href="admin.php?plan">Planning</a>
				<?php
			}
			if($_SESSION['admstat']<2)
			{
				?>
				<!-- lee admin sup-->
				<a href="admin.php?res">Reçource</a>
				<a href="admin.php?art">Article</a>
				<!-- lee admin sup-->
				<?php
			}
			?>
			
			<a href="admin.php?videdres">Vide dressing</a>
			<?php
		}
		if(isset($_GET['modpas']))
		{
				include('admin/modpas.php');
		}
		
	?>
	


	
		
		<?php if(isset($_GET['users'])&&$_SESSION['admstat']==0){ ?>
		
		<a href="admin.php?users&new">Ajouter Un nouvelle utilisateur</a>
		<a href="admin.php?users&sup">Suprimer Utilisateur</a>
		<a href="admin.php">retour</a>
		<!--GESTION UTILISATEUR-->
		<?php 
			if(isset($_GET['new']))
			{
				include('admin/usernew.php');
			}

			if(isset($_GET['sup']))
			{
				include('admin/usersup.php');
			}
		?>
		<?php } ?>
		<!--GESTION UTILISATEUR-->
		
	
		<!--GESTION  RESSOURCE -->
		<?php 
		if(isset($_GET['res'])&&$_SESSION['admstat']<2)
		{ 
		?>
		<a href="admin.php?res&new">nouvelle reçource</a>
		<a href="admin.php?res&mod">modifier reçource</a>
		<a href="admin.php?res&sup">supprimer reçource</a>
		<a href="admin.php">retour</a>
		<?php 
			if(isset($_GET['new']))
			{				
				include('admin/resnew.php');
			}			
			if(isset($_GET['sup']))
			{
				include('admin/ressup.php');
			}

			if(isset($_GET['mod']))
			{
				include('admin/resmod.php');
			}
		?>
		<?php } ?>
		<!--GESTION  RESSOURCE -->
	
		<!--GESTION  ARTICLE -->
		<?php if(isset($_GET['art'])){ ?>
		<a href="admin.php?art&new">nouvel article</a>
		<a href="admin.php?art&mod">modifier article</a>
		<a href="admin.php?art&sup">supprimer article</a>
		<a href="admin.php">retour</a>
		<?php 
			if(isset($_GET['new']))
			{
				include('admin/artnew.php');
			}
			
			if(isset($_GET['sup']))
			{
				include('admin/artsup.php');
			}

			if(isset($_GET['mod']))
			{
				include('admin/artmod.php');
			}
		?>
		<?php } ?>
		<!--GESTION  ARTICLE -->
	
	

		<?php
			if (isset($_GET['plan'])) 
			{	?><a href="admin.php">retour</a>
				<?php
				include('admin/planadm.php');
			}
}
 ?>

</body>
</html>