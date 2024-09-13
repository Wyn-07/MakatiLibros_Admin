<?php
function getReadersNames($pdo) {
    // Prepare the SQL query
    $query = "SELECT firstname, lastname FROM users ORDER BY lastname, firstname";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    // Fetch all results
    $readersNames = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $readersNames[] = $row['firstname'] . ' ' . $row['lastname'];
    }
    return $readersNames;
}
?>
