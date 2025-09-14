<?php
include_once '../global/config.php';
include_once '../'.CHEMIN_LIB.'pdo2.php';
include_once '../'.CHEMIN_ENTITY.'CovoitUser.php';
include_once '../modeles/DAOCovoitUser.php';

var_dump(getCovoitUserNom(1));
var_dump(getCovoitUserPrenom(1));
var_dump(getCovoitUserTel(1));
var_dump(getCovoitUserMail(1));
var_dump(getCovoitUserMdp(1));
?>