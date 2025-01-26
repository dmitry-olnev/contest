<?php

class Database {

    // Параметры подключения
    private string $host = "postgres_server";	// Имя хоста (контейнера)
    private string $port = '5432';				// Порт
    private string $db_name = "db2";		// Имя базы данных
    private string $username = "admin";			// Имя пользователя
    private string $password = "admin";			// Пароль
    public $conn;								// Объект соединения

    // Метод подключения к базе данных
    public function getConnection() {

		// Обнуление соединения перед попыткой подключения
        $this->conn = null;

        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->db_name}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Ошибка подключения: " . $exception->getMessage());
        }

		// Возвращаем объект соединения
        return $this->conn;
	}

}