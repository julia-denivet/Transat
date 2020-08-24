<?php
	if(isset($_POST['newplan']))
	{
		newplan($_POST['nom'],$_POST['date'],$_POST['hdeb'],$_POST['mdeb'],$_POST['hfin'],$_POST['mfin'],$_POST['lieu'],$_POST['desc'],$_POST['type'],$_POST['cat']);
	}
	if(isset($_POST['evsup']))
	{
		supplan($_POST['evsup']);
	}
?>
<form method="post" action="admin.php?plan">
	<h1>ajouter un évennement</h1>
	<label>nom :</label><input type="text" name="nom">
	<label>jour :</label><input type="date" name="date">
	<label>heur de debut :</label><input type="number" min="0" max="23" name="hdeb"><b>:</b><input value="00" min="0" max="59" step="15" type="number" name="mdeb">
	<label>heur de fin :</label><input type="number" min="0" max="23" name="hfin"><b>:</b><input value="00" min="0" max="59" step="15" type="number" name="mfin">
	<label>lieu :</label><input type="text" name="lieu">
	<label>description :</label><textarea name="desc"></textarea>
	<label>type :</label>
	<select name="type" >
		<option value="1">mixte</option>
		<option value="0">non-mixte</option>
	</select>
	<label>catégorie</label>
	<div >
		<?php
			$cat=cat();
			foreach ($cat as $cc) 
			{
				?>
					<li class="catplanadm" onclick="choix('<?=$cc[0]?>')" ><img class="imgliadm" src="Medias/Logos/<?=$cc[0]?>.png"><?=$cc[0]?></li>
				<?php
			}
		?>
	</div>
	<select hidden id="selectcat" name="cat">
		<?php
			$cat=cat();
			foreach ($cat as $cc) 
			{
				?>
					<option value='<?=$cc[0]?>'></option>
				<?php
			}
		?>
	</select>
	<input type="submit" name="newplan">
</form>
<section id="plan">
<?php
	include('planning.php');
	//gestion des page
?>	
</section>
<script type="text/javascript">
	function choix(c) 
	{
		p=document.getElementById("selectcat");
		for (var i = p.length - 1; i >= 0; i--) 
		{
			if(p[i].value==c)
			{
				p[i].selected = 'selected';
			}
		}
	}
</script>