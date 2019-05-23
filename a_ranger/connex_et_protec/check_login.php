<?php
include("BDD.php"); //connexion bdd
// démarre la session
//session_start (); (déjà rajouté dans le fichier "BDD.php")
/* ***************************************************** */
$username = $_POST['User_Pseudo'];
$password = sha1($_POST['User_Password']); //sha1 = cryptage via phpmyadmin !!!
$sql = "select * from users WHERE User_Pseudo = '$User_Pseudo'";
$resultat = $conn->query($sql);
$utilisateur = $resultat->fetch_assoc();

    // test si les variables sont définies
    if (!empty($_POST['User_Pseudo']) && !empty($_POST['User_Password'])) {

    	// vérifie les informations du formulaire, (pseudo & password saisi est bien autorisé)
    	if (isset($utilisateur['User_Pseudo']))
        {
    	    if ($password == $utilisateur['User_Password']) {
                // dans ce cas, tout est ok, on peut démarrer notre session

                // Démarre la session
                session_start();
                // enregistre les paramètres du visiteur comme variables de session
                $_SESSION['User_Pseudo'] = $_POST['User_Pseudo'];
                $_SESSION['User_Password'] = $_POST['User_Password'];

                // redirige le visiteur vers une page de notre section membre
                header('location: Panel_Admin/');
            }
    	    else
            {
                //echo 'mot de passe non reconnu...<br>redirection automatique dans 5 secondes';

                echo '<br>mot de passe non reconnu...<br><br>redirection automatique dans 5 secondes';

                header( "refresh:3;url=login.php" );
            }
    	}
    	else {
    		// visiteur non reconnu comme étant membre du site.
    		echo '<body onLoad="alert(\'Dsl, Membre non reconnu...\')">';
    		// redirige vers la page login
    		echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    	}
    }
    else {
    	echo 'Les variables du formulaire ne sont pas déclarées.';
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div class="pwd"></div>

</body>
</html>