<?php
function getBookTitles($pdo) {
    // Prepare the SQL query
    $query = "SELECT title FROM books ORDER BY title ASC";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $bookTitles = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $bookTitles[] = $row['title'];
    }
    return $bookTitles;
}
?>
