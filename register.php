<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stock_db');
if ($mysqli->connect_error) {
    die('Erreur de connexion : ' . $mysqli->connect_error);
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username']);
    $p = $_POST['password'];
    if ($u && $p) {
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param('s', $u);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = 'Nom d’utilisateur déjà pris';
        } else {
            $hash = password_hash($p, PASSWORD_DEFAULT);
            $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param('ss', $u, $hash);
            $stmt->execute();
            header('Location: login.php');
            exit;
        }
        $stmt->close();
    } else {
        $error = 'Veuillez remplir tous les champs';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 100px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 8px;
            display: inline-block;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        p {
            margin-top: 20px;
        }
        p a {
            text-decoration: none;
            color: #3498db;
        }
        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Inscription</h2>
    <?php if ($error): ?><p class="error"><?= htmlentities($error) ?></p><?php endif; ?>
    <form method="POST">
        <label for="username">Nom d’utilisateur:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">S’inscrire</button>
    </form>
    <p><a href="login.php">Déjà inscrit ?</a></p>
</div>
</body>
</html>
