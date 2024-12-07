<?
class AdminController {
    private $newsModel;

    public function __construct() {
        require_once "models/News.php";
        $this->newsModel = new News();
    }

    public function index() {
        // Lấy tất cả bài viết từ Model
        $articles = $this->newsModel->getAllNews();

        // Nếu không có bài viết, gán giá trị mặc định
        if (!$articles) {
            $articles = [];
        }
        require_once "views/admin/news/index.php";
    }
    public function edit($id) {
        $news = $this->newsModel->getNewsById($id); // Phương thức này cần được thêm vào News.php
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $category = $_POST['category'];
            $content = $_POST['content'];
            
            $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $news['image'];
            $target = "uploads/" . basename($image);
            
            if ($_FILES['image']['name']) {
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
            }
            
            $this->newsModel->updateNews($id, $title, $category, $content, $image);
            header("Location: /admin/news/index");
        }
    
        require_once "views/admin/news/edit.php";
    }

    public function delete($id) {
        $this->newsModel->deleteNews($id); 
        header("Location: /admin/news/index");
    }
}
