<?php
/*
======Crud Animal=======
Auteur: 	Oliveira Stéphane & Seemuller Julien
Classe: 	I.IN-P4B
Date:		25/11/2014
Version:	1
Description:    Fichier de test des fonctions du crud animal
*/
require_once '../includes/specific_funtions.php';
if (!isConnected()){
    header("location: ../index.php");
	exit;
}

echo 'Count not pending: ';
debug(countAnimals());
echo PHP_EOL."Count pending: ";
debug(countAnimalsPending());

echo 'Get (id=1):'.PHP_EOL;
debug(getAnimalById(1));

echo 'Add'.PHP_EOL;
$id= addAnimal('test1', 'soussdsad', 'dsadasfjdsfjslfg');
echo $id.PHP_EOL;

echo "Show just Add (id=$id)".PHP_EOL;
debug(getAnimalById($id));

echo "Update (id=$id) name=chat:".PHP_EOL;
updateAnimal($id, "chat", 'img', 'dsad', false);
debug(getAnimalById($id));

echo "Delete (id=$id)".PHP_EOL;
debug(deleteAnimalById($id));

echo "Show just Delete (id=$id)".PHP_EOL;
debug(getAnimalById($id));

echo 'Pagination page 0 animaux validés'.PHP_EOL;
debug(getPageAnimals(0));
echo 'Pagination page 0 animaux en attente'.PHP_EOL;
debug(getPageAnimalsPending(0));
