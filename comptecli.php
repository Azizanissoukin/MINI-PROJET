<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page avec Contenu Fixe</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f9fafb;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 100px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 1.1em;
            color: #555;
        }
        .fixed-content {
            background: #f4f6f8;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
        }
        .logout-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background 0.3s ease;
        }
        .logout-btn:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Bienvenue sur notre site !</h1>
    <p>Nous vous proposons des produits de qualité à des prix avantageux.</p>

    <!-- Contenu fixe -->
    <div class="fixed-content">
        <h3>Promotions et Offres Spéciales</h3>
        <p>Profitez de nos offres exceptionnelles ! Obtenez 10% de réduction sur vos premiers achats avec le code <strong>BIENVENUE10</strong> à la caisse. Offrez-vous des produits de qualité à des prix avantageux.</p>
    </div>

    <a class="logout-btn" href="logout.php">Se déconnecter</a>
</div>
</body>
</html>
