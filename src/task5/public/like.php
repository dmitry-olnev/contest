<?php

require __DIR__ . '/../src/config/database.php';
require __DIR__ . '/../src/controllers/NewsController.php';

$db = (new Database())->getConnection();
$newsController = new NewsController($db);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

$result = $newsController->like($id);
if ($result['status'] === 200) {
    header('Location: view.php?id=' . $id);
    exit();
} else {
    echo "Failed to add like.";
    exit();
}