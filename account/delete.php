<?php
session_start();
include_once 'dbseconnect.php';

// Retrouver info utilisateur
if(isset($_SESSION['user_id'])){
    // Prepare our query to show the user their info
    $query = "SELECT name, country, email, password, phone, id, language, image  FROM users WHERE id = :user_id";
    $user = $conn->prepare($query);
    $user->bindValue(':user_id', $_SESSION['user_id']);
    $user->execute();

    // Store the result
    $result = $user->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];

    // Create the SQL statement
    $sql = "DELETE FROM users WHERE id= $id";

    // Paste the SQL statement to the database
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";
?>