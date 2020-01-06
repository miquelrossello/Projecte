<?php


class PublicationDAO implements DAO_Publication {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Publication $publication) {
        $img =  $this->packUp($publication->getImg());
        $text = $this->packUp($publication->getText());
        $user = $this->packUp($publication->getUser());
        $route = $this->packUp($publication->getRoute());

        $insert = "INSERT INTO `publicacio`
        (`imatge`,`texte`,`id_perfil_propietari`,`id_excursio`)
        VALUES ($img, $text, $user, $route)";

        $this->connection->prepare($insert)->execute();
    }

    public function getPublicationById($id) {
        $publication = null;
        $select = "SELECT * FROM publicacio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $publication = new Publication($row[1], $row[2], $row[3], $row[4], $row[0]);
        }

        return $publication;
    }

    public function deletePublicationById($id) {
        $select = "DELETE FROM publicacio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllPublicationsFromUser($userId) {
        $publication = [];
        $select = "SELECT * FROM publicacio WHERE id_perfil_propietari = $userId";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $publication[] = new Publication($row[1], $row[2], $row[3], $row[4], $row[0]);
        }

        return $publication;
    }

    public function getAllPublicationsFromRoute($routeId) {
        $publication = [];
        $select = "SELECT * FROM publicacio WHERE id_excursio = $routeId";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $publication[] = new Publication($row[1], $row[2], $row[3], $row[4], $row[0]);
        }

        return $publication;
    }

    public function updatePublication($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE publicacio SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }

}