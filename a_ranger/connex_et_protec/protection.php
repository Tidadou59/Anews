<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 17/01/2019
 * Time: 11:50
 */

// ! = negation (n'existe pas)
if(!isset($_SESSION['username']))
{
    header("Location: Admin.php");
    die();
}
