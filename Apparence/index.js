function autocompletiontransat(valeur) 
{
    console.log(valeur);
    v=valeur;

    if (v=='0') 
    {
        vartext=window.document.getElementById('autotransat').value ; 
    }
    
    console.log(vartext);

    httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function()
        {
            if (v=='0') 
            {
                document.getElementById("datatransat").innerHTML = this.responseText;
            }

        };

        httpRequest.open("GET","option.php?srt="+vartext);
        httpRequest.send();
}