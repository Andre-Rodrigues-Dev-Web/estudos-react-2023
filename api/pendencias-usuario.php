<?php
    include_once "conn.php";
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json; charset=UTF-8");
    // Verifica se a requisição é do tipo GET
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Prepara a consulta SQL
        $query = "SELECT id, nome, email, pendencias, data_pendencia FROM login";

        // Executa a consulta
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        // Obtém os resultados
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retorna os resultados como JSON
        header('Content-Type: application/json');
        echo json_encode($results);
    } else {
        // Retorna um erro para outros tipos de requisição
        http_response_code(405);
        echo json_encode(array("message" => "Método não permitido"));
    }
?>
