<?php require 'connexion.php'; ?>

<h2>Produits</h2>
<a href="create.php">Ajouter</a>
<table border="1" cellpadding="5">
<tr>
  <th>ID</th>
  <th>Description</th>
  <th>Prix</th>
  <th>Quantité</th>
  <th>Actions</th>
</tr>
<?php

$produits = $pdo->query("SELECT * FROM produits")->fetchAll(PDO::FETCH_ASSOC);
foreach ($produits as $p): 
?>
<tr>
  <td><?= $p['id'] ?></td> 
  <td><?= $p['description'] ?></td>
  <td><?= $p['prix'] ?></td>
  <td><?= $p['quantite'] ?></td>
  <td>
    <a href="update.php?id=<?= $p['id'] ?>">Modifier</a>
    <a href="delete.php?id=<?= $p['id'] ?>" onclick="return confirm(' voulais vous vraiment Supprimer ?')">Supprimer</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
