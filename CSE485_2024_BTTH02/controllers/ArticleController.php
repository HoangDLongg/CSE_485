<?php
require_once(__DIR__ . "/../configs/DBConnection.php");
require_once(__DIR__ . "/../models/Article.php");




class ArticleController {
    private $articleModel;

    public function __construct() {
        // Khởi tạo ArticleModel với kết nối DB
        $database = new DBConnection();
        $this->articleModel = new ArticleModel($database->getConnection());
    }

    public function getArticles() {
        return $this->articleModel->getArticles(); // Gọi phương thức từ ArticleModel
    }
// them bai viet
    public function addArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet,$hinhanh) {
        if (!empty($tieude) && !empty($ten_bhat) && !empty($ma_tloai) && !empty($tomtat) && !empty($noidung) && !empty($ma_tgia) && !empty($ngayviet)&& !empty($hinhanh) ) {
            $this->articleModel->addArticles($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet,$hinhanh);
            echo "<script>alert('Thêm bài viết thành công!');</script>";
        } else {
            echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
        }
    }
    // sua bai viet
    public function update($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh = null) {
        if (!empty($ma_bviet) && !empty($tieude) && !empty($ten_bhat) && !empty($ma_tloai) && !empty($tomtat) && !empty($noidung) && !empty($ma_tgia) && !empty($ngayviet)) {
            
            // Gọi hàm editArticles với tham số $hinhanh (có thể null nếu không có hình ảnh mới)
            $this->articleModel->editArticles($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh);
    
            echo "<script>alert('Cập nhật bài viết thành công!');</script>";
        } else {
            echo "<script>alert('Vui lòng điền đầy đủ thông tin!');</script>";
        }
    }
    
    public function indexId($ma_bviet) {
        return $this->articleModel->getId($ma_bviet);
    }
    public function delete($ma_bviet){
        if(!empty($ma_bviet)){
            $this->articleModel->deleteArticles($ma_bviet);
            echo "<script>alert('Xóa thể loại thành công!');</script>";
         } else {
             echo "<script>alert('Mã thể loại không hợp lệ!');</script>";
         }
        }
    public function getTopArticles($limit = 4) {
            return $this->articleModel->getTopArticles($limit); // Gọi hàm
        }
    
        public function getArticleID($ma_bviet) {
            return $this->articleModel->getArticleById($ma_bviet);
        }
        
        
    }




?>
