<?php
session_start();
include "db.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_reserva = $_POST['id_reserva'];
    $login = $_SESSION['login'];

    // Atualiza o status da reserva para "cancelada", garantindo que a reserva pertence ao usuário
    $sql = "UPDATE reservas SET status_reserva = 'cancelada' WHERE id_reserva = ? AND login_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_reserva, $login);
    $stmt->execute();

    // Redireciona de volta para minhas reservas
    header("Location: minhas_reservas.php");
    exit;
} else {
    header("Location: minhas_reservas.php");
    exit;
}
