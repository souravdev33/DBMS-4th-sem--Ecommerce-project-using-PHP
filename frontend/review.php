<?php
// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection
include 'config.php';

// Ensure the user is logged in
if (!isset($_SESSION['email'])) {
    echo "Please log in to submit a review.";
    exit;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form and session
    $product_id = mysqli_real_escape_string($conn, $_SESSION['ProductID']);
    $email = mysqli_real_escape_string($conn, $_SESSION['email']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);

    // Insert review into database
    $sql = "INSERT INTO reviews (ProductID, email, rating, comment, created_at) VALUES ('$product_id', '$email', '$rating', '$comment', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch reviews for a specific product
$product_id = mysqli_real_escape_string($conn, $_SESSION['ProductID']);
$sql = "SELECT email, rating, comment, created_at FROM reviews WHERE ProductID = '$product_id'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Product Reviews</title>
    <style>
        body {
            padding: 20px;
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #333;
        }

        .review-form,
        .reviews {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .review-form input[type="number"],
        .review-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .review-form input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .review-form input[type="submit"]:hover {
            background-color: #218838;
        }

        .review-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-item strong {
            display: block;
            color: #555;
        }

        .review-item .rating {
            color: #f39c12;
        }

        .review-item .comment {
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h2>Write a Review</h2>
    <div class="review-form">
        <form method="post" action="review.php">
            <input type="hidden" name="ProductID" value="<?php echo $product_id; ?>">
            <label for="rating">Rating (1-5):</label><br>
            <input type="number" id="rating" name="rating" min="1" max="5" required><br>
            <label for="comment">Comment:</label><br>
            <textarea id="comment" name="comment" required></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <h2>Reviews</h2>
    <div class="reviews">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='review-item'><strong>" . htmlspecialchars($row["email"]) . "</strong> (" . htmlspecialchars($row["created_at"]) . ")<br>";
                echo "<span class='rating'>Rating: " . htmlspecialchars($row["rating"]) . "/5</span><br>";
                echo "<p class='comment'>" . htmlspecialchars($row["comment"]) . "</p></div>";
            }
        } else {
            echo "No reviews yet.";
        }

        $conn->close();
        ?>
    </div>

</body>

</html>
