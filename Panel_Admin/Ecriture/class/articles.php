<?php

class articles
{
    private $conn;
    private $database;

    public function __construct()
    {
        try {
            $this->database = new PDO("mysql:host=localhost;dbname=avesn_news;charset=utf8", 'root', '',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Créer un article
    public function article_create($titre, $article, $date, $activation = 0)
    {
        $titre = (isset($titre)) ? filter_var($titre, FILTER_SANITIZE_STRING) : '';
        $article = (isset($article)) ? filter_var($article, FILTER_SANITIZE_STRING) : '';
        $date = (isset($date)) ? filter_var($date, FILTER_SANITIZE_STRING) : '';
        $id = (isset($_SESSION['id'])) ? filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT) : 0;
        $this->conn = $this->database->prepare('insert into `articles` (article_titre, article_contenu, article_date, article_activation, user_id) values (?, ?, ?, ?, ?)');
        $this->conn->execute(array($titre, $article, $date, $activation, $id));
    }

    // Supprimer un article
    public function article_delete($id)
    {
        $this->conn = $this->database->prepare('delete from articles where id = ?');
        $this->conn->execute(array($id));
    }

    // Affiche le titre d'un article
    public function article_read_title($id)
    {
        $this->conn = $this->database->prepare('select * from `articles` where id = ?');
        $this->conn->execute(array($id));
        $ret = $this->conn->fetch();
        return $ret['article_titre'];
    }

    // Affiche le contenu d'un article
    public function article_read_article($id)
    {
        $this->conn = $this->database->prepare('select * from `articles` where id = ?');
        $this->conn->execute(array($id));
        $ret = $this->conn->fetch();
        return $ret['article_contenu'];
    }

    // Affiche la date d'un article
    public function article_read_date($id)
    {
        $this->conn = $this->database->prepare('select * from `articles` where id = ?');
        $this->conn->execute(array($id));
        $ret = $this->conn->fetch();
        return $ret['article_date'];
    }

    public function article_list_all()
    {
        $this->conn = $this->database->prepare('select * from `articles` order by article_date DESC');
        $this->conn->execute();
        $ret = $this->conn->fetchAll();
        return $ret;
    }

    // Activation un article
    public function article_read_activation($id)
    {
        $this->conn = $this->database->prepare('select * from `articles` where id = ?');
        $this->conn->execute(array($id));
        $ret = $this->conn->fetch();
        return $ret['article_activation'];
    }

    // Retourne le Nbs total d'Article dans la Bdd
    public function article_count()
    {
        $this->conn = $this->database->prepare('select count(*) from articles');
        $this->conn->execute();
        $ret = $this->conn->fetch();
        return $ret[0];
    }

    // Faire la Mise à Jour du titre d'un article
    public function article_update_titre($id, $titre)
    {
        $this->conn = $this->database->prepare('update articles set article_titre = ? where id = ?');
        $this->conn->execute(array($titre, $id));
    }

    // Faire la Mise à Jour du contenu d'un article
    public function article_update_article($id, $article)
    {
        $this->conn = $this->database->prepare('update articles set article_contenu = ? where id = ?');
        $this->conn->execute(array($article, $id));
    }

    // Faire la Mise à Jour de la date d'un article
    public function article_update_date($id, $date)
    {
        $this->conn = $this->database->prepare('update articles set article_date = ? where id = ?');
        $this->conn->execute(array($date, $id));
    }

    // Faire la Mise à Jour de l'activation d'un article
    public function article_update_activation($id, $activation)
    {
        $this->conn = $this->database->prepare('update articles set article_activation = ? where id = ?');
        $this->conn->execute(array($activation, $id));
    }
}