<?php
function getAuthorList($pdo) {
    // Prepare the SQL query
    $query = "SELECT DISTINCT bk.authors
              FROM books bk
              ORDER BY bk.authors ASC";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $authorList = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $authorList[] = [
            'author' => $row['authors']
        ];
    }
    return $authorList;
}
?>
