<?php

/*
  ======Constantes======
  Auteur: 	Oliveira Stéphane & Seemuller Julien
  Classe: 	I.IN-P4B
  Date:		25/11/2014
  Version:	0.2
  Description:    Script regroupant les constantes necessaire pour les scripts php du site
 */

DEFINE('DB_LOGIN', 'root');
DEFINE('DB_PASS', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'anisound');

DEFINE('NB_PAGINATION', 8);
DEFINE('CONTENT_UPLOAD', 'up-content/');
DEFINE('SOUND_FOLDER', 'sound/animal/');
DEFINE('IMG_FOLDER', 'img/animal/');

DEFINE('ALLOWED_IMAGE_TYPES', serialize( array("image/png", "image/jpeg", "image/gif")));
DEFINE('ALLOWED_SOUND_TYPES', serialize( array("audio/wav", "audio/mp3")));
