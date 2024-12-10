
<?php
class ItemController {
    private $db;
    private $item;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->item = new Item($this->db);
    }

    public function index() {
        $items = $this->item->getAllItems();
        require_once 'app/Views/items/index.php';
    }

    public function detail($id) {
        $item = $this->item->getItemById($id);
        require_once 'app/Views/items/detail.php';
    }

    public function insert() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = $_POST['price'];
    
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            }
    
            if ($image) {
                $this->item->insertItem($name, $description, $price, $image);
                header('Location: index.php');
                exit();
            } else {
                echo "Gagal menambahkan item. Periksa kembali input Anda.";
            }
        } else {
            require_once 'app/Views/items/insert.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $item = $this->item->getItemById($id);
    
            $image = $item['image']; 
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = $this->uploadImage($_FILES['image']);
            }
    
            $this->item->updateItem($id, $name, $description, $price, $image);
    
            header('Location: index.php');
            exit();
        } else {
            $item = $this->item->getItemById($id);
            require_once 'app/Views/items/edit.php';
        }
    }
    

    public function delete($id) {
        $this->item->deleteItem($id);
        header('Location: index.php');
    }

    private function uploadImage($file) {
        $target_dir = "public/uploads/"; 
        $target_file = $target_dir . basename($file["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif']; 
       
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return basename($file["name"]); 
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
            return false;
        }
    }
}
?>
