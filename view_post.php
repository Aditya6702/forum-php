<?php
require_once 'db.php'; // Include the database connection

// Retrieve all posts and their authors
$query = "SELECT posts.id, posts.title, posts.content, posts.created_at, users.username
          FROM posts
          INNER JOIN users ON posts.user_id = users.id
          ORDER BY posts.created_at DESC";

$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posts</title>
</head>
<body>
    <h1>View Posts</h1>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="post">
            <h2><?php echo $row['title']; ?></h2>
            <p>Posted by <?php echo $row['username']; ?> on <?php echo $row['created_at']; ?></p>
            <p><?php echo $row['content']; ?></p>
        </div>
    <?php } ?>

</body>
</html>
