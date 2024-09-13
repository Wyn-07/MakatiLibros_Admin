<?php
function getReadersList($pdo) {
    // Prepare the SQL query
    $query = "SELECT firstname, lastname, age, address
              FROM users
              ORDER BY lastname, firstname";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $readersList = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $readersList[] = [
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'age' => $row['age'],
            'address' => $row['address']
        ];
    }
    return $readersList;
}
?>
