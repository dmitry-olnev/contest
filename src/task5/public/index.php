<?php

require __DIR__ . '/../src/config/database.php';
require __DIR__ . '/../src/controllers/NewsController.php';

$db = (new Database())->getConnection();
$newsController = new NewsController($db);

$newsList = $newsController->read();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Portal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Welcome to the News Portal</h1>
    </header>
    <main>
        <h2>All News</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Likes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsList as $news): ?>
                    <tr>
                        <td><?php echo $news['id']; ?></td>
                        <td><?php echo htmlspecialchars($news['title']); ?></td>
                        <td><?php echo $news['likes']; ?></td>
                        <td>
                            <a href="view.php?id=<?php echo $news['id']; ?>">View</a>
                            <a href="like.php?id=<?php echo $news['id']; ?>" class="like-link">Like</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

<script src="app.js"></script>

</html>