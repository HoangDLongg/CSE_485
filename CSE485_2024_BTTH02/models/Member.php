<?php
// models/MemberModel.php

require_once("../../configs/DBConnection.php");

class MemberModel {
    private $conn;

    public function __construct() {
        $database = new DBConnection();
        $this->conn = $database->getConnection();
    }

    public function login($user_name, $password) {
        // Truy vấn để lấy thông tin người dùng
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_name = :user_name AND password = :password");
        $stmt->execute([
            'user_name' => $user_name,
            'password' => $password // Truyền mật khẩu vào truy vấn
        ]);
        $member = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy thông tin người dùng
    
        if ($member) {
            return $member; // Trả về thông tin người dùng nếu đăng nhập thành công
        }
    
        return false; // Trả về false nếu đăng nhập thất bại
    }
    public function register($user_name, $password) {
        // Kiểm tra xem tên người dùng đã tồn tại chưa
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_name = :user_name");
        $stmt->execute(['user_name' => $user_name]);
        
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tên người dùng đã tồn tại
            return false; // Trả về false nếu tên người dùng đã tồn tại
        }
    
        // Nếu không tồn tại, thêm người dùng mới
        $stmt = $this->conn->prepare("INSERT INTO users (user_name, password) VALUES (:user_name, :password)");
        
        // Chú ý: Nếu bạn không mã hóa mật khẩu, hãy sử dụng mật khẩu thô như là
        // `$password`, nhưng việc này không được khuyến nghị vì lý do bảo mật.
        
        $stmt->execute([
            'user_name' => $user_name,
            'password' => $password // Mật khẩu không được mã hóa (không khuyến nghị)
        ]);
    
        return true; // Trả về true nếu đăng ký thành công
    }
}
?>
