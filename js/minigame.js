/*
======Minigame=======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		16/12/2014
Version:	0.2
*/

var animalPanel = "<div class=\"col-sm-4 animal\">" +
        "<div class=\"panel panel-success\">" +
        "<div class=\"panel-body\">" +
        "<img id=\"animal-img1\" class=\"img-thumbnail center-block img-animal\" alt=\"thumbnail\" src=\"\" data-holder-rendered=\"true\" style=\"width: 200px; height: 200px;\">  " +
        "</div>" +
        "<div class=\"panel-heading\">" +
        "<h3 class=\"panel-title\"></h3>" +
        "</div>" +
        "</div>" +
        "</div>";

var game = new Game();

$(document).ready(function() {
    $("#startGame").click(function() {
        game.start();
    });
}
);
function Game() {
    var localthis = this;
    this.allAnimals = new Array();
    this.animals = new Array();
    this.randAnimal = new Array();
    this.gameDom;
    
    /**Game.start
     * Initialise l'objet Game
     */
    this.start = function() {
        this.loadAnimals();
    };
    
    /**Game.replay
     * Initialise une nouvelle partie
     */
    this.replay = function() {
        this.animals = new Array();
        for (i = 0; i < 3; i++) {
            //Tirage aléatoire d'un animal dans le tableau allAnimals executé 3 fois
            var id = Math.round(Math.random() * (this.allAnimals.length - 1));
            this.animals.push(this.allAnimals[id]);
        }
        //Tirage aléatoire d'un animal parmis les trois
        id = Math.round(Math.random() * (this.animals.length - 1));
        this.randAnimal = this.animals[id];

        //Changement d'écran de jeu
        $('#instructions').hide();
        $('#game').fadeIn();

        //Chargement et initialisation des elements
        this.changeAnimal();
        this.setEvent();
        
        //Chargement du son
        this.loadSound();
    };
    
    /**Game.setEvent
     * Ajoute tout les evenements sur les différents elements de la page
     */
    this.setEvent = function() {
        $("#dropzone").on("drop", function(event) {
            event.preventDefault();
            var data = '#' + event.originalEvent.dataTransfer.getData("text");
            event.target.appendChild($(data).get(0));//Récupération du node avec get(0)
            localthis.eventOff();
            localthis.checkAnimal($(data).data("id"));
        }).on("dragover", function(event) {
            event.preventDefault();
        }).children().on("dragover", function(event) {//Evite 
            event.stopPropagation();
        });

        $('#replaySound').click(function() {
            localthis.playSound();
        });

        $('.replay').click(function() {
            localthis.replay();
            //$(".animal").remove();
            $("#dropzone").children().remove();

            $("#victory, #defeat").hide();
        });
    };
    
    /**Game.setEvent
     * Retire tout les evenements des différents elements de la page
     */
    this.eventOff = function() {
        $("#dropzone").off();
        $(".animal").off();
    }
    
    /**Game.loadSound
     * Change le fichier source de la balise audio
     */
    this.loadSound = function() {
        var audio = $("#game > audio");
        $("#game > audio").attr("src", this.randAnimal.sound);
        this.playSound();
    };
    
    /**Game.playSound
     * Joue le son de l'animal
     */
    this.playSound = function() {
        var audio = $("#game > audio");
        audio.trigger("play");
    }
    
    /**Game.checkAnimal
     * Vérifie la réponse de l'utilisateur
     */
    this.checkAnimal = function(id) {
        //Affiche le message de victoire ou de defaite
        if (id == this.randAnimal.id) {
            $("#victory").show();
        } else {
            $("#defeat").show();
        }
    };
    
    /**Game.changeAnimal
     * Met à jour les nouveaux animaux de la page
     */
    this.changeAnimal = function() {
        $(".animal").remove();//Suppresion des anciens panel d'animaux
        for (i = 0; i < 3; i++) {
            //Création des nouveaux panel d'animaux
            var element = $(animalPanel).clone();
            $(element).attr("id", "animal" + i).appendTo("#animals");
            //Definission 
            element.find(".panel-body > img").attr("src", this.animals[i].img).attr("id", "imgAnimal"+i);
            element.find(".panel-body > img").data("id", this.animals[i].id);
            element.find(".panel-heading > h3").text(this.animals[i].name);

            //Ajout d'evenement au commencement du deplacement de l'element
            element.find("img").bind("dragstart", function(event) {
                event.originalEvent.dataTransfer.setData("text", event.target.id);
            });
        }
    };

    /**Game.loadAnimals
     * Recupere la liste des animaux dans la bdd
     */
    this.loadAnimals = function() {
        var xhr = new XMLHttpRequest();
        var url = $("#startGame").attr('data-url');//Récupération de l'url
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send();
        xhr.onreadystatechange = function(event) {
            if (xhr.readyState === 4) {
                localthis.ready = true;
                localthis.allAnimals = JSON.parse(event.target.responseText);
                localthis.replay();
            }
        };
    };
}