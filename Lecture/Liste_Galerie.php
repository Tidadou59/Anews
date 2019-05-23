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
require_once(__DIR__.'/../Controller/BDD.php'); //connexion bdd (require = bloque le reste du code si il ne trouve pas le ficher)

/* ***************** Affichage du résulat sur la page web ***************** */
    $requete = "select * from `article` where article_activation=0";
    $resultat = $conn->query($requete);

    while($Liste = $resultat->fetch_assoc())
    {
        $agenda[]= array
        (
            'article_titre'=>$Liste['article_titre'],
            'article_contenu'=>$Liste['article_contenu'],
            'article_date'=>$Liste['article_date'],
        );
    }
    echo json_encode($agenda);