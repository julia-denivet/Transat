<?php
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	/*Verifier si une date (moi et année ) on été passer dans url(bouton suivant et précédent*/
	if(!isset($_GET['moi'])||!isset($_GET['ann']))
	{	
		/*si pas de date on prend la date actuelle de l'année et le mois (en chifre et en lettre)*/
		$ann=date("Y");
		$moi=date("n");
		$moii=date("m");
	}
	else
	{
		/*sinon on recupere la date transmise dans l'url */
		$ann=$_GET['ann'];
		$moi=$_GET['moi'];
		/*le javascrip ne gerant pas les dates il faut coriger en php les ereurs potentielle exemple il n'y a pas de 0 eme mois ou de 13 eme mois*/
		switch ($moi) {
			case 0:
				$moi=12;
				$ann--;
				break;
			case 13:
				$moi=1;
				$ann++;
				break;
			default:
				$ann=$_GET['ann'];
				$moi=$_GET['moi'];
				break;
		}
		$moii=$moi;
		if(strlen($moii)==1) 
		{
			/*par securité une derniere corection est àporté affin d'eviter les probleme de convestion sans les 0 initiaux l 42*/
			$moii="0".$moii;
		}
		//var_dump($moii);
	} 
	$q = $db->prepare("SELECT * ,DATE_FORMAT(date,'%e') as jr FROM `agenda` WHERE DATE_FORMAT(date,'%m') = ".$moi." AND DATE_FORMAT(date,'%Y') = ".$ann.";");
	
	
	$jourdepart=date('w',strtotime($ann."-".$moii."-01"));/*trouve le premier jour du mois*/
	setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
	$nommoi=(strftime("%B",strtotime($ann."-".$moii."-01"))); 
	if($jourdepart==0){$jourdepart=7;}
	//var_dump($jourdepart);
?>

<div class="flex_calendrier_transat">
	<?php
	 echo "<h1 class='h1_calendrier_transat pasindex' id='annee_transat'>".$ann."</h1>";
	 $q->execute();
	 //var_dump($q);
	 $rep=$q->fetchAll();
	//var_dump($rep); ?>
	<div class="tableau_button_transat">

		<table class="planning_transat">
			<thead>
				<tr id="planning_header_jours">
					<td><b>L</b><b class="pasindex">undi</b></td>
					<td><b>M</b><b class="pasindex">ardi</b></td>
					<td><b>M</b><b class="pasindex">ercredi</b></td>
					<td><b>J</b><b class="pasindex">eudi</b></td>
					<td><b>V</b><b class="pasindex">endredi</b></td>
					<td><b>S</b><b class="pasindex">amedi</b></td>
					<td><b>D</b><b class="pasindex">imanche</b></td>
				</tr>
			</thead>
			<tbody>
				<?php
					$testmoi=false;
					$end=false;
					for ($h=0; $h <6 ; $h++) 
				{ 	?>
				<tr>
				<?php
					for ($j=1; $j <8 ; $j++) 
					{ 	

						if($jourdepart==$j&&$testmoi===false)
						{
							$testmoi=true;
							
							$numjour=1;
						}

						?>
						<td class="cel-cal">
						
						<?php 
							if($testmoi===true)
							{
								?>	<div class="caseplan">
									<p><?=$numjour?></p>
								<?php
								$numjour++;
								if(!checkdate($moi,$numjour,$ann))
								{
									$testmoi=false;
									$end=true;
								}
							}
							else
							{
								?><div hidden="true"><?php
							}
						?>

						<?php
						//var_dump($testmoi);
						foreach ($rep as $r) 
						{	
							if(isset($numjour)&&$r['jr']==($numjour-1))
							{
								if ($r['type']==1) 
								{
									$col="whitesmoke";
									$type="mixte";
								}
								else
								{
									$col="linear-gradient(90deg, rgba(91,206,250,1) 14%, rgba(248,198,207,1) 42%, rgba(91,206,250,1) 97%)";
									$type="non mixte";
								}
							?>
							<div onclick="fichEv(this)" class="rdv" style="background:<?=$col?>; border-radius:5px; ">
									<img class="type-ev" src="Medias/Logos/plan/<?=$r['cat']?>.png">
									<p><?=$r['titre']?></p>
									<div class="fich-ev" style="display: none;">
										<h1><?=$r['titre']?></h1>
										<p>debut : <?=$r['hdeb']."h".$r['mdeb']?></p>
										<p>fin : <?=$r['hfin']."h".$r['mfin']?></p>
										<p>lieu : <?=$r['lieu']?></p>
										<p>description : <?=$r['description']?></p>
										<p>type : <?=$type?></p>
										<button onclick="retfichEv(this)" class="ret-plan btn">Retour</button>
										<?php
										if(isset($_SESSION['admstat'])&&$_SESSION['admstat'] <= 1&&isset($_GET['plan']))
										{
											?>
										<form method="post">
											<button  name="evsup" type="submit" value="<?=$r['id']?>">supprimer</button>
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
						<?php if($end===true){break;} ?>
						</div>
						<?php
						
					}
					?>
				</tr>
				<?php
				if($end===true){break;}
			}
			?>
			</tbody>


		</table>
		<div id="planbutt" class="button_flex_planning">
		
			<button id="butplanp" class="button_precedent " onclick="changplan(<?=$moi-1?>,<?=$ann?>)">précédent</button>
		
		
			<button id="butplans" class="button_suivant " onclick="changplan(<?=$moi+1?>,<?=$ann?>)">suivant</button>
			
		</div>	
	</div>
	
	<h1 class='h1_calendrier_transat pasindex'><?=utf8_encode ($nommoi)?></h1>

</div>



<script type="text/javascript">
	function changplan(i,ann) 
	{
		httpRequest = new XMLHttpRequest();
			  httpRequest.onreadystatechange = function() 
  			{
      			document.getElementById("plan").innerHTML = this.responseText;
  			};
  			httpRequest.open("GET","planning.php?moi="+i+"&ann="+ann);
  			httpRequest.send();
	}
	function fichEv(elmnt)
	{	
		ress=elmnt.children[2];
		ress.style.display='flex';
		
		ress.className='fich-ev';
	}
	function retfichEv(elmnt)
	{
		fich=elmnt.parentElement;
		console.log(fich);
		fich.style.display='none';
		console.log(fich);
		fich.hidden=true;
		console.log(fich);
		/*
		ress.hidden=false;
		console.log(ress);
		*/

	}	
</script>