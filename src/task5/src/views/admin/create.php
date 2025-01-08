<?php require 'header.php'; ?>

<h1>Create News</h1>
<form method="POST" action="create.php">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="content">Content:</label>
    <textarea id="content" name="content" required></textarea>
    <button type="submit">Create</button>
</form>
<a href="index.php">Back to Dashboard</a>

<?php require 'footer.php'; ?>