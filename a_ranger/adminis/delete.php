<?php
include ("../connexion.php"); //connexion bdd
// démarre la session
session_start ();
include ("../protection.php"); //vérification de connexion
/* ***************************************************************** */

/**** Supprimer un commentaire ****/

if (!empty($_GET['id']))
{
   /*

    if ($id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT) )
    {
        //echo "Oh le méchant pirate...";
        header("location:Danger.html");
    }
   */

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


    $sql = "DELETE FROM `users` WHERE `id` = $id";
    $conn->query($sql);

   header("Location:Admin.php"); //revenir sans le voir à la page Admin.php
}