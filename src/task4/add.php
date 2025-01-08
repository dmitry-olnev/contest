<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $duration = (int)$_POST['duration'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO \"Movies\" (title, genre, duration, rating, description) VALUES (:title, :genre, :duration, :rating, :description)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
    $stmt->bindParam(':rating', $rating);
    $stmt->bindParam(':description', $description);
    $stmt->execute();

    header('Location: ./index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить фильм</title>
</head>
<body>
    <h1>Добавить новый фильм</h1>
    <form method="post">
        <label for="title">Название:</label>
        <input type="text" id="title" name="title" required><br>
        
        <label for="genre">Жанр:</label>
        <input type="text" id="genre" name="genre" required><br>
        
        <label for="duration">Длительность (мин):</label>
        <input type="number" id="duration" name="duration" required><br>
        
        <label for="rating">Рейтинг:</label>
        <input type="text" id="rating" name="rating" required><br>
        
        <label for="description">Описание:</label>
        <textarea id="description" name="description" required></textarea><br>
        
        <button type="submit">Добавить</button>
    </form>
</body>
</html>

