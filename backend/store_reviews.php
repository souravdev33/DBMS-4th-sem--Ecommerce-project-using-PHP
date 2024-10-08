<?php
// Start the session
session_start();

include 'config.php';
$sql = "SELECT ProductID, Email, rating, comment, created_at FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding: 15px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #e2e6ea;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        .review-rating {
            color: #ffc107;
        }

        .review-comment {
            font-style: italic;
        }
    </style>
</head>

<body>
    <?php 
        // include 'sidebar.php'; 
    ?>
    <div class="container mt-4">
        <h2>Product Reviews</h2>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($review = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($review['ProductID']); ?></td>
                        <td><?php echo htmlspecialchars($review['Email']); ?></td>
                        <td class="review-rating"><?php echo str_repeat('★', $review['rating']); ?></td>
                        <td class="review-comment"><?php echo htmlspecialchars($review['comment']); ?></td>
                        <td><?php echo htmlspecialchars($review['created_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
