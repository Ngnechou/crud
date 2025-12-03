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
  
    $stmt = $pdo->prepare("UPDATE produits SET description = ?, prix = ?, quantite = ?, name =? WHERE id = ?");
    $stmt->execute([$_POST['description'], $_POST['prix'], $_POST['quantite'], $_POST['name'], $id]);

 
    header("Location: index.php");
    exit;
}
?>

<h2>Modifier le produit</h2>
<form method="post">
    <input type="text" name="name" value="<?= htmlspecialchars($p['name']) ?>" ><br>
    <input type="text" name="description" value="<?= htmlspecialchars($p['description']) ?>" ><br>
    <input type="number" name="prix" value="<?= htmlspecialchars($p['prix']) ?>" ><br>
    <input type="number" name="quantite" value="<?= htmlspecialchars($p['quantite']) ?>" ><br>
    <button type="submit">Mettre à jour</button>
</form>
