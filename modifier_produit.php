<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stock_db');

// Vérification de la connexion de l'administrateur
if (empty($_SESSION['admin_id'])) {
    header('Location: loginad.php');
    exit;
}

// Vérifier si un ID de produit est passé dans l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Récupérer les informations du produit
    $result = $mysqli->query("SELECT * FROM produits WHERE id = $id");
    
    if ($result->num_rows == 0) {
        die("Produit non trouvé.");
    }
    $produit = $result->fetch_assoc();
} else {
    die("Aucun ID de produit fourni.");
}

// Modifier les informations du produit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prix = floatval($_POST['prix']);
    $quantite = intval($_POST['quantite']);
    
    // Mettre à jour les informations du produit
    $mysqli->query("UPDATE produits SET nom = '$nom', prix = $prix, quantite = $quantite WHERE id = $id");
    header("Location: produits.php"); // Redirection après modification
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Produit</title>
    <style>
        body { font-family: sans-serif; background: #f9f9f9; padding: 40px; }
        form { margin-bottom: 30px; background: #fff; padding: 20px; border-radius: 8px; }
        input[type="text"], input[type="number"] { padding: 8px; margin-right: 10px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { padding: 8px 16px; background: #2ecc71; color: white; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background: #27ae60; }
    </style>
</head>
<body>
<h2>Modifier un Produit</h2>
<form method="post">
    <input type="text" name="nom" value="<?= htmlentities($produit['nom']) ?>" required>
    <input type="number" name="prix" value="<?= $produit['prix'] ?>" step="0.01" required>
    <input type="number" name="quantite" value="<?= $produit['quantite'] ?>" required>
    <input type="submit" name="modifier" value="Modifier">
</form>

</body>
</html>
