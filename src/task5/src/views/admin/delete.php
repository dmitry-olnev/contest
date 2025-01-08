<?php require 'header.php'; ?>

<h1>Delete News</h1>
<p>Are you sure you want to delete the news titled "<?php echo htmlspecialchars($news['title']); ?>"?</p>
<form method="POST" action="delete.php?id=<?php echo $news['id']; ?>">
    <button type="submit">Yes, Delete</button>
    <a href="index.php">Cancel</a>
</form>

<?php require 'footer.php'; ?>