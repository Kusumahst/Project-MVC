
<?php
class AuthController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            if ($this->user->register($username, password_hash($password, PASSWORD_BCRYPT))) {
                header('Location: index.php?action=login');
                exit();
            } else {
                $error = 'Registrasi gagal, username sudah digunakan!';
            }
        }
        require_once('app/Views/auth/register.php');
    }
    

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            if ($this->user->login($username, $password)) {
                $_SESSION['username'] = $username;
                header('Location: index.php');
                exit();
            } else {
                $error = 'Login gagal, periksa username atau password Anda!';
            }
        }
        require_once('app/Views/auth/login.php');
    }
    
    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
?>
