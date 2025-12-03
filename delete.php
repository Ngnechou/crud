<?php
require 'connexion.php';


$id = $_GET['id'] ?? null; 

    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
    $stmt->execute([$id]);

header("Location: index.php");
exit; 
?>
