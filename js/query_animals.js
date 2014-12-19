/*
======QueryAnimals=======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		9/12/2014
Version:	1
Description:    Script contenant les fonctions permettant de récuperer les 
                animaux et les afficher pour la pagination
*/

$(document).ready(function() {

    $("#showmore").click(function() {
        var xhr = new XMLHttpRequest();
        var params = "next=";
        var url = $(this).attr('data-url');

        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //xhr.setRequestHeader("Content-length", params.length);
        //xhr.setRequestHeader("Connection", "close");
        xhr.send(params);
        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === 4) {
                $("#animal-container").append(event.target.responseText);
                AddClickEvent();
            }
        };
    });
});