<?php require 'connexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $stmt = $pdo->prepare("INSERT INTO produits (description, prix, quantite) VALUES (?, ?, ?)");
    
    
    $stmt->execute([$_POST['description'], $_POST['prix'], $_POST['quantite']]);
    
  
    header("Location: index.php");
    exit; 
}
?>

<h2>Ajouter un produit</h2>
<form method="post">
    <input type="text" name="description" placeholder="Description" ><br>
    <input type="number" name="prix" placeholder="Prix" ><br>
    <input type="number" name="quantite" placeholder="Quantité" ><br>
    <a href="index.php"><button type="submit">Ajouter</button></a>
</form>
