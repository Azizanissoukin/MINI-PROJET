<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stock_db');
if (empty($_SESSION['admin_id'])) {
    header('Location: loginad.php');
    exit;
}

// Supprimer produit
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $mysqli->query("DELETE FROM produits WHERE id = $id");
    header("Location: produits.php");
    exit;
}

// Ajouter produit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prix = floatval($_POST['prix']);
    $quantite = intval($_POST['quantite']);
    $mysqli->query("INSERT INTO produits (nom, prix, quantite) VALUES ('$nom', $prix, $quantite)");
    header("Location: produits.php");
    exit;
}

$result = $mysqli->query("SELECT * FROM produits");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Produits</title>
    <style>
        body { font-family: sans-serif; background: #f9f9f9; padding: 40px; }
        form { margin-bottom: 30px; background: #fff; padding: 20px; border-radius: 8px; }
        input[type="text"], input[type="number"] { padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { padding: 8px 16px; background: #2ecc71; color: white; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background: #27ae60; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: center; }
        th { background: #2980b9; color: white; }
        .action a { margin: 0 5px; text-decoration: none; padding: 5px 10px; border-radius: 6px; }
        .delete { background: #e74c3c; color: white; }
        .edit { background: #f1c40f; color: white; }
    </style>
</head>
<body>
<h2>Ajouter un Produit</h2>
<form method="post">
    <input type="text" name="nom" placeholder="Nom du produit" required>
    <input type="number" name="prix" placeholder="Prix" step="0.01" required>
    <input type="number" name="quantite" placeholder="Quantité" required>
    <input type="submit" name="ajouter" value="Ajouter">
</form>

<h2>Liste des Produits</h2>
<table>
    <tr><th>ID</th><th>Nom</th><th>Prix</th><th>Quantité</th><th>Action</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlentities($row['nom']) ?></td>
        <td><?= $row['prix'] ?> €</td>
        <td><?= $row['quantite'] ?></td>
        <td class="action">
            <a class="edit" href="modifier_produit.php?id=<?= $row['id'] ?>">Modifier</a>
            <a class="delete" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
