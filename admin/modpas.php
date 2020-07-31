<header id="headAdmin"><a href="admin.php">retour</a></header>
<?php if(!isset($_POST['mdpmod'])){?>
<form method="post" action="admin.php?modpas">
	<label>Ancien mot de passe </label><input type="password" name="oldmdp">
	<label>Nouveau mot de passe </label><input type="password" name="newmdp">
	<label>Confirmation </label><input type="password" name="remdp">
	<input type="submit" value="modifier" name="mdpmod">
</form>
<?php }
	  else
	  	{
	  		$error=changmdp($_POST['oldmdp'],$_POST['newmdp'],$_POST['remdp'],$_SESSION['admid']);
	  		if(empty($error))
	  		{
	  			?>
	  			<b>votre mot de passe à bien été changer</b>
	  			<?php 
	  		}
	  		else
	  		{
	  			?>
	  			<b><?=$error?></b>
	  			<?php	
	  			
	  		}
	  	} 
?>
