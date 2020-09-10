<?php 
	if(isset($_POST['art']))
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
		$_POST['art']=addslashes($_POST['art']);
		$sql="INSERT INTO `article` (`id`,`titre`,`id_admin`, `date`,`article`,`type`,`mot`) VALUES (NULL,'".$_POST['titre']."', '".$_SESSION['admid']."', NOW(), '".$_POST['art']."','".$type."','".$_POST['motcle']."');";
		$a=mysqli_query($linkbd,$sql);
	}
	//var_dump($_POST);
    $mot=motcle();
?>
<form method="post" action="admin.php?art&new">
	<label>titre</label><input type="text" name="titre">
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

<input id="textzone" type="hidden"  name="art" value="">

    <input type="checkbox" name="S">
    <label>Santé</label>
    <input type="checkbox" name="T">
    <label>Transgenre</label>
    <input type="checkbox" name="P">
    <label>Proche</label>
    <input type="checkbox" name="A">
    <label>Autre</label>
	<input type="submit" name="newres">
    <div id="motcleadm">
        <label>mots-clées</label>
        <input id="recupmot" type="hidden" name="motcle" value="">
        <?php
        foreach ($mot as $m) 
        {
        ?>
        <label id="<?=$m['id']?>" onclick="ajmot(<?=$m['id']?>)"><?=$m['mot']?></label>
        <?php
        }
        
        
        ?>
        
    </div>
    <input type="text" id="newmot">
    <b onclick="newmocle()">ajouter mot clé</b>
</form>
<script type="text/javascript">
	document.addEventListener("keyup", textzoneSave);
    function ajmot(id)
    {   
        if(document.getElementById(id).value==undefined||document.getElementById(id).value==false)
        {   
            document.getElementById(id).value=true;
            document.getElementById("recupmot").value+=id+"!!";
            document.getElementById(id).classList.add("motselec");
        }
        else
        {   
            document.getElementById(id).classList.remove("motselec");
            document.getElementById(id).value=false;
            str=document.getElementById("recupmot").value.split("!!");
            console.log(str);
            document.getElementById("recupmot").value="";
            for (var i = str.length - 1; i >= 0; i--) 
            {
                if(str[i]==id||str[i]=="")
                {}
                else
                {
                    document.getElementById("recupmot").value+=str[i]+"!!";
                }               
            }
        }

        console.log(document.getElementById("recupmot"));
        console.log(document.getElementById(id).value);
    }
    
    function newmocle()
    {   
        if(document.getElementById("newmot").value)
        {
            //ajax
            xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() 
            {
                if (this.readyState==4 && this.status==200) 
                {
                    idmocl=this.responseText;
                    document.getElementById("motcleadm").innerHTML+="<label id='"+idmocl+"' onclick='ajmot("+idmocl+")''>"+document.getElementById("newmot").value+"</label>";
                }
            }
        xmlhttp.open("GET","admin/ajaxadmin.php?nm="+document.getElementById("newmot").value,true);
        xmlhttp.send();
        }
    }

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