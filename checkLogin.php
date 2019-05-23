<?php
/* ********************* start connexion ********************* */
session_start();

if (isset($_SESSION['User_Pseudo']))
{
    echo json_encode($_SESSION['User_Pseudo']);
}
else
{
    echo json_encode('visiteur');
}