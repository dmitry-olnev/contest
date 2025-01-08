<?php

require_once __DIR__ . '/../../src/config/database.php';
require_once __DIR__ . '/../../src/controllers/NewsController.php';
require_once __DIR__ . '/../../src/helpers/AuthHelper.php';

$db = (new Database())->getConnection();
$controller = new NewsController($db);


switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET':
		// Логика получения новостей
		if (isset($_GET['id'])) {
			$response = $controller->readOne($_GET['id']);
		} else {
			$response = $controller->read();
		}
		break;

	case 'POST':
		AuthHelper::requireAdmin();

		// Логика создания новости
		$data = json_decode(file_get_contents("php://input"), true);
		$response = $controller->create($data);
		break;

	case 'PUT':
		AuthHelper::requireAdmin();

		// Логика обновления новости
		if (isset($_GET['id'])) {
			$data = json_decode(file_get_contents('php://input'), true);
			$response = $controller->update($_GET['id'], $data);
		} else {
			$response = ['status' => 400, 'error' => 'ID is required'];
		}
		break;

	case 'DELETE':
		AuthHelper::requireAdmin();

		// Логика удаления новости
		if (isset($_GET['id'])) {
			$response = $controller->delete($_GET['id']);
		} else {
			$response = ['status' => 400, 'error' => 'ID is required'];
		}
		break;

	case 'PATCH':
		
		// Логика добавления лайка
		if (isset($_GET['id'])) {
			$response = $controller->like($_GET['id']);
		} else {
			$response = ['status' => 400, 'error' => 'ID is required'];
		}
		break;

	default:
		$response = ['status' => 405, 'error' => 'Method not allowed'];
}

// Устанавливаем заголовки и возвращаем ответ
header('Content-Type: application/json');
http_response_code($response['status'] ?? 200);
echo json_encode($response);