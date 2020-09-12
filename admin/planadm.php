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
<form method="post" action="admin.php?plan" enctype="multipart/form-data">
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
	<div id="choxtypeevent">
		<div id="sectypeev">
		<?php
			$cat=cat();
			foreach ($cat as $cc) 
			{
				?>
					<li class="catplanadm" onclick="choix('<?=$cc[0]?>')" ><img class="imgliadm" src="Medias/Logos/plan/<?=$cc[0]?>.png"><?=$cc[0]?></li>
				<?php
			}
		?></div>
		<b onclick="newcat()" >Nouveau type d'evenement</b>
		<div id="newcatdivplan" hidden="true">
			<input onchange="encodeImageFileAsURL(this)" type="file" name="logo" id="newlogplan"  accept=".png">
			<input type="text" name="64img" id="64img">
			<input type="text" name="nomlogo"  id="newlogplannam">
			<b onclick="newcatgo()">envoyer</b>
		</div>
	</div>
	<select  id="selectcat" name="cat"  hidden="true">
		<?php
			$cat=cat();
			foreach ($cat as $cc) 
			{
				?>
					<option value='<?=$cc[0]?>'><?=$cc[0]?></option>
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
		catvis=document.getElementById("sectypeev");
		//console.log(catvis.classList.contains("test"));
		//console.log(catvis.children);
		for (var i =catvis.children.length - 1; i >= 0; i--) 
		{	console.log(catvis.children[i].innerHTML)
			console.log(catvis.children[i].innerHTML.indexOf(c))
			if(catvis.children[i].innerHTML.indexOf(c)!== -1)
			{
				catvis.children[i].classList.add("selcvis")
				console.log("test");
			}
			else
			{
				if(catvis.children[i].classList.contains("selcvis"))
				{
					//la suprimer
					catvis.children[i].classList.remove("selcvis")
				}
			}
		}
		for (var i = p.length - 1; i >= 0; i--) 
		{	
			//console.log(p[i]);
			if(p[i].value==c)
			{
				p[i].selected = 'selected';

			}
		}
	}
	function newcat()
	{
		document.getElementById("newcatdivplan").hidden=false;
	}

	function encodeImageFileAsURL(element) 
	{
  		 file = element.files[0];
  		 reader = new FileReader();
  		reader.onloadend = function() 
  		{
    		
    		ressq=reader.result;
    		ressq=ressq.split(",");
    		console.log(ressq)
    		ressq.length
    		resq=ressq[ressq.length-1];
    		document.getElementById('64img').value=resq;

  		}
  		reader.readAsDataURL(file);
  	}
	function newcatgo()
	{	console.log(document.getElementById('64img'))
		
		 if(document.getElementById("newlogplannam").value&&document.getElementById("newlogplan").value)
        {
            //ajax
            
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() 
            {
                if (this.readyState==4 && this.status==200) 
                {	
                    treptex=this.responseText;
                    if(treptex)
        			{
        				document.getElementById("sectypeev").innerHTML+="<li class='catplanadm' onclick=choix('"+treptex+"')><img class='imgliadm' src='Medias/Logos/plan/"+treptex+".png'>"+treptex+"</li>";
        				document.getElementById("selectcat").innerHTML+="<option value='"+treptex+"'>"+treptex+"</option>";
        			}
                    
                }
                
            }
        xmlhttp.open("POST","admin/ajaxadmin.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  		xmlhttp.send("ni="+document.getElementById('64img').value+"&nin="+document.getElementById('newlogplannam').value);
        }

	}
</script>