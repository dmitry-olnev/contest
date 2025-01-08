<?php

require_once __DIR__ . '/../models/Admin.php';

class AdminAuthController {
    private $admin;

    public function __construct($db) {
        $this->admin = new Admin($db);
    }


	/*	███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗
		████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝
		██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗
		██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║
		██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║
		╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝*/

    // Проверка авторизации администратора
    public function login($username, $password) {
        $admin = $this->admin->getByUsername($username);

        if ($admin && password_verify($password, $admin['password'])) {
            // Успешная авторизация
            session_start();
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            return true;
        } else{
			return false; // Неверные данные
		}
    }

    // Выход администратора
    public function logout() {
        session_start();
        session_destroy();
    }

    // Проверка, авторизован ли администратор
    public function isAuthenticated() {
        session_start();
        return isset($_SESSION['admin_id']);
    }
}