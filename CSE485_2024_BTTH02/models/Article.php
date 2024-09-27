<?php
require_once(__DIR__ . "/../configs/DBConnection.php");




class ArticleModel {

  private $conn;

  public function __construct() {
    $database = new DBConnection();
    $this->conn = $database->getConnection();
  }
  private function uploadImage($file){

    $target = 'uploads/';
  
    $fileTmp = $file['tmp_name'];
    $fileName = $file['name'];
  
    if(move_uploaded_file($fileTmp, $target.$fileName)){
      return $fileName;
    }
  
    return false;
  
  }

  public function getArticles() {
    $stmt = $this->conn->query("SELECT * FROM baiviet"); // Thay đổi tên bảng nếu cần
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//Them bai viet
public function addArticles($tieude,$ten_bhat,$ma_tloai,$tomtat,$noidung,$ma_tgia,$ngayviet,$hinhanh){
  $stmt = $this->conn->prepare("INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) 
VALUES (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh)");
  $stmt->execute([
    'tieude' => $tieude,
    'ten_bhat' => $ten_bhat,
    'ma_tloai' => $ma_tloai,
    'tomtat' => $tomtat,
    'noidung' => $noidung,
    'ma_tgia' => $ma_tgia,
    'ngayviet' => $ngayviet,
    'hinhanh' => $hinhanh
]);


}
public function getId($ma_bviet) {
  $stmt = $this->conn->prepare("SELECT * FROM baiviet WHERE ma_bviet = :ma_bviet");
  $stmt->execute(['ma_bviet' => $ma_bviet]);
  
  return $stmt->fetch(PDO::FETCH_ASSOC); // Chỉ lấy một bản ghi
}

public function editArticles($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh = null) {
  if ($hinhanh) {
      // Nếu có hình ảnh mới, cập nhật cả hình ảnh
      $stmt = $this->conn->prepare("UPDATE baiviet SET tieude = :tieude, ten_bhat = :ten_bhat, ma_tloai = :ma_tloai, tomtat = :tomtat, noidung = :noidung, ma_tgia = :ma_tgia, ngayviet = :ngayviet, hinhanh = :hinhanh WHERE ma_bviet = :ma_bviet");
      $stmt->execute([
          'tieude' => $tieude,
          'ten_bhat' => $ten_bhat,
          'ma_tloai' => $ma_tloai,
          'tomtat' => $tomtat,
          'noidung' => $noidung,
          'ma_tgia' => $ma_tgia,
          'ngayviet' => $ngayviet,
          'hinhanh' => $hinhanh,  // Cập nhật hình ảnh mới
          'ma_bviet' => $ma_bviet
      ]);
  } else {
      // Nếu không có hình ảnh mới, giữ nguyên hình ảnh cũ
      $stmt = $this->conn->prepare("UPDATE baiviet SET tieude = :tieude, ten_bhat = :ten_bhat, ma_tloai = :ma_tloai, tomtat = :tomtat, noidung = :noidung, ma_tgia = :ma_tgia, ngayviet = :ngayviet WHERE ma_bviet = :ma_bviet");
      $stmt->execute([
          'tieude' => $tieude,
          'ten_bhat' => $ten_bhat,
          'ma_tloai' => $ma_tloai,
          'tomtat' => $tomtat,
          'noidung' => $noidung,
          'ma_tgia' => $ma_tgia,
          'ngayviet' => $ngayviet,
          'ma_bviet' => $ma_bviet
      ]);
  }
}

public function deleteArticles($ma_bviet){
  $stmt = $this->conn->prepare("DELETE FROM baiviet WHERE ma_bviet = :ma_bviet");
  $stmt->execute(['ma_bviet'=>$ma_bviet]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function getTopArticles($limit = 4) {
  $stmt = $this->conn->prepare("SELECT * FROM baiviet ORDER BY ma_bviet DESC LIMIT :limit");
  $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// ma bviet theo id

public function getArticleById($ma_bviet) {
  $query = "SELECT a.*, tl.ten_tloai, tg.ten_tgia
                  FROM baiviet a
                  LEFT JOIN theloai tl ON a.ma_tloai = tl.ma_tloai
                  LEFT JOIN tacgia tg ON a.ma_tgia = tg.ma_tgia
                  WHERE a.ma_bviet = :ma_bviet";
  $stmt = $this->conn->prepare($query);
  $stmt->bindParam(':ma_bviet', $ma_bviet, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}


}
?>
