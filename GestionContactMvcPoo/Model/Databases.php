<?php
require_once 'Client.php';
class Databases extends Client
{
    private static $instance = null;
    protected $host;
    protected $dbname;
    protected $username;
    protected $passwords;
    protected $conn;

    private function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'gestion_contact';
        $this->username = 'root';
        $this->passwords = '';

        try {
            $this->conn  = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->passwords);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Databases();
        }

        return self::$instance;
    }
    public function ajouterUtilisateur(Client $cli)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO client (nom, prenom,numerotelephone,statFav) VALUES (?, ?, ?,?)");
            $stmt->execute([
                $cli->nom,
                $cli->prenom,
                $cli->telephone,
                $cli->fav
            ]);
        } catch (PDOException $e) {
            die("Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage());
        }
    }
    public function supprimerContact($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM  client WHERE id = :id");
        $stmt->bindValue(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function AfficheClient()
    {
        $stmt = $this->conn->prepare("SELECT * FROM client");
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public function Selectionner($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM client WHERE id =:id");
        $stmt->bindParam('id', $id);
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public function AfficheClientFavoris()
    {
        $stmt = $this->conn->prepare("SELECT * FROM client WHERE statFav='Oui'");
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        } else {
            return false;
        }
    }
    public function UpdtaeFavoris($id)
    {
        $stmt = $this->conn->prepare("UPDATE client SET statFav='Oui' WHERE id=:id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function UpdtaeFavorisD($id)
    {
        $stmt = $this->conn->prepare("UPDATE client SET statFav='non' WHERE id=:id");
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function UpdateClient($id, $nom, $prenom, $numerotelephone)
    {
        $stmt = $this->conn->prepare("UPDATE client SET nom=:nom, prenom=:prenom, numerotelephone=:numerotelephone WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':numerotelephone', $numerotelephone);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
