<?php
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	if(!isset($_GET['ann']))
	{
			$ann=date('Y');
	}
	else
	{
		$ann=$_GET['ann'];
	}
	if(isset($_GET['i']))
	{
		//$ann=date('Y');
		$sem=$_GET['i'];
		
			
	}
	else
	{
		$sem=date('W')-1;		
	}
	if($sem==0 || $sem==53)
	{

		if($sem==0)
		{
			$sem=52;/*premiere semaine = 52 */
			$ann--;
			//$q = $db->prepare("SELECT * ,DATE_FORMAT(date, '%w') as 'nsem' FROM `agenda` WHERE DATE_FORMAT(date,'%V')= ".$sem." AND (DATE_FORMAT(date,'%Y')= ".$ann." OR (DATE_FORMAT(date,'%Y')= ".($ann+1).");");
			$q = $db->prepare("SELECT * ,DATE_FORMAT(date, '%w') as 'nsem' FROM `agenda` WHERE DATE_FORMAT(date,'%V')= ".$sem." AND DATE_FORMAT(date,'%Y')= ".$ann.";");
		}
		if($sem==53)
		{
			$sem=1;
			$ann++;
			//$q = $db->prepare("SELECT * ,DATE_FORMAT(date, '%w') as 'nsem' FROM `agenda` WHERE DATE_FORMAT(date,'%V')= ".$sem." AND DATE_FORMAT(date,'%Y')= ".$ann.";");
			$q = $db->prepare("SELECT * ,DATE_FORMAT(date, '%w') as 'nsem' FROM `agenda` WHERE DATE_FORMAT(date,'%V')= ".$sem." AND DATE_FORMAT(date,'%Y')= ".$ann.";");
		}
		
	}
	else
	{
		$q = $db->prepare("SELECT * ,DATE_FORMAT(date, '%w') as 'nsem' FROM `agenda` WHERE DATE_FORMAT(date,'%V')= ".$sem." AND DATE_FORMAT(date,'%Y')= ".$ann.";");
	}

	//var_dump($q);
	//var_dump($ann,$sem);
	echo $ann;
	$q->execute();
	//var_dump($q);
	$rep=$q->fetchAll();
	//var_dump($rep);
	echo "Semaine ".$sem;

?>
<table>
<tr>
	<td></td>
	<td>Dimanche</td>
	<td>Lundi</td>
	<td>Mardi</td>
	<td>Mercredi</td>
	<td>Jeudi</td>
	<td>Vendredi</td>
	<td>Samedi</td>
	
</tr>
<?php
for ($h=0; $h <24 ; $h++) 
{ ?>
	<tr>
		<td class="planh"><?=$h?> h</td>
		<?php
		for ($j=0; $j <7 ; $j++) 
		{ 	?>
			<td>
			<div class="caseplan">

			<?php
			foreach ($rep as $r) 
			{	
				if($r['nsem']==$j&&$r['hdeb']<=$h&&$r['hfin']>$h)
				{
					if ($r['type']==1) 
					{
						$col="pink";
						$type="mixte";
					}
					else
					{
						$col="cyan";
						$type="non mixte";
					}
				?>
				<div onclick="fichEv(this)" class="rdv" style="background-color:<?=$col?>;">
					     <?=$r['titre']?>
					     <div class="fich-ev" hidden=true>
					     	<h1><?=$r['titre']?></h1>
					     	<p>debut : <?=$r['hdeb']."h".$r['mdeb']?></p>
					     	<p>fin : <?=$r['hfin']."h".$r['mfin']?></p>
					     	<p>lieu : <?=$r['lieu']?></p>
					     	<p>description : <?=$r['description']?></p>
					     	<p>type : <?=$type?></p>
					     	<button onclick="retfichEv(this)" class="ret-plan">Retour</button>
					     	<?php
					     	if(isset($_SESSION['admstat'])&&$_SESSION['admstat'] <= 1)
					     	{
					     		?>
					     	<form method="post">
					     		<button name="evsup" type="submit" value="<?=$r['id']?>">suprimer</button>
					     	</form>
					     		<?php
					     	}
					     	?>
					     </div>

				</div>
				<?php
				}
			}
			?>
			</td>
			</div>
			<?php
			
		}
		?>
	</tr>
	<?php
}
?>
</table>

<div id="planbutt">
	<button id="butplanp" onclick="changplan(<?=$sem?>-1,<?=$ann?>)">précédent</button>
	<button id="butplans" onclick="changplan(<?=$sem?>+1,<?=$ann?>)">suivant</button>
</div>	


<script type="text/javascript">
	function changplan(i,ann) 
	{
		httpRequest = new XMLHttpRequest();
			  httpRequest.onreadystatechange = function() 
  			{
      			document.getElementById("plan").innerHTML = this.responseText;
  			};
  			httpRequest.open("GET","planning.php?i="+i+"&ann="+ann);
  			httpRequest.send();
	}
	function fichEv(elmnt)
	{
		ress=elmnt.children[0];
		ress.hidden=false;
	}
	function retfichEv(elmnt)
	{
		ress=elmnt.parentElement;
		ress.style.display="none";
		console.log(ress);
	}	
</script>