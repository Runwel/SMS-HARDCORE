<?php
class Router {
    public function handleRequest() {
        $action = $_GET['action'] ?? null;
        $method = $_SERVER['REQUEST_METHOD'];
        $userCtrl = new UserController();

        switch($action) {
            case('signup'):
                $userCtrl->signup($_POST);
                break;
            default:
            echo "404 Not Found";
        };
    }
}