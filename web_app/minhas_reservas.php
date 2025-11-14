<?php
session_start();
include "db.php";

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$login = $_SESSION['login'];

$sql = "SELECT r.id_reserva, e.nome AS nome_evento, e.local, e.data, e.hora, r.data_reserva, r.status_reserva
        FROM reservas r
        JOIN eventos e ON r.id_evento = e.id_evento
        WHERE login_usuario = ?
        ORDER BY data_reserva DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Reservas</title>
    <link rel="stylesheet" href="css/eventos.css">

    <style>
        .btn-api {
            margin-top: 8px;
            display: inline-block;
            background: #118787;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            border: none;
        }
        .btn-api:hover { background: #0a5d5d; }

        .weather {
            margin-top: 10px;
            font-size: 14px;
            background: #e7f7f7;
            padding: 8px;
            border-radius: 8px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="container">

        <header>
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == 'sucesso') {
                    echo '<p class="mensagem-sucesso">✅ Sua reserva foi feita com sucesso!</p>';
                } elseif ($_GET['msg'] == 'ja_reservado') {
                    echo '<p class="mensagem-aviso">⚠️ Você já possui uma reserva ativa para este evento.</p>';
                }
            }
            ?>

            <h1>🎟️ Minhas Reservas</h1>
            <a href="home.php" class="voltar">← Voltar para Home</a>
        </header>

        <section class="lista-eventos">

            <?php if ($result->num_rows > 0): ?>
                <?php while ($reserva = $result->fetch_assoc()): ?>

                    <div class="card-evento">
                        <h2><?= htmlspecialchars($reserva['nome_evento']); ?></h2>

                        <p><strong>Local:</strong> <?= htmlspecialchars($reserva['local']); ?></p>
                        <p><strong>Data:</strong> <?= date("d/m/Y", strtotime($reserva['data'])); ?></p>
                        <p><strong>Hora:</strong> <?= date("H:i", strtotime($reserva['hora'])); ?></p>
                        <p><strong>Data da Reserva:</strong> <?= date("d/m/Y H:i", strtotime($reserva['data_reserva'])); ?></p>
                        <p><strong>Status:</strong> <?= ucfirst($reserva['status_reserva']); ?></p>

                        <!-- BOTÃO DE LOCALIZAÇÃO -->
                        <a class="btn-api"
                           href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($reserva['local']); ?>"
                           target="_blank">
                            📍 Ver Localização
                        </a>

                        <!-- BOTÃO DE CLIMA -->
                        <button class="btn-api"
                            onclick='mostrarClima(this, <?= json_encode($reserva["local"]); ?>, <?= json_encode($reserva["data"]); ?>)'>
                            ⛅ Ver Clima
                        </button>

                        <div class="weather"></div>

                        <?php if ($reserva['status_reserva'] == 'ativa'): ?>
                            <form action="cancelar_reserva.php" method="POST">
                                <input type="hidden" name="id_reserva" value="<?= $reserva['id_reserva']; ?>">
                                <button type="submit" class="btn-cancelar">Cancelar Reserva</button>
                            </form>
                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>
                <p class="mensagem">Você ainda não possui reservas.</p>
            <?php endif; ?>

        </section>

    </div>

    <script>
        function mostrarClima(botao, local, data) {
            const div = botao.nextElementSibling;

            div.innerHTML = "Carregando clima...";

            fetch("clima_evento.php?local=" + encodeURIComponent(local) + "&data=" + data)
                .then(r => r.text())
                .then(res => div.innerHTML = res)
                .catch(() => div.innerHTML = "Erro ao buscar clima.");
        }
    </script>

</body>
</html>
