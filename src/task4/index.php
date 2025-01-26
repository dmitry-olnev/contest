<?php
require 'db.php';

$perPage = 5; // Количество фильмов на страницу
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;

// Получение фильмов из базы данных
$stmt = $pdo->prepare("SELECT * FROM \"movies\" ORDER BY id LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Получение общего количества фильмов
$totalStmt = $pdo->query("SELECT COUNT(*) FROM \"movies\"");
$totalMovies = $totalStmt->fetchColumn();
$totalPages = ceil($totalMovies / $perPage);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список фильмов</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Список фильмов</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Жанр</th>
                <th>Длительность</th>
                <th>Рейтинг</th>
                <th>Описание</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= htmlspecialchars($movie['id']) ?></td>
                    <td><?= htmlspecialchars($movie['title']) ?></td>
                    <td><?= htmlspecialchars($movie['genre']) ?></td>
                    <td><?= htmlspecialchars($movie['duration']) ?></td>
                    <td><?= htmlspecialchars($movie['rating']) ?></td>
                    <td><?= htmlspecialchars($movie['description']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>" <?= $i === $page ? 'class="active"' : '' ?>><?= $i ?></a>
        <?php endfor; ?>
    </div>
    <a href="add.php">Добавить фильм</a>
</body>
</html>


