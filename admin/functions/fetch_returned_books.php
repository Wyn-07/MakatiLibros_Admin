<?php
function getReturnedBooks($pdo) {
    // Prepare the SQL query
    $query = "SELECT b.return_date, u.firstname, u.lastname, bk.title
              FROM borrow b 
              JOIN users u ON b.user_id = u.user_id 
              JOIN books bk ON b.book_id = bk.book_id
              WHERE b.return_date IS NOT NULL AND b.return_date != ''
              ORDER BY STR_TO_DATE(b.return_date, '%M %d, %Y') DESC";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $returnedBooks = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $returnedBooks[] = [
            'return_date' => $row['return_date'],
            'name' => $row['firstname'] . ' ' . $row['lastname'],
            'title' => $row['title']
        ];
    }
    return $returnedBooks;
}
?>
