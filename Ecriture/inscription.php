<?php
/**
 * Created by PhpStorm.
 * User: David.P - UpTo Fourmies 2019
 * Date: 15/04/2019
 * Time: 14:36
 */

/* ********************* Connexion Base De Données ********************* */
require_once(__DIR__.'/../Controller/BDD.php');

/* ************************************************************************** */
/* ------------- code insertion  ------------- */

/* -------- déclaration des variables --------- */
$NouvelUser = $_POST['inscription'];
$NouvelUser = filter_var($NouvelUser, FILTER_SANITIZE_STRING);

/* --------------------- inscription ---------------------------- */
// TOdo : verifier qu'un film doit etre inséré
if(isset($NouvelUser))
{
    $varNouvelUser = $conn->prepare("INSERT INTO `users` (`User_Nom`, `User_Prenom`, `User_Pseudo`, `User_Age`, `User_Password`, `User_Mail`, `User_Avatar`) VALUES (?,?,?,?,?,?,?)");
    $varNouvelUser->bind_param("sssssss", $NouvelUser);
    $varNouvelUser->execute();
    $varNouvelUser->close();
}
