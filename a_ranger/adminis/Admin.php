<?php
/* ***************************************************************** */
/* -  -  -  -  -  -  Partie Connexion BDD  -  -  -  -  -  -  */
include ("../connexion.php"); //connexion bdd
// démarre la session
session_start (); //(déjà rajouté dans le fichier "connexion.php")
/* ***************************************************************** */


$sql = "select * from users";
$resultat = $conn->query($sql);

//session_unset();
//session_destroy();

// On récupère les variables de session
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

    // test pour voir si nos variables ont bien été enregistrées
    echo '<html>';
    echo '<head><link rel="icon" type="admin.png" href="admin.png" /></head>';
    echo '<title>Mini Forum | Espace Admin</title>';
    echo '<body>';
    echo 'Bonjour '.$_SESSION['username'].', Vous êtes connecté à votre session.';
    echo '<br />';
    
    // On affiche un lien pour fermer notre session
    echo '<a href="logout.php">Déconnection</a>';
    
}
else {
    echo '<head><link rel="icon" type="admin.png" href="admin.png" /></head>';
    echo 'Vous n\'êtes pas connecté à votre session...';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

<h1>Panel Administrateur</h1>
<h2>Moderation du mini forum :</h2>

<center>
    <table class="table">
        <!-- Afficher la liste des commentaires -->

        <tr class="styl">
            <th class="taille_Prenom-Nom"> Pseudo </th>
            <th class="taille_Prenom-Nom"> Message </th>
            <th class="taille_Prenom-Nom"> Date </th>
            <?php
            if(isset($_SESSION['username']))
            {
                ?>
                <th class="taille_Age"> Modifier </th>
                <th class="taille_Age"> Supprimer </th>
                <?php
            }
            ?>
        </tr>

        <?php
        while($row = $resultat->fetch_assoc())
        {
            ?>
            <tr class="tr_genere souris">
                <td class="T_id souriss"><?= $row['pseudo'] ?></td> <!-- Pseudo -->
                <td class='T_P'><?= nl2br($row['commentaires']) ?></td> <!-- Message -->
                <td class='T_N'><?= $row['date'] ?></td> <!-- date -->

                <?php
                if(isset($_SESSION['username']))
                {
                    ?>

                    <td class='T_A'>
                        <a href=" <?= 'update.php?id='.$row['id'] ?> ">
                            <img class="imgModif" src="ico-modifier.jpg" height="50" width="50" >
                        </a>
                    </td> <!-- Modif -->

                    <td class='T_A'>
                        <a href=" <?= 'delete.php?id='.$row['id'] ?> ">
                            <img class="imgModif" src="ico-suppr.jpg" height="50" width="50" >
                        </a>
                    </td> <!-- Modif -->
                    <?php
                }
                ?>

            </tr>
        <?php } ?>

    </table>
</center>
<br>

</body>
</html>


