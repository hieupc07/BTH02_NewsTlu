<?
class News {
    private $conn;

    public function __construct() {
        require_once "config/database.php";
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllNews() {
        $query = "SELECT * FROM news ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về mảng dữ liệu
    }
    public function updateNews($id, $title, $category, $content, $image) {
        $query = "UPDATE news SET title = :title, category_id = :category_id, content = :content, image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        
        return $stmt->execute();
    }
    public function getNewsById($id) {
        $query = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        
        // Gán giá trị cho tham số
        $stmt->bindParam(':id', $id);
        
        // Thực hiện truy vấn
        $stmt->execute();
        
        // Trả về dữ liệu bài viết hoặc null nếu không tìm thấy
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addNews($title, $category, $content, $image) {
        $query = "INSERT INTO news (title, category_id, content, image, created_at) VALUES (:title, :category_id, :content, :image, NOW())";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':category_id', $category);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        
        return $stmt->execute();
    }
    public function deleteNews($id) {
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}
