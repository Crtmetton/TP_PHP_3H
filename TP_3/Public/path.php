<?php
require_once '../App/Controller/userController.php';

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if ($request_uri == '/register') {
    userController::doRegister();
}
?>

<?php
require_once '../App/Controller/userController.php';

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

if ($request_uri == '/login') {
    userController::doLogin();
}
?>
