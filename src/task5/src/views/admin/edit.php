<?php require 'header.php'; ?>

<h1>Edit News</h1>
<form method="POST" action="edit.php?id=<?php echo $news['id']; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
    <label for="content">Content:</label>
    <textarea id="content" name="content" required><?php echo htmlspecialchars($news['content']); ?></textarea>
    <button type="submit">Update</button>
</form>
<a href="index.php">Back to Dashboard</a>

<?php require 'footer.php'; ?>