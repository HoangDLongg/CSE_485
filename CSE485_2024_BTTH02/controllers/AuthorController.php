<?php
require_once("../../configs/DBConnection.php");
require_once("../../models/Author.php");

class AuthorController {
    private $authorModel;

    public function __construct() {
        $this->authorModel = new AuthorModel();
    }

    // Lấy danh sách tất cả tác giả
    public function index() {
        return $this->authorModel->getAllAuthor();
    }

    // Thêm tác giả mới
    public function add($ten_tgia, $hinh_tgia) {
        if (!empty($ten_tgia)) {
            $this->authorModel->addAuthor($ten_tgia, $hinh_tgia);
            echo "<script>alert('Thêm tác giả thành công!');</script>";
        } else {
            echo "<script>alert('Tên tác giả không được để trống!');</script>";
        }
    }

    // Sửa tác giả
    public function update($ma_tgia, $ten_tgia, $hinh_tgia) {
        if (!empty($ma_tgia) && !empty($ten_tgia)) {
            $this->authorModel->updateAuthor($ma_tgia, $ten_tgia, $hinh_tgia);
            echo "<script>alert('Cập nhật tác giả thành công!');</script>";
        } else {
            echo "<script>alert('Tên tác giả không được để trống!');</script>";
        }
    }
    
    // Xóa tác giả
    public function delete($ma_tgia) {
        if (!empty($ma_tgia)) {
            $this->authorModel->deleteAuthor($ma_tgia);
            echo "<script>alert('Xóa tác giả thành công!');</script>";
        } else {
            echo "<script>alert('Mã tác giả không hợp lệ!');</script>";
        }
    }

    // Lấy thông tin tác giả theo ID
    public function indexId($ma_tgia) {
        return $this->authorModel->getId($ma_tgia);
    }
}
?>
