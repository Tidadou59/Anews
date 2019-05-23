<?php
session_start();

print_r($_POST);

if($_SESSION['User_Statut']== 'admin')
{
    include 'class/agenda.php';

    $adminAgenda=new agenda();
    $date=$_POST['date'];
    $lieu=$_POST['lieu'];
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $activation=$_POST['activation'];

    if($adminAgenda->agenda_create($nom, $description, $date, $lieu, $activation))
    {
        echo json_encode(array('statut'=>'created'));
    }
    else
    {
        echo json_encode(array('statut'=>'error'));
    }

}