<?php

require_once __DIR__ . '/NewsController.php';

class AdminNewsController {
	
	private $newsController;

    public function __construct($db) {
        $this->newsController = new NewsController($db);
    }


	/*	███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗
		████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝
		██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗
		██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║
		██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║
		╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝*/

	// Получение всех новостей
	public function getAllNews() {
		return $this->newsController->read();
	}

	// Получение одной новости по ID
    public function getNewsById($id) {
        return $this->newsController->readOne($id);
    }

	// Создание новости
    public function createNews($data) {
        return $this->newsController->create($data);
    }

	// Обновление новости
    public function updateNews($id, $data) {
        return $this->newsController->update($id, $data);
    }

	// Удаление новости
    public function deleteNews($id) {
        return $this->newsController->delete($id);
    }
}