<?php
require('require/top.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocerry";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve blog posts from the database
    $stmt = $pdo->query("SELECT * FROM news_posts ORDER BY id DESC"); // Assuming 'id' is the primary key
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($posts) > 0) {
        echo '<br><br><br><br>';
        echo '<h1>News</h1>';
        echo '<div class="card-container">';
        foreach ($posts as $post) {
            // Display each post as a card with enhanced styling
            echo '<div class="card">';
            echo '<img src="./Admin/uploads/' . $post['featured_image'] . '" class="card-img-top" alt="Featured Image">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($post['title']) . '</h5>';
            echo '<p class="card-text">' . htmlspecialchars($post['content']) . '</p>';
            echo '<p class="card-text"><small class="text-muted">Tags: ' . htmlspecialchars($post['tags']) . '</small></p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>'; // Close card-container
    } else {
        echo '<p>No posts found.</p>';
    }
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

require('require/foot.php');
?>
<style>
    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
        margin-top: 50px;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        font-size: 1rem;
        color: #666;
        margin-bottom: 10px;
    }

    .text-muted {
        font-size: 0.875rem;
        color: #888;
    }
</style>

