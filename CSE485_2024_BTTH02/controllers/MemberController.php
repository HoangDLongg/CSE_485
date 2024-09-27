<?php
// controllers/MemberController.php

require_once("../../models/Member.php");

class MemberController {
    private $memberModel;

    public function __construct() {
        $this->memberModel = new MemberModel();
    }

    public function login($user_name, $password) {
        $member = $this->memberModel->login($user_name, $password);
        
        if ($member) {
            // Đăng nhập thành công, lưu thông tin vào session
            $_SESSION['password'] = $member['paswword'];
            $_SESSION['user_name'] = $member['user_name'];
            header('Location: index.php'); // Chuyển hướng đến trang chính
            exit();
        } else {
            return "Tên đăng nhập hoặc mật khẩu không chính xác!";
        }
    }
    public function register($user_name,$password){
        $stmt = $this->memberModel->register($user_name, $password);
        if ($stmt) {
            // Đăng nhập thành công, lưu thông tin vào session
            $_SESSION['password'] = $member['paswword'];
            $_SESSION['user_name'] = $member['user_name'];
            header('Location: login.php'); // Chuyển hướng đến trang chính
            exit();
        } else {
            return "Tên đăng nhập hoặc mật khẩu không chính xác!";
        }
    }
}
?>
