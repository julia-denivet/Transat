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
					<td class="pasindex"></td>
					<td><b>D</b><b class="pasindex">imanche</b></td>
					<td><b>L</b><b class="pasindex">undi</b></td>
					<td><b>M</b><b class="pasindex">ardi</b></td>
					<td><b>M</b><b class="pasindex">ercredi</b></td>
					<td><b>J</b><b class="pasindex">eudi</b></td>
					<td><b>V</b><b class="pasindex">endredi</b></td>
					<td><b>S</b><b class="pasindex">amedi</b></td>
				</tr>
			</thead>
			<tbody>
				<?php
					for ($h=0; $h <24 ; $h++) 
				{ 	?>
				<tr>
					<td class="planh pasindex"><?=$h?> h</td>
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
									$col="whitesmoke";
									$type="mixte";
								}
								else
								{
									$col="linear-gradient(90deg, rgba(91,206,250,1) 14%, rgba(248,198,207,1) 42%, rgba(91,206,250,1) 97%)";
									$type="non mixte";
								}
							?>
							<div onclick="fichEv(this)" class="rdv" style="background:<?=$col?>; border-radius:5px;">
									<?=$r['titre']?>
									<div class="fich-ev" hidden=true>
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
						</div>
						<?php
						
					}
					?>
				</tr>
				<?php
			}
			?>
			</tbody>


		</table>
		<div id="planbutt" class="button_flex_planning">
		
			<button id="butplanp" class="button_precedent btn" onclick="changplan(<?=$sem?>-1,<?=$ann?>)">précédent</button>
		
		
			<button id="butplans" class="button_suivant btn" onclick="changplan(<?=$sem?>+1,<?=$ann?>)">suivant</button>
			
	</div>	
	</div>
	
	<?php echo "<h1 class='h1_calendrier_transat pasindex'>Semaine ".$sem."<h1>"; ?>

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