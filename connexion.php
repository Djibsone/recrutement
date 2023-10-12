<?php
session_start();
//Connexion à la base de données
function dbConnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=recrutementdb;charset=utf8', 'djibril', 'tamou');
        return $db;
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}


/*====================== POUR LES Candidats ===================*/
//Récupérer tous les users
function getAllCandidats(){
    $db = dbConnect();

    $req = $db->query('SELECT * FROM cvs ORDER BY id DESC');
    $req->execute();
    return $req;
}

// Récuếrer un user en fction de l'id
function getCandidatInfo($id){
    $db = dbConnect();

    $req = $db->prepare("SELECT * FROM cvs WHERE id = ?");
    $req->execute(array($id));
    return $req;
}

//Récupérer un user
function getCandidat($email){
    $db = dbConnect();

    $req = $db->prepare('SELECT * FROM cvs WHERE email = ?');
    $req->execute(array($email));
    return $req;
}

//Ajouter un usr
function addCandidat($nom, $prenom, $email, $telephone, $niveau_etude, $fichier){
    $db = dbConnect();

    $req = $db->prepare('INSERT INTO cvs VALUES(null,?,?,?,?,?,?)');

    if($req->execute(array($nom, $prenom, $email, $telephone, $niveau_etude, $fichier)))
        return true;
    else
        return false;
}

//Compter le nombre de user
function countCandidats() {
    $db = dbConnect();

    $req = $db->query('SELECT COUNT(*) AS total_cvs FROM cvs');
    $result = $req->fetch(PDO::FETCH_ASSOC);
    return $result['total_cvs'];
}

//Supprimer l'nfos user
function delCandidat($id){
    $db = dbConnect();

    $req = $db->prepare('DELETE FROM cvs WHERE id = ?');

    if($req->execute(array($id)))
        return true;
    else
        return false;
}

//Modifier un info user
function updateCandidat($nom, $prenom, $email, $telephone, $niveau_etude, $fichier, $id){
    $db = dbConnect();

    $req = $db->prepare('UPDATE cvs SET nom = ?, prenom = ?, email = ?, telephone = ?, niveau_etude = ?, fichier = ? WHERE id = ?');

    if($req->execute(array($nom, $prenom, $email, $telephone, $niveau_etude, $fichier, $id)))
        return true;
    else
        return false;
}

?>