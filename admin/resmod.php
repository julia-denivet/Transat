<?php 
if(isset($_POST['modres']))
{
	$linkbd = mysqli_connect("localhost","root","","transat");
	$_POST['titre']=addslashes($_POST['titre']);
		$_POST['res']=addslashes($_POST['res']);
	$sql="UPDATE `ressources` SET `titre` = '".$_POST['titre']."', `date` = NOW(), `categorie` = '".$_POST['catres']."', `article` = '".$_POST['res']."' WHERE `ressources`.`id` =".$_POST['modres']." ;";
	$a=mysqli_query($linkbd,$sql);
}

if(!isset($_POST['idmod']))
{	$db = new PDO('mysql:host=localhost;dbname=transat;charset=utf8', 'root', '');
	$q = $db->prepare('SELECT * FROM `ressources` ');
	$q->execute();
	$rep=$q->fetchAll();
?>
<ul>
<?php
	foreach ($rep as $r ) 
	{
		?>
		
			<li><?=$r[1];?><form method="post" action="admin.php?res&mod"><button type="submit" value="<?=$r[0]?>"  name="idmod">modifier</button></form></li>
		<?php
			
	}
?>
</ul>
<?php 
}
else
{
	$linkbd = mysqli_connect("localhost","root","","transat");
	$sql="SELECT * FROM `ressources` WHERE id=".$_POST['idmod']."";
	$a=mysqli_query($linkbd,$sql);
	$res=mysqli_fetch_row($a);
?>
<form method="post" action="admin.php?res&mod">
	<label>titre</label><input type="text" value="<?=$res[1]?>" name="titre">
	<select name="catres">
		<option>juridique</option>
		<option>medical</option>
	</select>
		 
	




	<div class="editor-commands">
    <ul>
        <li><a data-command="undo">Annuler</a></li>
        <li><a data-command="redo">Répéter</a></li>
        <li><a data-command="insertHorizontalRule">hr</a></li>
        <li><a data-command="bold">Gras</a></li>
        <li><a data-command="italic">Italic</a></li>
        <li><a data-command="underline">Souligner</a></li>
        <li><a data-command="strikeThrough">Barrer</a></li>
        <li><a data-command="justifyLeft">Justifier gauche</a></li>
        <li><a data-command="justifyCenter">Justifier centre</a></li>
        <li><a data-command="justifyRight">Justifier droite</a></li>
        <li><a data-command="justifyFull">Justifier completement</a></li>
        <li><a data-command="indent">indenté</a></li>
        <li><a data-command="outdent">outdent</a></li>
        <li><a data-command="insertUnorderedList">Liste a puce</a></li>
        <li><a data-command="insertOrderedList">Liste ordoné</a></li>
        <li><a data-command="html" data-command-argument="h1">titre 1</a></li>
        <li><a data-command="html" data-command-argument="h2">titre 2</a></li>
        <li><a data-command="html" data-command-argument="h3">titre 3</a></li>
        <li><a data-command="html" data-command-argument="p">Paragraphe</a></li>
        <li><a data-command="subscript">indice</a></li>
        <li><a data-command="superscript">Exposant</a></li>
    </ul>
</div>
<div id="Editor"  name="res" class="editor" contenteditable="true"><?=$res[5]?></div>

<input id="textzone" type="hidden"  name="res">
	<button type="submit" name="modres" value="<?=$res[0]?>">modifier</button>
</form>
<script type="text/javascript">
	textzoneSave();
	document.addEventListener("keyup", textzoneSave);

	function textzoneSave()
	{
		var editor = document.getElementById("Editor").innerHTML;
        
        document.getElementById("textzone").value=editor;
	}

   var commandButtons = document.querySelectorAll(".editor-commands a");
for (var i = 0; i < commandButtons.length; i++) {
    commandButtons[i].addEventListener("mousedown", function (e) {
        e.preventDefault();

       
        var commandName = e.target.getAttribute("data-command");
        if (commandName === "html") {
            var commandArgument = e.target.getAttribute("data-command-argument");
            document.execCommand('formatBlock', false, commandArgument);
            textzoneSave();
        } else {
            document.execCommand(commandName, false);
            textzoneSave();
        }
       

    }); 
    
}

</script>
<style type="text/css">
.editor {
    min-height: 300px;
    width: 100%;
    border: 1px solid black;
}
.editor-commands>ul
{
   list-style-type:none;  
   display: flex;
   width: 100%;
   justify-content: space-around;
}
.editor-commands>ul>li
{   

}

</style>
<?php
}
?>