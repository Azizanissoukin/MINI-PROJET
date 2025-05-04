<?php
session_start();

$identifiant_admin = "admin";
$motdepasse_admin = "admin123";

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['username']);
    $p = $_POST['password'];

    if ($u === $identifiant_admin && $p === $motdepasse_admin) {
        $_SESSION['admin_id'] = 1;
        $_SESSION['username'] = $u;
        header('Location: comptead.php');
        exit;
    } else {
        $error = 'Identifiants invalides';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
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
    </style>
</head>
<body>
<div class="container">
    <h2>Connexion Admin</h2>
    <?php if ($error): ?><p class="error"><?= htmlentities($error) ?></p><?php endif; ?>
    <form method="POST">
        <label for="username">Nom d’utilisateur:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>
</div>
</body>
</html>
