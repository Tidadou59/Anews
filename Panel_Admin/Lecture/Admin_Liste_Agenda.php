<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 27/03/2019
 * Time: 13:06
 */

/* ********************* Connexion Base De Données ********************* */
require_once __DIR__."/BDD.php";


/* ***************** Affichage du résulat sur la page web ***************** */
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
