<?php
include 'components/pdo.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: view.php');
    exit();
}

$id = (int) $_GET['id'];

$sql = 'DELETE FROM users WHERE id = ? LIMIT 1';
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$id]);
    header('Location: view.php');
    exit();
} catch (PDOException $e) {
    echo 'Error deleting user: ' . $e->getMessage();
}
?>
