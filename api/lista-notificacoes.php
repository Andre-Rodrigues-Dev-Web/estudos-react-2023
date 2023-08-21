<?php
    include_once "conn.php";
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json; charset=UTF-8");
    // Verifica se o método da requisição é GET
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Obtém o ID do usuário da consulta
        $idUsuario = $_GET['id'];

        // Prepara a consulta de seleção
        $sql = "SELECT id, titulo_notificacoes, data_notificacoes, texto_notificacoes, status_notificacoes FROM login WHERE id = :id";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $idUsuario);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Retorna o resultado como JSON
            header('Content-Type: application/json');
            echo json_encode($result);
        } catch (PDOException $e) {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Erro na consulta: " . $e->getMessage();
        }
    } else {
        header("HTTP/1.1 405 Method Not Allowed");
        echo "Método não permitido";
    }
?>
