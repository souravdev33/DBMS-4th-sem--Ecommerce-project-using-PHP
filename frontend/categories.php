<?php
// categories.php

// Include the database configuration
include 'config.php';

// Fetch categories from the database
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="row">';
    echo '<div class="col d-flex justify-content-center align-items-center flex-wrap">';
    while ($row = $result->fetch_assoc()) {
        echo '<h4 class="p-3 m-3"><span class="badge badge-info">';
        echo '<a href="category.php?id=' . intval($row['CategoryID']) . '" class="text-decoration-none text-white">';
        echo htmlspecialchars($row['CategoryName']) . '</a></span></h4>';
    }
    echo '</div>';
    echo '</div>';
} else {
    echo "No categories found.";
}
