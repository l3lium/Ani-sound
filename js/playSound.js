/*
======PlaySound=======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		9/12/2014
Version:	1
Description:    Script contenant les fonctions permettant de jouer le son des animaux
*/

$(document).ready(function() {
    AddClickEvent();      
});

function AddClickEvent(){
    $('.img-animal').click(function(){
        $(this).parent().children('audio').trigger("play");
    });    
}