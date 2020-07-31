
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
<body<?php if(!isset($_SESSION['admid'])){?> id="bco" <?php } ?> >
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
		{	
			?>
			<header id="headAdmin">
				<a href="admin.php?deco">Deconnexion</a>
				<a href="admin.php?modpas">Modifier mot de passe</a>
			
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
				<a href="admin.php?res">Ressource</a>
				<a href="admin.php?art">Article</a>
				<!-- lee admin sup-->
				<?php
			}
			?>
			
			<a href="admin.php?videdres">Vide dressing</a>
		</header>
			<?php
		}
		if(isset($_GET['modpas']))
		{
				include('admin/modpas.php');
		}
		
	?>
	


	
		
		<?php if(isset($_GET['users'])&&$_SESSION['admstat']==0){ ?>
		<header id="headAdmin">
			<a href="admin.php?users&new">Ajouter Un nouvelle utilisateur</a>
			<a href="admin.php?users&sup">Suprimer Utilisateur</a>
			<a href="admin.php">Retour</a>
		</header>
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
		<header id="headAdmin">
			<a href="admin.php?res&new">Nouvelle reçource</a>
			<a href="admin.php?res&mod">Modifier reçource</a>
			<a href="admin.php?res&sup">Supprimer reçource</a>
			<a href="admin.php">Retour</a>
		</header>
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
		<header id="headAdmin">
			<a href="admin.php?art&new">Nouvel article</a>
			<a href="admin.php?art&mod">Modifier article</a>
			<a href="admin.php?art&sup">Supprimer article</a>
			<a href="admin.php">Retour</a>
		</header>
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
			{	?>
				<header id="headAdmin">
					<a href="admin.php">Retour</a>
				</header>
				<?php
				include('admin/planadm.php');
			}
}
 ?>

</body>
</html>