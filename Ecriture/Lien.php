<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 25/03/2019
 * Time: 14:36
 */
/* ********************* start connexion ********************* */
session_start();
/* ********************* Connexion Base De Données ********************* */
require_once(__DIR__.'/../Controller/BDD.php');

/* ************************************************************************** */
/* ------------- code insertion  ------------- */

/* -------- déclaration des variables --------- */
/*
$agenda = $_POST['Date'];
$agenda = filter_var($agenda, FILTER_SANITIZE_STRING);

$agenda = $_POST['Lieu'];
$agenda = filter_var($agenda, FILTER_SANITIZE_STRING);

$agenda = $_POST['Nom'];
$agenda = filter_var($agenda, FILTER_SANITIZE_STRING);

$agenda = $_POST['Image'];
$agenda = filter_var($agenda, FILTER_SANITIZE_STRING);

$agenda = $_POST['Detail'];
$agenda = filter_var($agenda, FILTER_SANITIZE_STRING);
*/

/* --------------------- Agenda ---------------------------- */
// TOdo : verifier qu'un film doit etre inséré
/*
if(isset($agenda))
{
    $varAgenda= $conn->prepare("INSERT INTO `agenda` (`Agenda_Date`,`Agenda_Lieu`,`Agenda_Nom`,`Agenda_Image`,`Agenda_Detail`, `Actif`) VALUES (?,?,?,?,?,?)");
    $varAgenda->bind_param("sssssi", $agenda);
    $varAgenda->execute();
    $varAgenda->close();
}
*/

// par ici :)

$categorie = (isset($_POST['categorie'])) ? filter_var($_POST['categorie'], FILTER_SANITIZE_STRING) : '';
$requete = 'select * from `liens` where `Lien_Categorie` = ' . $categorie . ' = Villes and Actif=1';
$resultat = $conn->query($requete);
while($Liste = $resultat->fetch_assoc())
{
    $liens[]= array
    (
        'Lien_Image'=>$Liste['Lien_Image'],
        'Lien_Nom'=>$Liste['Lien_Nom'],
        'Lien_Lieu'=>$Liste['Lien_Web']
    );
}
echo json_encode($liens);
