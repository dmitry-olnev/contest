<?php

require __DIR__ . '/../../src/config/database.php';
require __DIR__ . '/../../src/controllers/AdminNewsController.php';
require __DIR__ . '/../../src/helpers/AuthHelper.php';

AuthHelper::requireAdmin();

$db = (new Database())->getConnection();
$controller = new AdminNewsController($db);

$newsList = $controller->getAllNews();

require '../../src/views/admin/dashboard.php';