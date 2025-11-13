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

    // Buscar ID do usuário pelo login
    $sql_user = "SELECT id_usuario FROM usuario WHERE login = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("s", $login);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    $user = $result_user->fetch_assoc();

    if ($user) {
        $id_usuario = $user['id_usuario'];

        // Verifica se já tem reserva ativa nesse evento
        $sql_check = "SELECT * FROM reservas WHERE id_usuario = ? AND id_evento = ? AND status_reserva = 'ativa'";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("ii", $id_usuario, $id_evento);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            echo "<script>
                    alert('Você já possui uma reserva ativa para este evento!');
                    window.history.back();
                  </script>";
        } else {
            // Inserir nova reserva
            $sql_insert = "INSERT INTO reservas (id_usuario, id_evento, status_reserva) VALUES (?, ?, 'ativa')";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ii", $id_usuario, $id_evento);

            if ($stmt_insert->execute()) {
                echo "<script>
                        alert('Reserva realizada com sucesso!');
                        window.location.href='eventos.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Erro ao realizar reserva.');
                        window.history.back();
                      </script>";
            }
        }
    } else {
        echo "<script>
                alert('Usuário não encontrado.');
                window.history.back();
              </script>";
    }
}
?>
