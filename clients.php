<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stock_db');

// Vérifier si l'utilisateur est un administrateur
if (empty($_SESSION['admin_id'])) {
    header('Location: loginad.php'); // Rediriger vers la page de login si non admin
    exit;
}

// Supprimer un client
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $mysqli->query("DELETE FROM clients WHERE id = $id");
    header("Location: clients.php");
    exit;
}

// Récupérer la liste des clients
$result = $mysqli->query("SELECT * FROM clients");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Clients</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f8; padding: 40px; }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        h2 { margin: 0; color: #2c3e50; }
        .add-btn {
            padding: 10px 20px;
            background-color: #2ecc71;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        .add-btn:hover {
            background-color: #27ae60;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #3498db;
            color: white;
        }
        tr:nth-child(even) { background: #f2f2f2; }
        a.delete-btn {
            background: #e74c3c;
            color: white;
            padding: 5px 12px;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="header">
    <h2>Liste des Clients</h2>
    <a class="add-btn" href="ajouter_client.php">Ajouter un Client</a>
</div>
<table>
    <tr><th>ID</th><th>Nom d'utilisateur</th><th>Action</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlentities($row['username']) ?></td>
        <td><a class="delete-btn" href="?delete=<?= $row['id'] ?>" onclick="return confirm('Supprimer ce client ?')">Supprimer</a></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
