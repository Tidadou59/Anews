<?php
/**
 * Created by PhpStorm.
 * User: David
 * Date: 27/03/2019
 * Time: 13:13
 */

// info server (en local)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angular";

// connection base
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
// Selectionner la base à utiliser
    $conn->select_db($dbname);
}

//echo "Connexion Ok :) <br><br>"; //vérifie que les infos son ok

/* ************************************************************************** */
