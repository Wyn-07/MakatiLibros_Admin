<?php
function getBookList($pdo) {
    // Prepare the SQL query
    $query = "SELECT bk.copyright, bk.categories, bk.title, bk.authors
              FROM books bk
              ORDER BY bk.copyright DESC";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $bookList = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $bookList[] = [
            'copyright' => $row['copyright'],
            'category' => $row['categories'],
            'title' => $row['title'],
            'author' => $row['authors']
        ];
    }
    return $bookList;
}
?>
