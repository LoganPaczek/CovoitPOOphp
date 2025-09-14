<?php

include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';

$covoitUser = new CovoitUser(59,"Doe","John", "555-555", "test@gmail.com", "5ecuri+Y");
var_dump($covoitUser->getId());
$covoitUser->setId(5);
var_dump($covoitUser->getId());
 
var_dump($covoitUser->getNom());
$covoitUser->setNom("Hal");
var_dump($covoitUser->getNom());

var_dump($covoitUser->getPrenom());
$covoitUser->setPrenom("Mike");
var_dump($covoitUser->getPrenom());

var_dump($covoitUser->getTel());
$covoitUser->setTel("0856964542");
var_dump($covoitUser->getTel());

var_dump($covoitUser->getMail());
$covoitUser->setMail("admin@test.com");
var_dump($covoitUser->getMail());

var_dump($covoitUser->getMdp());
$covoitUser->setMdp("supersecret");
var_dump($covoitUser->getMdp());
?>