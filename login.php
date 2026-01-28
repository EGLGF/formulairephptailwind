
<?php
require_once 'database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "✅ Connexion réussie";
    } else {
        $error = "❌ Email ou mot de passe incorrect";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion</title>
<link href="src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="bg-white p-8 rounded shadow-md w-full max-w-md relative">
    <h1 class="text-2xl font-bold mb-6 text-center">Connexion</h1>
    <!-- Formulaire -->
    <form method="POST" class="space-y-4">
        <input type="text" name="username" placeholder="Nom d'utilisateur" class="w-full p-3 border rounded" required>
        <input type="email" name="email" placeholder="Email" class="w-full p-3 border rounded" required>
        <input type="password" name="password" placeholder="Mot de passe" class="w-full p-3 border rounded" required>
        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded hover:bg-blue-600 transition">Se connecter</button>
    </form>
</div>

</body>
</html>