<?php

class Admin {

    private $conn;
    private $table = '"Admins"';

    // Свойства администратора
    public int $id;
    public string $username;
    public string $password; // Хранится в хэшированном виде
    public string $created_at;

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


    // Получение администратора по имени пользователя
    public function getByUsername($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Проверка авторизационных данных
    public function authenticate($username, $password) {
        $admin = $this->getByUsername($username);

        if ($admin && password_verify($password, $admin['password'])) {
            // Установка свойств администратора
            $this->id = $admin['id'];
            $this->username = $admin['username'];
            $this->created_at = $admin['created_at'];
            return true;
        }

        return false;
    }

    // Создание нового администратора
    public function create() {
        $query = "INSERT INTO " . $this->table . " (username, password, created_at) 
                  VALUES (:username, :password, NOW())";
        $stmt = $this->conn->prepare($query);

        // Хэшируем пароль перед сохранением
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    }

    // Проверка, существует ли пользователь с таким именем
    public function usernameExists($username) {
        $query = "SELECT COUNT(*) FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }
}