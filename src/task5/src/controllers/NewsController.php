<?php

require_once __DIR__ . '/../models/News.php';

class NewsController {

	private string $news;

	public function __construct($db) {
		$this->News = new News($db);
	}


	/*	███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗
		████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝
		██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗
		██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║
		██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║
		╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝*/

	// Создание новости
	public function create($data) {
		$this->News->title = $data['title'];
		$this->News->content = $data['content'];

		if ($this->News->create()) {
			return ['status' => 201, 'message' => 'News created'];
		} else {
			return ['status' => 500, 'error' => 'Failed to create news'];
		}
	}

	// Получение всех новостей
	public function read() {
		return $this->News->read();
	}

	// Получение одной новости
	public function readOne($id) {
		$result = $this->News->readOne($id);

		if ($result) {
			return $result;
		} else {
			return ['status' => 404, 'error' => 'News not found'];
		}
	}

	// Обновление новости
	public function update($id, $data) {
		$this->News->id = $id;
		$this->News->title = $data['title'];
		$this->News->content = $data['content'];

		if ($this->News->update()) {
			return ['status' => 200, 'message' => 'News updated'];
		} else {
			return ['status' => 500, 'error' => 'Failed to update news'];
		}
	}

	// Удаление новости
	public function delete($id) {

		if ($this->News->delete($id)) {
			return ['status' => 200, 'message' => 'News deleted'];
		} else {
			return ['status' => 500, 'error' => 'Failed to delete news'];
		}
	}

	// Лайк новости
	public function like($id) {

		if ($this->News->like($id)) {
			return ['status' => 200, 'message' => 'Like added'];
		} else {
			return ['status' => 500, 'error' => 'Failed to add like'];
		}
	}
}