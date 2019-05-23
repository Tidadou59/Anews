<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 27/03/2019
 * Time: 13:06
 */

/* ********************* Connexion Base De Données ********************* */
require_once(__DIR__.'/../Controller/BDD.php');

/* ***************** Affichage du résulat sur la page web ***************** */
    /*
    $requete = 'select * from `liens` where Actif=1';
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
    */

    $requete = "select * from `liens` where Actif=1";
    $resultat = $conn->query($requete);
    $liens = array();

    while($Liste = $resultat->fetch_assoc())
    {
        $category = $Liste['Lien_Categorie'];

            $liens[$category][]= array
        (
            'Lien_Image'=>$Liste['Lien_Image'],
            'Lien_Nom'=>$Liste['Lien_Nom'],
            'Lien_Web'=>$Liste['Lien_Web']
        );
    }


    echo json_encode($liens);

