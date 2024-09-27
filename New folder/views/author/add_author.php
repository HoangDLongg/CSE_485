<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Trang ngoài</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="author.php">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="article.php">Bài viết</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
require_once("../../controllers/AuthorController.php");

$authorController = new AuthorController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy tên tác giả từ form
    $ten_tgia = $_POST['ten_tgia'] ?? '';
    
    // Kiểm tra nếu có ảnh được tải lên
    if (isset($_FILES['hinh_tgia']) && $_FILES['hinh_tgia']['error'] == 0) {
        $hinh_tgia = $_FILES['hinh_tgia'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Các loại file cho phép
        $maxFileSize = 2 * 1024 * 1024; // 2MB

        // Kiểm tra loại file và kích thước file
        if (in_array($hinh_tgia['type'], $allowedTypes) && $hinh_tgia['size'] <= $maxFileSize) {
            // Di chuyển file đến thư mục mong muốn
            $uploadDir = 'uploads/'; // Thư mục chứa ảnh
            
            // Tạo thư mục nếu chưa tồn tại
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Thay đổi tên file để tránh xung đột
            $uploadFilePath = $uploadDir . uniqid() . '-' . basename($hinh_tgia['name']);

            // Di chuyển file
            if (move_uploaded_file($hinh_tgia['tmp_name'], $uploadFilePath)) {
                // Thêm tác giả mới vào cơ sở dữ liệu
                $authorController->add($ten_tgia, $uploadFilePath);
                header("Location:author.php?success=1");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Lỗi trong việc tải lên hình ảnh!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Chỉ chấp nhận file ảnh (JPEG, PNG, GIF) và kích thước tối đa 2MB!</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Vui lòng chọn hình ảnh!</div>";
    }
}
?>


    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h2 class="text-center text-uppercase fw-bold">Thêm tác giả mới</h2>
                <form action="add_author.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                        <input type="text" class="form-control" name="ten_tgia" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Ảnh tác giả</span>
                        <input type="file" name="hinh_tgia" accept="image/*" required>
                    </div>
                    <div class="form-group float-end">
                        <input type="submit" value="Thêm" name="sbm" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
