<?php
require_once 'database.php';
//insertion des valeurs
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $req = $pdo->prepare(
        "INSERT INTO Utilisateur (Nom, Email, Password)
         VALUES (:username, :email, :password)"
    );

    $req->execute([
        ':username' => $username,
        ':email'    => $email,
        ':password' => $password
    ]);

    echo "✅ Inscription réussie";
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inscription</title>
<link href="src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="bg-white p-8 rounded shadow-md w-full max-w-md relative">
    <h1 class="text-2xl font-bold mb-6 text-center">Inscription</h1>
    <form method="POST" class="space-y-4">
        <input type="text" name="username" placeholder="Nom d'utilisateur" class="w-full p-3 border rounded" required>
        <input type="email" name="email" placeholder="Email" class="w-full p-3 border rounded" required>
        <input type="password" name="password" placeholder="Mot de passe" class="w-full p-3 border rounded" required>
        <input type="password" name="confirm_password" placeholder="Confirmer mot de passe" class="w-full p-3 border rounded" required>
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded hover:bg-blue-600 transition">S'inscrire</button>
    </form>
</div>

</body>
</html>
