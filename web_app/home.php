<?php
session_start();

// Se o usuário não estiver logado, redireciona
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$nomeUsuario = $_SESSION['nome'];
$tipoUsuario = $_SESSION['tipo']; // 'A' para admin, 'U' para comum
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistema de Reservas</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="home-container">
        <h1>Bem-vindo(a), <?php echo htmlspecialchars($nomeUsuario); ?>!</h1>
        <p class="subtitulo">Escolha uma das opções abaixo para continuar:</p>

        <?php if ($tipoUsuario === 'U'): ?>
    <div class="botoes">
        <a href="eventos.php" class="btn">🎭 Eventos Culturais</a>
        <a href="minhas_reservas.php" class="btn">📅 Minhas Reservas</a>
        <a href="editar_perfil.php" class="btn">⚙️ Editar Perfil</a>
    </div>
<?php endif; ?>

          <?php if ($tipoUsuario === 'A'): ?>
    <div class="botoes admin-botoes">
        <a href="criar_evento.php" class="btn admin">➕ Criar Evento</a>
        <a href="consultar_eventos.php" class="btn admin">📋 Consultar Eventos</a>
        <a href="consultar_reservas.php" class="btn admin">📊 Ver Reservas</a>
    </div>
<?php endif; ?>

            <a href="logout.php" class="btn sair">🚪 Sair</a>
        </div>
    </div>
</body>
</html>
