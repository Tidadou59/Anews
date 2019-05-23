<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 27/03/2019
 * Time: 13:06
 */

/* ********************* Connexion Base De Données ********************* */
require_once "../BDD.php";

/* ***************** Affichage du résulat sur la page web ***************** */
    $requete = 'select * from `users` where user_id=0';
    $resultat = $conn->query($requete);
    while($Liste = $resultat->fetch_assoc())
    {
        $utilisateurs[] = $Liste['nom'];
    }
    if ($utilisateurs)
    {
        echo json_encode($utilisateurs);
    }




