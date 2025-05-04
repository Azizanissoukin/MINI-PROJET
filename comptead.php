<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stock_db');
if ($mysqli->connect_error) {
    die('Erreur de connexion : ' . $mysqli->connect_error);
}
if (empty($_SESSION['admin_id'])) {
    header('Location: loginad.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #ecf0f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 60px auto;
            padding: 40px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .card {
            width: 45%;
            background-color: #f9f9f9;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 30px;
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            color: #2980b9;
            margin-bottom: 20px;
        }

        .card a {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .card a:hover {
            background-color: #2980b9;
        }

        .logout-btn {
            display: block;
            text-align: center;
            margin: 40px auto 0;
            padding: 12px 30px;
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            width: fit-content;
        }

        .logout-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bienvenue, <?= htmlentities($_SESSION['username']) ?> 👋</h1>

    <div class="dashboard">
        <div class="card">
            <h2>Gestion des Clients</h2>
            <a href="clients.php">gestion Clients</a>
        </div>

        <div class="card">
            <h2>Gestion des Produits</h2>
            <a href="produits.php"> gestion produits</a>
        </div>
    </div>

    <a class="logout-btn" href="logout.php">Se déconnecter</a>
</div>
</body>
</html>
