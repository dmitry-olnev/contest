<?php

require __DIR__ . '/../../src/config/database.php';
require __DIR__ . '/../../src/controllers/AdminAuthController.php';

// session_start();

$db = (new Database())->getConnection();
$authController = new AdminAuthController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($authController->login($username, $password)) {
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}

// php.exe -r "echo password_hash('this_pass_is_strong', PASSWORD_DEFAULT);"
require '../../src/views/admin/login.php';