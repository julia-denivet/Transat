<?php 
	if(isset($_POST['res']))
	{   
        $type='';
        if(isset($_POST['S']))
        {
            $type.="S";
        }
        if(isset($_POST['T']))
        {
            $type.="T";
        }
        if(isset($_POST['P']))
        {
            $type.="P";
        }
        if(isset($_POST['A']))
        {
            $type.="A";
        }
        
		$linkbd = mysqli_connect("localhost","root","","transat");
		$_POST['titre']=addslashes($_POST['titre']);
		$_POST['res']=addslashes($_POST['res']);
		$sql="INSERT INTO `ressources` (`id`,`titre`,`id_admin`, `date`, `categorie`, `article`,`type`) VALUES (NULL,'".$_POST['titre']."', '".$_SESSION['admid']."', NOW(), '".$_POST['catres']."', '".$_POST['res']."','".$type."');";
		$a=mysqli_query($linkbd,$sql);
	    if(isset($_FILES['pdf']))
        {
            $sql="SELECT id FROM ressources WHERE article='".$_POST['res']."' AND titre='".$_POST['titre']."';";
            $nom=mysqli_query($linkbd,$sql);
            $nompdf=mysqli_fetch_all($nom)[0][0];
            ajoures($nompdf);
        }
    }
	
    
?>
<form method="post" action="admin.php?res&new" enctype="multipart/form-data">
	<label>titre</label><input type="text" name="titre">
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
<div id="Editor" class="editor" contenteditable="true"></div>

    <input id="textzone" type="hidden"  name="res" value=''>
    <label>Reçource(pdf)</label>
    <input type="file" name="pdf" accept=".pdf">
    <input type="checkbox" name="S">
    <label>Santé</label>
    <input type="checkbox" name="T">
    <label>Transgenre</label>
    <input type="checkbox" name="P">
    <label>Proche</label>
    <input type="checkbox" name="A">
    <label>Autre</label>
	<input type="submit" name="newres">
</form>
<script type="text/javascript">
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