<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'stock_db');

// Vérification si l'utilisateur est connecté en tant qu'administrateur
if (empty($_SESSION['admin_id'])) {
    header('Location: loginad.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        // Vérifier si le nom d'utilisateur existe déjà dans la base de données
        $result = $mysqli->query("SELECT * FROM clients WHERE username = '$username'");
        if ($result->num_rows > 0) {
            $error = "Un client avec ce nom d'utilisateur existe déjà.";
        } else {
            // Hashage du mot de passe avant de l'insérer dans la base de données
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Insertion du client dans la base de données
            $query = "INSERT INTO clients (username, password) VALUES ('$username', '$password_hash')";
            if ($mysqli->query($query)) {
                header('Location: clients.php'); // Redirection vers la liste des clients
                exit;
            } else {
                $error = "Erreur lors de l'ajout du client. Veuillez réessayer.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Client</title>
    <style>
        body { font-family: sans-serif; background: #f4f6f8; padding: 40px; }
        h2 { color: #2c3e50; }
        form { background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #2ecc71; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #27ae60;
        }
        p.error { color: red; }
    </style>
</head>
<body>
    <h2>Ajouter un Client</h2>
    <form method="POST">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>
        <br>
        <label for="confirm_password">Confirmer le mot de passe</label>
        <input type="password" name="confirm_password" required>
        <br>
        <input type="submit" value="Ajouter Client">
    </form>

    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
