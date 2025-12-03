<?php 
require 'connexion.php'; 

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) {
    die("Produit non trouvé.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $stmt = $pdo->prepare("UPDATE produits SET description = ?, prix = ?, quantite = ? WHERE id = ?");
    $stmt->execute([$_POST['description'], $_POST['prix'], $_POST['quantite'], $id]);

 
    header("Location: index.php");
    exit;
}
?>

<h2>Modifier le produit</h2>
<form method="post">
    <input type="text" name="description" value="<?= htmlspecialchars($p['description']) ?>" required><br>
    <input type="number" name="prix" value="<?= htmlspecialchars($p['prix']) ?>" required><br>
    <input type="number" name="quantite" value="<?= htmlspecialchars($p['quantite']) ?>" required><br>
    <button type="submit">Mettre à jour</button>
</form>
