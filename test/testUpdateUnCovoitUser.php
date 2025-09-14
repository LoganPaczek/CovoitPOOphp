<?php

include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../modeles/DAOCovoitUser.php';

$covoitUser = new CovoitUser(5, "Nguyen","Emilie", "86955599", "test@gmail.com", "5ecuri+Y");
var_dump(updateUnCovoitUser($covoitUser));
?>