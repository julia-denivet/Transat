<?php
	if(isset($_POST['newuser']))
	{
		newuser($_POST['login'],$_POST['pass'],$_POST['repass'],$_POST['stat']);
	}
?>
<main class="">
	<form method="post">
		<input type="text" name="login">
		<input type="password" name="pass">
		<input type="password" name="repass">
		<select name="stat">
			<option value="1">reçources, articles et vide dressing.</option>
			<option value="2">vide dressing uniquement.</option>
		</select>
		<input type="submit" name="newuser">
	</form>	
</main>