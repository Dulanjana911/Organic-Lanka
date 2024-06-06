<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have already established a database connection
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

    // Get the ID of the news post to delete
    $id = $_POST['id'];

    // Prepare and execute SQL statement to delete the news post
    $sql = "DELETE FROM news_posts WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // If deletion is successful, redirect back to the news page or any other appropriate page
        header("Location: addnews.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
