<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 25/03/2019
 * Time: 14:36
 */

/* ********************* Connexion Base De Données ********************* */
require_once "../BDD.php";

/* ************************************************************************** */
/* ------------- code insertion  ------------- */

/* -------- déclaration des variables --------- */
$utilisateurs = $_POST['nouveauUtilisateur'];
$utilisateurs = filter_var($utilisateurs, FILTER_SANITIZE_STRING);

/* --------------------- Films ---------------------------- */
// TOdo : verifier qu'un film doit etre inséré
if(isset($utilisateurs))
{
    $varUtilisateur = $conn->prepare("INSERT INTO `users` (`nom`) VALUES (?)");
    $varUtilisateur->bind_param("s", $utilisateurs);
    $varUtilisateur->execute();
    $varUtilisateur->close();
}
