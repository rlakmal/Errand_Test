<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Post to Forum</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/employer/addjob.css">
</head>
<body>
    <h1>Add Post to Forum</h1>
    <form action="process_post.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>

        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="4" required></textarea>
        <br><br>

        <label for="tags">Tags (comma-separated):</label>
        <input type="text" id="tags" name="tags">
        <br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
