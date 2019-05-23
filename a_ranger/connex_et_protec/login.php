<?php
include("../BDD.php"); //connexion bdd
// démarre la session
//session_start (); (déjà rajouté dans le fichier "connexion.php")
/* ***************************************************************** */

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../style.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>

    <form action="check_login.php" method="post">
      <div>
        <label for="username">Identifiant</label>
        <input type="text" name="username">
      </div>
      <div>
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
      </div>
      <div>
        <button type="submit" name="button">Se connecter</button>
      </div>
    </form>
  </body>
</html>

