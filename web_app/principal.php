<?php
session_start();
if (empty($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$nome = $_SESSION['user']['nome'];
$tipo = $_SESSION['user']['tipo'];
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h2>

        <ul>
            <li><a href="alterar_senha.php">Alterar Senha</a></li>
            <?php if ($tipo === 'A'): ?>
                <li><a href="cadastro.php">Cadastrar Usuário</a></li>
                <li><a href="consultar.php">Consultar Usuários</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </div>
</body>
</html>
