<?php
include ("../connexion.php"); //connexion bdd
// démarre la session
session_start (); //(déjà rajouté dans le fichier "connexion.php")
include ("../protection.php"); //vérification de connexion
/* ***************************************************************** */

$id = $_GET['id']; // récupere l'id dans l'url
$sql = "select * from users WHERE id=$id"; // selectionne la table et l'id via l'url
$resultat = $conn->query($sql); //execution de la requete
$donnee = $resultat->fetch_assoc(); //stock les données recupéré pour les utilisés

/**** Modifier un commentaire ****/
if (isset($_POST['pseudo']))
    {
        modifier();
    }

function modifier ()
{
    global $conn;

    $stmt = $conn->prepare("UPDATE `users`
                                    SET 
                                    `pseudo` = ?,
                                    `commentaires` = ? 
                                    WHERE id = ?");

    $name = $_POST['pseudo'];
    $commentaires = $_POST['commentaires'];
    $id = $_GET['id'];

    //echo $name;
    //var_dump($conn);

    $stmt->bind_param
        (
            'ssi',
            $name,
            $commentaires,
            $id

        );
    $stmt->execute();
    $stmt->close();

    // afficher un message
    echo "données envoyé... <br><br>";
    header('Location: Admin.php'); //revenir sans le voir à la page Admin.php
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="basics.css" media="screen" title="no title" charset="utf-8">
    <link rel="icon" type="admin.png" href="admin.png" />
</head>
<body>

<a href="Admin.php">
    <img src="retour-index.gif" height="80" width="80" >
</a>

    <h1>Modération d'un message du mini forum : </h1>

    <form action="" method="post">
        <div>
            <label for="pseudo">Pseudo :  </label>
            <input type="text" name="pseudo" value="<?= $donnee['pseudo'] ?>" required>
        </div>
            <br>
        <div>
            <label for="distance">Message :  </label>
            <textarea type="text" name="commentaires" cols="30" rows="20"><?= $donnee['commentaires'] ?></textarea>
        </div>
        <br>
        <button type="submit" name="button">Envoyer</button>
    </form>
</body>
</html>



