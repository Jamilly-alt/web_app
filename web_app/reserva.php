<?php
session_start();
include "db.php";

// Verifica se o usuário está logado
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['id_evento'])) {
    $id_evento = $_POST['id_evento'];
    $login = $_SESSION['login'];

    // Verifica se o evento existe
    $sql_evento = "SELECT * FROM eventos WHERE id_evento = ?";
    $stmt_evento = $conn->prepare($sql_evento);
    $stmt_evento->bind_param("i", $id_evento);
    $stmt_evento->execute();
    $result_evento = $stmt_evento->get_result();

    if ($result_evento->num_rows === 0) {
        echo "<script>alert('Evento não encontrado.'); window.history.back();</script>";
        exit;
    }

    // Verifica se já existe reserva ativa para esse evento
    $sql_check = "SELECT * FROM reservas 
                  WHERE login_usuario = ? 
                  AND id_evento = ? 
                  AND status_reserva = 'ativa'";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("si", $login, $id_evento);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "<script>alert('Você já possui uma reserva ativa para este evento!'); window.history.back();</script>";
        exit;
    }

    // Insere nova reserva
    $sql_insert = "INSERT INTO reservas (login_usuario, id_evento, status_reserva)
                   VALUES (?, ?, 'ativa')";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("si", $login, $id_evento);

    if ($stmt_insert->execute()) {
        echo "<script>alert('Reserva realizada com sucesso!'); window.location.href='meus_eventos.php';</script>";
    } else {
        echo "<script>alert('Erro ao realizar reserva.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Nenhum evento selecionado.'); window.history.back();</script>";
}
?>
