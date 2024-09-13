<?php
function getBorrowedBooks($pdo) {
    // Prepare the SQL query
    $query = "SELECT b.borrow_date, u.firstname, u.lastname, bk.title, b.return_date 
              FROM borrow b 
              JOIN users u ON b.user_id = u.user_id 
              JOIN books bk ON b.book_id = bk.book_id
              ORDER BY STR_TO_DATE(b.borrow_date, '%M %d, %Y') DESC";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $borrowedBooks = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $borrowedBooks[] = [
            'borrow_date' => $row['borrow_date'],
            'name' => $row['firstname'] . ' ' . $row['lastname'],
            'title' => $row['title'],
            'status' => empty($row['return_date']) ? 'Borrowed' : 'Returned'
        ];
    }
    return $borrowedBooks;
}
?>
