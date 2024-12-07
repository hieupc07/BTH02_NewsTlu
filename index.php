<?php
// Tự động tải các file cần thiết
require_once 'controllers/HomeController.php';
require_once 'models/NewsModel.php';

// Định tuyến dựa vào tham số trên URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'home':
        $homeController = new HomeController();
        if (method_exists($homeController, $action)) {
            $homeController->$action();
        } else {
            echo "Action không tồn tại!";
        }
        break;

    default:
        echo "Controller không tồn tại!";
        break;
}
