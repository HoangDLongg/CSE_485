<?php
require_once("../../configs/DBConnection.php");
require_once("../../models/Category.php");

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    // Lấy danh sách tất cả thể loại
    public function index() {
        return $this->categoryModel->getAllCategories();
    }

    // Thêm thể loại mới
    public function add($ten_tloai) {
        if (!empty($ten_tloai)) {
            $this->categoryModel->addCategory($ten_tloai);
            echo "<script>alert('Thêm thể loại thành công!');</script>";
        } else {
            echo "<script>alert('Tên thể loại không được để trống!');</script>";
        }
    }

    // Sửa thể loại
    public function update($ma_tloai, $ten_tloai) {
         if (!empty($ma_tloai) && !empty($ten_tloai)) {
             $this->categoryModel->updateCategory($ma_tloai, $ten_tloai);
             echo "<script>alert('Cập nhật thể loại thành công!');</script>";
         } else {
             echo "<script>alert('Tên thể loại không được để trống!');</script>";
         }
    }
    
     // Xóa thể loại
     public function delete($ma_tloai) {
         if (!empty($ma_tloai)) {
             $this->categoryModel->deleteCategory($ma_tloai);
             echo "<script>alert('Xóa thể loại thành công!');</script>";
         } else {
             echo "<script>alert('Mã thể loại không hợp lệ!');</script>";
         }
     }
     public function indexId($ma_tloai) {
        return $this->categoryModel->getId($ma_tloai);
    }
}

?>
