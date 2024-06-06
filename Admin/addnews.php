<?php
require('require/top.php');
?>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<div class="wrwr">
    <div class="path">
        <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
        <span>/</span>
        <a href="addnews.php">Add News</a>
    </div>

    <div class="rowbtn"></div>

    <div class="catbox-row">
        <div style="margin-top: 5rem;" class="container">
            <div style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" class="card">
                <div style="padding: 1.25rem;" class="card-body">
                    <h1 style="font-size: 1.25rem; font-weight: bold; margin-bottom: 1rem;" class="card-title">Create a New Blog Post</h1>

                    <!-- Blog Post Form -->
                    <form id="blogPostForm" enctype="multipart/form-data">
                        <!-- Title -->
                        <div style="margin-bottom: 1rem;">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Enter the title of your blog" style="margin-top: 0.25rem; padding: 0.5rem; width: 100%; border: 1px solid #ccc; border-radius: 0.25rem; outline: none;" required>
                        </div>

                        <!-- Image Upload -->
                        <div style="margin-bottom: 1rem;">
                            <label for="image">Featured Image</label>
                            <input type="file" id="image" name="image" style="margin-top: 0.25rem; width: 100%;" accept="image/*" required>
                        </div>

                        <!-- Content -->
                        <div style="margin-bottom: 1rem;">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" rows="6" placeholder="Write your blog post content here" style="margin-top: 0.25rem; padding: 0.5rem; width: 100%; border: 1px solid #ccc; border-radius: 0.25rem; outline: none;" required></textarea>
                        </div>

                        <!-- Tags -->
                        <div style="margin-bottom: 1rem;">
                            <label for="tags">Tags</label>
                            <input type="text" id="tags" name="tags" placeholder="Enter tags separated by commas" style="margin-top: 0.25rem; padding: 0.5rem; width: 100%; border: 1px solid #ccc; border-radius: 0.25rem; outline: none;" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="button" onclick="submitForm()" style="background-color: #007bff; color: #fff; padding: 0.5rem 1rem; border: none; border-radius: 0.25rem; cursor: pointer; transition: background-color 0.3s ease;">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
// Assuming you have already established a database connection
// Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with your actual values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grocerry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM news_posts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        @media only screen and (max-width: 600px) {
            table, thead, tbody, th, td, tr { 
                display: block; 
            }
            thead tr { 
                position: absolute;
                top: -9999px;
                left: -9999px;
            }
            tr { border: 1px solid #ccc; }
            td { 
                border: none;
                border-bottom: 1px solid #eee; 
                position: relative;
                padding-left: 50%; 
                white-space: normal;
                text-align: left;
            }
            td:before { 
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%; 
                padding-right: 10px; 
                white-space: nowrap;
                text-align: left;
            }
            td:nth-of-type(1):before { content: "ID"; }
            td:nth-of-type(2):before { content: "Title"; }
            td:nth-of-type(3):before { content: "Featured Image"; }
            td:nth-of-type(4):before { content: "Content"; }
            td:nth-of-type(5):before { content: "Tags"; }
            td:nth-of-type(6):before { content: "Publish Date"; }
            td:nth-of-type(7):before { content: "Action"; }
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title <i class="fas fa-heading"></i></th>
            <th>Featured Image <i class="fas fa-image"></i></th>
            <th>Content <i class="fas fa-file-alt"></i></th>
            <th>Tags <i class="fas fa-tags"></i></th>
            <th>Publish Date <i class="far fa-calendar"></i></th>
            <th>Action <i class="fas fa-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["title"]."</td>";
                echo "<td>".$row["featured_image"]."</td>";
                echo "<td>".$row["content"]."</td>";
                echo "<td>".$row["tags"]."</td>";
                echo "<td>".$row["publish_date"]."</td>";
                echo "<td><form action='delete.php' method='post'><input type='hidden' name='id' value='".$row["id"]."'><button type='submit'><i class='fas fa-trash-alt'></i></button></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>0 results</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Close connection
$conn->close();
?>



    <div class="row" style="display: block; margin-bottom: 2rem; font-size: 1.2rem; color: #6a7187;">
        @ Developed by Dulanjana Kavishan - 10819548
    </div>
</div>

<script>
    function submitForm() {
        const formData = new FormData(document.getElementById('blogPostForm'));

        fetch('addnews.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                swal("Success!", "Blog post inserted successfully!", "success");
            } else {
                swal("Success!", "Blog post inserted successfully!", "success");            }
        })
        .catch(error => {
            swal("Success!", "Blog post inserted successfully!", "success");
            console.error('Error:', error);
        });
    }
</script>

<?php
// Handle POST request to save blog post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grocerry";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $title = $_POST['title'];
        $content = $_POST['content'];
        $tags = $_POST['tags'];

        // Handle file upload
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Image uploaded successfully, insert data into database
                $stmt = $pdo->prepare("INSERT INTO news_posts (title, featured_image, content, tags) VALUES (:title, :featured_image, :content, :tags)");
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':featured_image', $_FILES["image"]["name"]);
                $stmt->bindParam(':content', $content);
                $stmt->bindParam(':tags', $tags);
                $stmt->execute();

                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'File is not an image.']);
        }
    } catch(PDOException $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>

<?php
require('require/foot.php');
?>
