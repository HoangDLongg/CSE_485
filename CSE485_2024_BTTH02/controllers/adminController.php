<?php
require_once("../../models/Admin.php");

class DashboardController {
    private $model;

    public function __construct() {
        $this->model = new StatisticsModel(); // Khởi tạo mô hình
    }

    public function getTotalUsers() {
        return $this->model->getTotalUsers(); // Gọi phương thức từ mô hình
    }

    public function getTotalGenres() {
        return $this->model->getTotalGenres(); // Gọi phương thức từ mô hình
    }

    public function getTotalAuthors() {
        return $this->model->getTotalAuthors(); // Gọi phương thức từ mô hình
    }

    public function getTotalArticles() {
        return $this->model->getTotalArticles(); // Gọi phương thức từ mô hình
    }
}
?>
