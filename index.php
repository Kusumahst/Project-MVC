<?php
session_start();
require_once('app/Config/Database.php');
require_once('app/Controllers/AuthController.php');
require_once('app/Controllers/ItemController.php');
require_once('app/Models/User.php');
require_once('app/Models/Item.php');

$authController = new AuthController();
$itemController = new ItemController();

$action = isset($_GET['action']) ? $_GET['action'] : '';

if (!isset($_SESSION['username'])) {
    if ($action === 'register') {
        $authController->register();
    } else {
        $authController->login();
    }
} else {
    switch ($action) {
        case 'logout':
            $authController->logout();
            break;
        case 'insert':
            $itemController->insert();
            break;
        case 'edit':
            $itemController->edit($_GET['id']);
            break;
        case 'delete':
            $itemController->delete($_GET['id']);
            break;
        case 'detail':
            $itemController->detail($_GET['id']);
            break;
        default:
            $itemController->index();
            break;
    }
}
?>
