<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 27/03/2019
 * Time: 13:06
 */
/* ********************* start connexion ********************* */
session_start();
/* **************** Connexion Base De Données ****************** */
//require_once(__DIR__.'/../Controller/BDD.php'); //connexion bdd (require = bloque le reste du code si il ne trouve pas le ficher)
include("../Controller/BDD.php");

/* ***************** Affichage du résulat sur la page web ***************** */

    $agenda= array();
    $requete = "select * from `agenda` where Actif=1";
    $resultat = $conn->query($requete);

    while($Liste = $resultat->fetch_assoc())
    {
        $agenda[]= array
        (
            'Agenda_Image'=>$Liste['Agenda_Image'],
            'Agenda_Date'=>$Liste['Agenda_Date'],
            'Agenda_Lieu'=>$Liste['Agenda_Lieu'],
            'Agenda_Nom'=>$Liste['Agenda_Nom'],
            'Agenda_Detail'=>$Liste['Agenda_Detail']
        );
    }
    echo json_encode($agenda);