<?php

require __DIR__ . '/../src/config/database.php';
require __DIR__ . '/../src/controllers/NewsController.php';

$db = (new Database())->getConnection();
$newsController = new NewsController($db);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit();
}

$news = $newsController->readOne($id);
if (!$news) {
    echo "News not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($news['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><?php echo htmlspecialchars($news['title']); ?></h1>
    </header>
    <main>
        <p><?php echo htmlspecialchars($news['content']); ?></p>
        <p>Likes: <?php echo $news['likes']; ?></p>
        <a href="index.php" class="btn">Back</a>
        <a href="like.php?id=<?php echo $news['id']; ?>" class="btn">Like</a>
    </main>
</body>

</html>