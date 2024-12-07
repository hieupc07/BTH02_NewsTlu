<?
class NewController {
    private $newsModel;

    public function __construct() {
        require_once "models/News.php";
        $this->newsModel = new News();
    }
public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $category = $_POST['category'];
            $content = $_POST['content'];
            
            // Xử lý hình ảnh
            $image = $_FILES['image']['name'];
            $target = "uploads/" . basename($image);
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $this->newsModel->addNews($title, $category, $content, $image);
                header("Location: /admin/news/index");
            } else {
                echo "Lỗi khi tải hình ảnh!";
            }
        }
    }
}