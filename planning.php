<?php
	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	
	if(isset($_GET['A']) && isset($_GET['M']))
	{
		$q = $db->prepare('SELECT * FROM `agenda` ;');
	}
	else
	{
		$ann=date('Y');
		$moi=date('m');
		$sem=date('W');
		$q = $db->prepare("SELECT * ,DATE_FORMAT(date, '%w') as 'nsem' FROM `agenda` WHERE DATE_FORMAT(date,'%U')= ? ");

		

	}
	$q->execute(array($sem));
	$rep=$q->fetchAll();
	

?>
<table>
<tr>
	<td>*****</td>
	<td>Lundi</td>
	<td>Mardi</td>
	<td>Mercredi</td>
	<td>Jeudi</td>
	<td>Vendredi</td>
	<td>Samedi</td>
	<td>Dimanche</td>
</tr>
<?php
for ($h=0; $h <24 ; $h++) 
{ ?>
	<tr>
		<td><?=$h?></td>
		<?php
		for ($j=0; $j <7 ; $j++) 
		{ 

			?>
			<td><?=$j?></td>
			<?php
			
		}
		?>
	</tr>
	<?php
}
?>
</table>