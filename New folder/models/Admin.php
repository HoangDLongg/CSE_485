<?php
require_once("../../configs/DBConnection.php");

class StatisticsModel {
    private $conn;

    public function __construct() {
        $database = new DBConnection();
        $this->conn = $database->getConnection();
    }

    public function getTotalUsers() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_user FROM users");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_user'];
    }

    public function getTotalGenres() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_genre FROM theloai");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_genre'];
    }

    public function getTotalAuthors() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_author FROM tacgia");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_author'];
    }

    public function getTotalArticles() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total_article FROM baiviet");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total_article'];
    }
}
?>
