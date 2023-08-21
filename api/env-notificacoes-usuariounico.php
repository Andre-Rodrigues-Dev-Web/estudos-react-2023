<?php
    include_once "conn.php";
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    // Verifica se o método da requisição é POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados da requisição
        $id = $_POST['id'];
        $titulo = $_POST['titulo_notificacoes'];
        $data = $_POST['data_notificacoes'];
        $texto = $_POST['texto_notificacoes'];
        $status = $_POST['status_notificacoes'];

        // Prepara a consulta de atualização
        $sql = "UPDATE login SET titulo_notificacoes = :titulo, data_notificacoes = :data, texto_notificacoes = :texto, status_notificacoes = :status WHERE id = :id";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':data', $data);
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $response = array('success' => true, 'message' => 'Registro atualizado com sucesso.');
        } catch (PDOException $e) {
            $response = array('success' => false, 'message' => 'Erro ao atualizar registro: ' . $e->getMessage());
        }

        // Retorna a resposta como JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        header("HTTP/1.1 405 Method Not Allowed");
        echo "Método não permitido";
    }
?>
