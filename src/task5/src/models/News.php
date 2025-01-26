<?php

require_once __DIR__ . '/../config/database.php';

class News {

	private $conn;
	private $table = 'news';

		// Свойства новости
		public int $id;
		public string $title;
		public string $content;
		public string $created_at;
		public string $updated_at;
		public int $likes;

	// Конструктор принимает подключение к базе данных
	public function __construct($db) {
		$this->conn = $db;
	}


	/*	███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗
		████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝
		██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗
		██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║
		██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║
		╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝*/

	// Создание новости
	public function create() {

		$query = "INSERT INTO " . $this->table . " (title, content, created_at, updated_at) 
					VALUES (:title, :content, NOW(), NOW())";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':title', $this->title);
		$stmt->bindParam(':content', $this->content);

		return $stmt->execute(); // Возврат результата в виде true/false
	}

	// Получение всех новостей
	public function read() {

		$query = "SELECT * FROM " . $this->table . " ORDER BY id DESC";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC); // Вернём массив
	}

	// Получение одной новости по ID
	public function readOne($id) {

		$query = "SELECT * FROM " . $this->table . " WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	
	}

	// Обновление новости
	public function update() {

		$query = "UPDATE " . $this->table . " SET title = :title, content = :content, updated_at = NOW() WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':title', $this->title);
		$stmt->bindParam(':content', $this->content);
		$stmt->bindParam(':id', $this->id);

		return $stmt->execute();

	}

	// Удаление новости
	public function delete($id) {

		$query = "DELETE FROM " . $this->table . " WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();

	}

	// Лайк на новость
	public function like($id) {

		$query = "UPDATE " . $this->table . " SET likes = likes + 1 WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);

		return $stmt->execute();
	
	}
}