<?php
session_start();

if (!isset($_SESSION['login_id'])) {
    die("ERRO: Usuário não está logado.");
}

$login_id = $_SESSION['login_id'];

// Recebe dados do JS
$carrinho = json_decode($_POST["carrinho"], true);

if (!$carrinho || count($carrinho) === 0) {
    die("ERRO: Carrinho vazio.");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "novacode";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Inicializa variáveis
    $produto_id = null;
    $personalizar_id = null;
    $quantidade_total = 0;
    $preco_total = 0;

    foreach ($carrinho as $item) {
        // Define IDs
        if (!empty($item["produto_id"])) {
            $produto_id = $item["produto_id"];
        }
        if (!empty($item["personalizar_id"])) {
            $personalizar_id = $item["personalizar_id"];
        }

        // Quantidade total (soma de todos os itens)
        $quantidade_total += $item["quantidade"];

        // Preço total
        $preco_item = str_replace("R$ ", "", $item["preco"]);
        $preco_item = str_replace(",", ".", $preco_item);
        $preco_total += $preco_item * $item["quantidade"];
    }

    $preco_total = number_format($preco_total, 2, ".", "");
    $pagamento = "Pendente";

    // Insere um único pedido
    $sql = "INSERT INTO pedidos 
            (login_id, produto_id, personalizar_id, quantidade, pedido_pagamento, pedido_preco)
            VALUES (:login_id, :produto_id, :personalizar_id, :quantidade, :pagamento, :preco)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ":login_id" => $login_id,
        ":produto_id" => $produto_id,
        ":personalizar_id" => $personalizar_id,
        ":quantidade" => $quantidade_total,
        ":pagamento" => $pagamento,
        ":preco" => $preco_total
    ]);

    echo "OK";

} catch (PDOException $e) {
    echo "ERRO: " . $e->getMessage();
}
?>