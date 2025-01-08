<?php

require __DIR__ . '/../../src/config/database.php';
require __DIR__ . '/../../src/controllers/AdminNewsController.php';
require __DIR__ . '/../../src/helpers/AuthHelper.php';

AuthHelper::requireAdmin();

$db = (new Database())->getConnection();
$controller = new AdminNewsController($db);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ];
    $result = $controller->updateNews($id, $data);

    if ($result['status'] === 200) {
        header('Location: index.php');
        exit();
    } else {
        $error = $result['error'];
    }
}

$news = $controller->getNewsById($id);

require '../../src/views/admin/edit.php';