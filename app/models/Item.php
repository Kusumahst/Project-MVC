
<?php
class Item {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllItems() {
        $result = $this->conn->query("SELECT * FROM items");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getItemById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insertItem($name, $description, $price, $image) {
        $stmt = $this->conn->prepare("INSERT INTO items (name, description, price, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $description, $price, $image);
        return $stmt->execute();
    }

    public function updateItem($id, $name, $description, $price, $image) {
        $stmt = $this->conn->prepare("UPDATE items SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssisi", $name, $description, $price, $image, $id);
        return $stmt->execute();
    }

    public function deleteItem($id) {
        $stmt = $this->conn->prepare("DELETE FROM items WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>

