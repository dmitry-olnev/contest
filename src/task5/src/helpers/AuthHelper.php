<?php

class AuthHelper {

    // Требует, чтобы пользователь был администратором
    public static function requireAdmin() {
		session_start();
        if (!isset($_SESSION['admin_id'])) {
            // Если пользователь не авторизован, редирект на форму входа
            header('Location: login.php');
            exit();
        }
    }
}

