<?php

/* **************** Connexion Base De Données ****************** */
include(__DIR__.'/../Controller/BDD.php'); //connexion bdd
/* ***************************************************** */

/*
if (!empty($_POST['User_Pseudo']) and !empty($_POST['User_Password'])) {
    $donneeJson = '';
    $donneeJson[] = $_GET['User_Pseudo'];
    $donneeJson[] = $_GET['User_Password'];

    echo json_encode($donneeJson);
}*/

// test si les variables sont définies
if (!empty($_POST['User_Pseudo']) && !empty($_POST['User_Password'])) {

    $User_Pseudo = ($_POST['User_Pseudo']) ? filter_var($_POST['User_Pseudo'], FILTER_SANITIZE_STRING) : '';
    $password = sha1($_POST['User_Password']); //sha1 = cryptage via PhpMyAdmin !!!
    $sql = "select * from users WHERE User_Pseudo = '$User_Pseudo' and User_Password = '$password'";
    $resultat = $conn->query($sql);
    $utilisateur = $resultat->fetch_assoc();

    if (!empty($utilisateur) && $utilisateur['User_Id'] > 0) {
        // dans ce cas, tout est ok, on peut démarrer notre session

        // Démarre la session
        session_start();
        // enregistre les paramètres du visiteur comme variables de session
        $_SESSION['User_Id'] = $utilisateur['User_Id'];
        $_SESSION['User_Pseudo'] = $utilisateur['User_Pseudo'];
        $_SESSION['User_Statut'] = $utilisateur['User_Statut'];

        // redirige le visiteur vers une page de notre section membre
        //header('Location: /index.html#!/');

        echo json_encode(array("status"=>"OK"));

    } else {
       // echo '<br>mot de passe non reconnu...<br><br>redirection automatique dans 5 secondes';
       // header("refresh:3;url=connexion.html");
        echo json_encode(array("status"=>"NOK"));
    }
}else {
    die ('echec');
}


