<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choisir votre Espace</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            margin-top: 100px;
        }
        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }
        .choice {
            display: inline-block;
            margin: 20px;
            padding: 30px 50px;
            border: 2px solid #333;
            border-radius: 10px;
            text-decoration: none;
            font-size: 20px;
            color: #333;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }
        .choice:hover {
            background-color: #e0e0e0;
        }
        p {
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur la plateforme de gestion de stock</h1>
        <p>Veuillez choisir votre espace :</p>
        <a class="choice" href="login.php">👤 Espace Client</a>
        <a class="choice" href="loginad.php">🛠️ Espace Admin</a>
    </div>
</body>
</html>
