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
<div id="choiximg" hidden="true">
    <p>inserer une image</p>
    <label>url</label>
    <input type="text" name="imgurl" id="imgurl">
    <label>ou</label>
    <input type="file" onchange="encodeImageFileAsURL(this)" name="imgfile" id="imgfile">
    <input type="text" id="64img" hidden="true">    
    <b id="inserimg">inserer</b>
</div>
<div id="sizeimg" hidden="true">
    <label>redimentioner l'image</label>
    <label>largeur</label>
    <input type="number" id="wdth" name="wdth">
    <label>longueur</label>
    <input type="number" id="hght" name="hght">
    <b id="modimg">modifier</b>
</div>
<form id="formarticle" method="post" action="admin.php?art&new">
	<label>titre</label><input type="text" name="titre">
	<div class="editor-commands">
    <ul>
        <li><a data-command="insertimage">Image</a></li>
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
        <li><a data-command="indent">Indenté</a></li>
        <li><a data-command="outdent">Outdent</a></li>
        <li><a data-command="insertUnorderedList">Liste à puce</a></li>
        <li><a data-command="insertOrderedList">Liste ordoné</a></li>
        <li><a data-command="html" data-command-argument="h1">titre 1</a></li>
        <li><a data-command="html" data-command-argument="h2">titre 2</a></li>
        <li><a data-command="html" data-command-argument="h3">titre 3</a></li>
        <li><a data-command="html" data-command-argument="p">Paragraphe</a></li>
        <li><a data-command="subscript">Indice</a></li>
        <li><a data-command="superscript">Exposant</a></li>
    </ul>
    </div>
    <div id="Editor" class="editor" contenteditable="true"></div>
    <input id="textzone"   name="art" value="">

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
//command pour menu
   var commandButtons = document.querySelectorAll(".editor-commands a");
for (var i = 0; i < commandButtons.length; i++) 
{
    commandButtons[i].addEventListener("mousedown", function (e) {
        e.preventDefault();

       
        var commandName = e.target.getAttribute("data-command");
        if (commandName === "html") 
        {
            var commandArgument = e.target.getAttribute("data-command-argument");
            document.execCommand('formatBlock', false, commandArgument);
            textzoneSave();
        } 
        else 
        {
            if(commandName=="insertimage")
            {
                document.getElementById('choiximg').hidden=false;
                document.getElementById('inserimg').onclick = function()
                { 

                   if(document.getElementById('imgurl').value)
                    {
                         document.getElementById('Editor').innerHTML+="<img onclick ='sizeimg(this)' width='100vw' height='100vh' src="+document.getElementById('imgurl').value+">";
                        textzoneSave();
                        document.getElementById('choiximg').hidden=true;
                    }
                    if(document.getElementById('imgfile').value)
                    {
                        console.log(document.getElementById('64img').value)
                        encodeImageFileAsURL(document.getElementById('imgfile'))
                        console.log(document.getElementById('64img').value)
                        //ajax
                        xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function() 
                        {
                            if (this.readyState==4 && this.status==200) 
                            {   
                                treptex=this.responseText;
                                if(treptex)
                                {
                                   
                                     document.getElementById('Editor').innerHTML+="<img onclick ='sizeimg(this)' width='100vw' height='100vh' src="+treptex+">";
                                        textzoneSave();
                                        document.getElementById('choiximg').hidden=true;
                                    
                                }
                    
                            }
                
                        }
                        xmlhttp.open("POST","admin/ajaxadmin.php",true);
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.send("img="+document.getElementById('64img').value);
                        //finajax

                    }
                }  
            }
            else
            {
                document.execCommand(commandName, false);
                textzoneSave();  
            }
        }
       

    }); 
    
}

function sizeimg(x)
{
    document.getElementById('sizeimg').hidden=false;
    document.getElementById('wdth').value=Math.round(vw(x.offsetWidth));
    document.getElementById('hght').value=Math.round(vh(x.offsetHeight));
    document.getElementById('modimg').onclick= function()
    {
        x.style.height=document.getElementById('hght').value+"vh";
        x.style.width=document.getElementById('wdth').value+"vw";
        document.getElementById('sizeimg').hidden=true;
    }
}
function encodeImageFileAsURL(element) 
{
    file = element.files[0];
    reader = new FileReader();
    reader.onload = function() 
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
function vw(px)
{
    return px * (100 / document.documentElement.clientWidth);
}

function vh(px) 
{
    return px * (100 / document.documentElement.clientHeight);
}

</script>
