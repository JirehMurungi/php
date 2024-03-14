<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "textbooks";

// Create connection
$conn = new mysqli('localhost', 'root', '1234', 'textbooks');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement to insert data into the table
$stmt = $conn->prepare("INSERT INTO textbooks (title, author, isbn, publisher, published_year, edition, pages, price, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisids", $title, $author, $isbn, $publisher, $published_year, $edition, $pages, $price, $description);

// Retrieve form data
$title = $_POST["title"];
$author = $_POST["author"];
$isbn = $_POST["isbn"];
$publisher = $_POST["publisher"];
$published_year = $_POST["published_year"];
$edition = $_POST["edition"];
$pages = $_POST["pages"];
$price = $_POST["price"];
$description = $_POST["description"];

// Execute the prepared statement
if ($stmt->execute()) {
    echo "New record inserted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
