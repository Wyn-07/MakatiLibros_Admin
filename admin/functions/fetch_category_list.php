<?php
function getCategoryList($pdo) {
    // Prepare the SQL query
    $query = "SELECT DISTINCT bk.categories
              FROM books bk
              ORDER BY bk.categories ASC";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $categoryList = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categoryList[] = [
            'category' => $row['categories']
        ];
    }
    return $categoryList;
}
?>
