<?php
include_once '../entity/CovoitUser.php';

function getUnCovoitUser($id){
   	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT nom, prenom, tel, mail, mdp FROM CovoitUser WHERE id = :id");
	$requete->bindValue(':id', $id, PDO::PARAM_INT);
        //Apr�s ex�cution de la requ�te, r�cup�ration d'un objet de la classe CovoitUser
	$requete->setFetchMode(PDO::FETCH_CLASS, 'CovoitUser');
	$requete->execute();
	$unCovoitUser = $requete->fetch();
	  
	$requete->closeCursor();
	return $unCovoitUser;
}

function getLesCovoitUser(){
	$pdo = PDO2::getInstance();
		$requete = $pdo->prepare("SELECT nom, prenom, tel, mail, mdp FROM CovoitUser");
         
        $requete->execute();
         $tab = $requete->fetchAll(PDO::FETCH_CLASS, "CovoitUser");
         $requete->closeCursor();
	 return $tab;
}

function getCovoitUserNom($id){
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT nom FROM CovoitUser WHERE id = :id");
	$requete->bindValue(':id', $id, PDO::PARAM_INT);
		
	$requete->execute();
    $tab = $requete->fetch(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tab ? $tab['nom'] : null;
}

function getCovoitUserPrenom($id){
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT prenom FROM CovoitUser WHERE id = :id");
	$requete->bindValue(':id', $id, PDO::PARAM_INT);
		
	$requete->execute();
    $tab = $requete->fetch(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tab ? $tab['prenom'] : null;
}

function getCovoitUserTel($id){
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT tel FROM CovoitUser WHERE id = :id");
	$requete->bindValue(':id', $id, PDO::PARAM_INT);
		
	$requete->execute();
    $tab = $requete->fetch(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tab ? $tab['tel'] : null;
}

function getCovoitUserMail($id){
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT mail FROM CovoitUser WHERE id = :id");
	$requete->bindValue(':id', $id, PDO::PARAM_INT);
		
	$requete->execute();
    $tab = $requete->fetch(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tab ? $tab['mail'] : null;
}

function getCovoitUserMdp($id){
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT mdp FROM CovoitUser WHERE id = :id");
	$requete->bindValue(':id', $id, PDO::PARAM_INT);
		
	$requete->execute();
    $tab = $requete->fetch(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    return $tab ? $tab['mdp'] : null;
}

function addCovoitUser($unCovoitUser){
   	$pdo = PDO2::getInstance();
	$hash = password_hash($unCovoitUser->getMdp(), PASSWORD_BCRYPT);

	$requete = $pdo->prepare("
	INSERT INTO CovoitUser(nom, prenom, mail, tel, mdp)
	VALUES(:nom, :prenom, :mail, :tel, :mdp)
	");

	$requete->bindValue(":nom", $unCovoitUser->getNom());
	$requete->bindValue(":prenom", $unCovoitUser->getPrenom());
	$requete->bindValue(":mail", $unCovoitUser->getMail());
	$requete->bindValue(":tel", $unCovoitUser->getTel());
	$requete->bindValue(":mdp", $hash);
	
	return $requete->execute();
}

function updateUnCovoitUser($unCovoitUser){
	$pdo = PDO2::getInstance();

	$ancienCovoitUser = getUnCovoitUser($unCovoitUser->getId());

	$champs = [
		"nom" => "getNom",
		"prenom" => "getPrenom",
		"mail" => "getMail",
		"tel" => "getTel",
		"mdp" => "getMdp"
	];
	
	$fieldsToUpdate = [];
	
	foreach ($champs as $colonne => $getter) {
		$nouvelleValeur = $unCovoitUser->$getter();
		$ancienneValeur = $ancienCovoitUser->$getter();
	
		if ($nouvelleValeur !== $ancienneValeur) {
			$fieldsToUpdate[$colonne] = $nouvelleValeur;
		}
	}
	
	if(count($fieldsToUpdate) !== 0){
		$set = [];
		foreach ($fieldsToUpdate as $colonne => $valeur) {
			$set[] = "$colonne = :$colonne";
		}
		$sql = "UPDATE CovoitUser SET " . implode(", ", $set) . " WHERE id = :id";

		$requete = $pdo->prepare($sql);

		foreach ($fieldsToUpdate as $colonne => $valeur) {
			$requete->bindValue(":$colonne", $valeur);
		}

		$requete->bindValue(":id", $unCovoitUser->getId(), PDO::PARAM_INT);

		return $requete->execute();
	}
	
	return $fieldsToUpdate;
}

function deleteUnCovoitUser($id){
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("DELETE from CovoitUser WHERE id = :id");
	$requete->bindValue(':id', $id, PDO::PARAM_INT);
		
    return 	$requete->execute();
}
?>
