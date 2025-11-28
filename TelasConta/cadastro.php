<?php

// 1. Configuração do Banco de Dados
$servername = "localhost";
$username = "root"; // Mude para o seu usuário do MySQL
$password = "";   // Mude para sua senha do MySQL
$dbname = "novacode"; // Mude para o nome do seu banco de dados
$table_cadastro = "cadastro"; // Nome da tabela de cadastro
$table_login = "login";

// 2. Conexão com o Banco de Dados
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // Configura o modo de erro do PDO para lançar exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de Conexão: " . $e->getMessage());
}

// 3. Verifica se o formulário foi submetido (se o botão 'cadastrar' foi clicado)
if (isset($_POST['cadastrar'])) {
    
    // 4. Coleta dos Dados do Formulário via POST
    // Usamos o operador de coalescência nula (??) para evitar erros caso algum campo não esteja presente, 
    // embora o HTML use 'required' para a maioria.
    $nomecliente         = $_POST['nomecliente']     ?? '';
    $sobrenomecliente    = $_POST['sobrenomecliente']    ?? '';
    $email               = $_POST['email']      ?? '';
    $senhacliente        = $_POST['senhacliente']   ?? '';
    
    // 5. Preparação da Query SQL
    // Usamos prepared statements para segurança (prevenção de SQL Injection)
    try {
        // Inicia a transação — se der erro em uma query, nenhuma das duas é executada
        $conn->beginTransaction();

        $sql1 = "INSERT INTO $table_cadastro (
                    cadastro_nome, cadastro_sobrenome, cadastro_email, cadastro_senha
                ) VALUES (
                    :nomecliente, :sobrenomecliente, :email, :senhacliente
                )";

        // 6. Bind dos Parâmetros SQL
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':nomecliente', $nomecliente);
        $stmt->bindParam(':sobrenomecliente', $sobrenomecliente);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senhacliente', $senhacliente);
        $stmt->execute();

        // 7. Preparação da Query SQL2
        $sql2 = "INSERT INTO $table_login (
                login_nome, login_email, login_senha
            ) VALUES (
                :nomecliente, :email, :senhacliente
            )";

        // 8. Bind dos Parâmetros SQL2
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bindParam(':nomecliente', $nomecliente);
        $stmt2->bindParam(':email', $email);
        $stmt2->bindParam(':senhacliente', $senhacliente);
        $stmt2->execute();

        // 9. Confirma a transação
        $conn->commit();
        
        //após o cadastro, exibir a mensagem e redirecionar para o menu
        //Podemos trocar por uma página a linha abaixo
        //echo "<!DOCTYPE html><html lang='pt-br'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title>Sucesso</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'></head><body><div class='container mt-5'><div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div><a href='../index.php' class='btn btn-primary'>Voltar à página inicial</a></div></body></html>";
        header("Location: ../inicio.php");
        //header("refresh:2;url=../index.php");
    } catch (PDOException $e) {
        // Em caso de erro na execução da query
        //Podemos trocar por uma página a linha abaixo
        echo "<!DOCTYPE html><html lang='pt-br'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title>Erro</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'></head><body><div class='container mt-5'><div class='alert alert-danger' role='alert'>Erro no cadastro: " . $e->getMessage() . "</div><a href='cadastro.html' class='btn btn-warning'>Tentar Novamente</a></div></body></html>";
    }
} else {
    // Caso a página seja acessada diretamente sem submissão de formulário
    header("Location: cadastro.html");
    exit();
}

// 8. Fecha a conexão
$conn = null;
?>