<?php
require_once("../../configs/DBConnection.php");

class AuthorModel {
    private $db;

    public function __construct() {
        $dbConnection = new DBConnection();
        $this->db = $dbConnection->getConnection();
    }

    // Lấy tất cả tác giả
    public function getAllAuthor() {
        $stmt = $this->db->prepare("SELECT * FROM tacgia");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm tác giả mới
    public function addAuthor($ten_tgia, $hinh_tgia) {
        $stmt = $this->db->prepare("INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (:ten_tgia, :hinh_tgia)");
        $stmt->execute(['ten_tgia' => $ten_tgia, 'hinh_tgia' => $hinh_tgia]); // Thêm tham số
    }

    // Cập nhật tác giả
    public function updateAuthor($ma_tgia, $ten_tgia, $hinh_tgia) {
        $stmt = $this->db->prepare("UPDATE tacgia SET ten_tgia = :ten_tgia, hinh_tgia = :hinh_tgia WHERE ma_tgia = :ma_tgia");
        $stmt->execute(['ma_tgia' => $ma_tgia, 'ten_tgia' => $ten_tgia, 'hinh_tgia' => $hinh_tgia]);
    }

    // Xóa tác giả
    public function deleteAuthor($ma_tgia) {
        $stmt = $this->db->prepare("DELETE FROM tacgia WHERE ma_tgia = :ma_tgia");
        $stmt->execute(['ma_tgia' => $ma_tgia]); // Sử dụng biến $ma_tgia
    }

    // Lấy tác giả theo ID
    public function getId($ma_tgia) {
        $stmt = $this->db->prepare("SELECT * FROM tacgia WHERE ma_tgia = :ma_tgia");
        $stmt->execute(['ma_tgia' => $ma_tgia]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC); // Chỉ lấy một bản ghi
    }
}
?>
