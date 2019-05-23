<?php

class agenda
{
    private $conn;
    private $database;

    public function __construct()
    {
        try {
            $this->database = new PDO("mysql:host=localhost;dbname=angular;charset=utf8", 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Créer une nouvel evenement
    public function agenda_create($titre, $article, $date, $lieu, $activation = 0)
    {
        $titre = (isset($titre)) ? filter_var($titre, FILTER_SANITIZE_STRING) : '';
        $article = (isset($article)) ? filter_var($article, FILTER_SANITIZE_STRING) : '';
        $date = (isset($date)) ? filter_var($date, FILTER_SANITIZE_STRING) : '';
        $lieu = (isset($lieu)) ? filter_var($lieu, FILTER_SANITIZE_STRING) : '';
        $activation = (isset($activation)) ? filter_var($activation, FILTER_SANITIZE_NUMBER_INT) : '';
        $this->conn = $this->database->prepare('insert into `agenda` (Agenda_Nom, Agenda_Date, Agenda_Image, Agenda_Detail, Agenda_Lieu, Actif) values (?, ?, ?, ?, ?, ?)');
        $this->conn->execute(array($titre, $date, '', $article, $lieu, $activation));

        return true;
    }

    // Supprimer un evenement
    public function agenda_delete($id)
    {
        $this->conn = $this->database->prepare('delete from `agenda` where Agenda_Id = ?');
        $this->conn->execute(array($id));
    }

    // Affiche le nom d'un evenement
    public function agenda_read_title($id)
    {
        $this->conn = $this->database->prepare('select * from `agenda` where Agenda_Id = ?');
        $this->conn->execute(array($id));
        $ret = $this->conn->fetch();
        return $ret['Agenda_Nom'];
    }


    public function agenda_list_all()
    {
        $this->conn = $this->database->prepare('select * from `agenda`');
        $this->conn->execute();
        $ret = $this->conn->fetchAll();
        return $ret;
    }


    // Affiche le contenu d'un evenement
    public function agenda_read_article($id)
    {
        $this->conn = $this->database->prepare('select * from `agenda` where Agenda_Id = ?');
        $this->conn->execute(array($id));
        $ret = $this->conn->fetch();
        return $ret['Agenda_Detail'];
    }

    // Affiche la date d'un evenement
    public function agenda_read_date($id)
    {
        $this->conn = $this->database->prepare('select * from `agenda` where Agenda_Id = ?');
        $this->conn->execute(array($id));
        $ret = $this->conn->fetch();
        return $ret['Agenda_Date'];
    }

    // Activation d'un evenement
    public function agenda_read_activation($id)
{
    $this->conn = $this->database->prepare('select * from `agenda` where Agenda_Id = ?');
    $this->conn->execute(array($id));
    $ret = $this->conn->fetch();
    return $ret['Actif'];
}

    // Retourne le Nbs total d'evenement dans la Bdd
    public function agenda_count()
    {
        $this->conn = $this->database->prepare('select count(*) from agenda');
        $this->conn->execute();
        $ret = $this->conn->fetch();
        return $ret[0];
    }

    // Mise à Jour du titre d'un evenement
    public function agenda_update_titre($id, $titre)
    {
        $this->conn = $this->database->prepare('update agenda set Agenda_Nom = ? where Agenda_Id = ?');
        $this->conn->execute(array($titre, $id));
    }

    // Mise à Jour du contenu d'un evenement
    public function agenda_update_article($id, $article)
    {
        $this->conn = $this->database->prepare('update agenda set Agenda_Detail = ? where Agenda_Id = ?');
        $this->conn->execute(array($article, $id));
    }

    // Mise à Jour de la date d'un evenement
    public function agenda_update_date($id, $date)
    {
        $this->conn = $this->database->prepare('update agenda set Agenda_Date = ? where Agenda_Id = ?');
        $this->conn->execute(array($date, $id));
    }

    // Mise à Jour de l'activation d'un evenement
    public function agenda_update_activation($id, $activation)
    {
        $this->conn = $this->database->prepare('update agenda set Actif = ? where Agenda_Id = ?');
        $this->conn->execute(array($activation, $id));
    }
}