<?php

require __DIR__ . '/../../src/config/database.php';
require __DIR__ . '/../../src/controllers/AdminNewsController.php';
require __DIR__ . '/../../src/helpers/AuthHelper.php';

AuthHelper::requireAdmin();

$db = (new Database())->getConnection();
$controller = new AdminNewsController($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ];
    $result = $controller->createNews($data);

    if ($result['status'] === 201) {
        header('Location: index.php');
        exit();
    } else {
        $error = $result['error'];
    }
}

require '../../src/views/admin/create.php';