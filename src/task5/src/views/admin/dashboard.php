<?php require 'header.php'; ?>

<h1>Admin Dashboard</h1>
<a href="create.php" class="btn">Create News</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($newsList as $news): ?>
        <tr>
            <td><?php echo $news['id']; ?></td>
            <td><?php echo htmlspecialchars($news['title']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $news['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $news['id']; ?>" class="delete-link">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'footer.php'; ?>