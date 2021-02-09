<?php 

// Récup des informations dans le formulaire partie client

if(isset($_POST['nom']) && isset($_POST['prenom']) &&  isset($_POST['tel']) &&  isset($_POST['adresse']) ){

    require('db.php');

    $nom        = ($_POST['nom']);
    $prenom     = ($_POST['prenom']);
    $tel        = ($_POST['tel']);
    $adresse    = ($_POST['adresse']);

 // insert les clients dans la BDD   
    $req = $db->prepare('INSERT INTO client(id_clt,nom, prenom, tel, adresse) VALUES (?,?,?,?,?) ');
    $req->execute(array(NULL,$nom, $prenom, $tel, $adresse)); 

}

?>