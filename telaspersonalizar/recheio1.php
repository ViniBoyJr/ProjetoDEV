<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['login_nome'])) {
    header("Location: ./telasconta/login.html");
    exit();
}
//Armazena o nome do usuario
//$nome_usuario = htmlspecialchars($_SESSION['login_nome']); Antes
$nome_usuario = mb_convert_case(htmlspecialchars($_SESSION['login_nome']), MB_CASE_TITLE, "UTF-8"); // Agora: para que a primeira letra seja sempre maiúscula

// Tempo limite em segundos (60 min = 3600s)
$timeout = 3600; 

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    // Tempo expirou → força logout
    session_unset();
    session_destroy();
    header("Location: ../index.html");  // ou direto para a página inicial
    exit();
}

// Atualiza o tempo da última atividade
$_SESSION['last_activity'] = time();

// 1. Configuração do Banco de Dados
$servername = "localhost"; // Localhost
$username = "root";       // Usuário MySQL
$password = "";           // Senha MySQL
$dbname = "novacode"; // Nome do banco de dados
$table3_name  = "personalizar"; // Tabela de login

// 2. Conexão com o Banco de Dados
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password); // Conexão com PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define modo de erro

} catch (PDOException $e) {
    die("Erro de Conexão: " . $e->getMessage()); // Erro de conexão
}

// Se clicar no botão
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ID da linha salva na sessão
    $id = $_SESSION['personalizar_id'];

    try {

        if (!empty($_POST['opcao'])) {

            $recheio1 = $_POST['opcao']; // valor selecionado

            $sql = "UPDATE $table3_name 
                    SET personalizar_recheio1 = (:recheio1) 
                    WHERE personalizar_id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':recheio1', $recheio1);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        } else {

            // Se não escolher nada → salva NULL (opcional)
            $sql = "UPDATE $table3_name 
                    SET personalizar_recheio1 = NULL 
                    WHERE personalizar_id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

        }

        // REDIRECIONA APÓS SALVAR NO BANCO
        header("Location: ../telaspersonalizar/recheio2.php");
        exit;

    } catch (PDOException $e) {
        $mensagem = "<p style='color:red;'>Erro: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/recheio1.css">
    <link rel="icon" href="../assets/img/Logo/NC-Bolos-Pequeno.png" type="image/x-icon">
    <title>Defina o recheio do bolo - Personalizar | NC Bolos</title>
</head>
<body>
    <!-- Início NavBar-->
    <nav class="navbar navnavbar navbar-expand navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-4" href="../inicio.php"><img src="../assets/img/Logo/NC-Bolos - Menor.png" class="logo"></a>
            <div class="container text-center">
                <form method="POST" class="mx-3 d-none d-lg-inline-block">   
                    <input type="text" class="searchfield">
                    <i class="searchiconfield">
                        <img src="../assets/img/Icons/search_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="searchicon">
                    </i>
                </form>
            </div>
        </div>
        <div class="mx-4">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#"><img src="../assets/img/Icons/search_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="searchicon"></a>
                    </li>
                    <h4><?php echo "Olá, " . $nome_usuario . "!";?></h4>
                    <a class="nav-link" href="../telasmenu/minhaconta.php">
                        <img src="../assets/img/Icons/person_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24-browm.png" class="person"> 
                    </a>
                    <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/img/Icons/menu_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="menu">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="menutext"><a class="dropdown-item" href="../telasmenu/personalizar.php"><img src="../assets/img/Icons/bolo-de-casamento.png" class="mx-2" width="24px" height="24px">Personalizar</a></li>
                        <li class="menutext"><a class="dropdown-item" href="../telasmenu/novidades.php"><img src="../assets/img/Icons/campaign_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2" width="24px" height="24px">Novidades</a></li>
                        <li class="menutext"><a class="dropdown-item" href="../telasmenu/promocoes.php"><img src="../assets/img/Icons/shoppingmode_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2" width="24px" height="24px">Promoções</a></li>
                        <li class="menutext"><a class="dropdown-item" href="../telasmenu/bolosprontos.php"><img src="../assets/img/Icons/fatia-de-bolo.png" class="mx-2" width="24px" height="24px" width="24px" height="24px">Bolos Prontos</a></li>
                        <li class="menutext"><a class="dropdown-item" href="../telasmenu/minhaconta.php"><img src="../assets/img/Icons/person_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2" width="24px" height="24px">Minha Conta</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../telacarrinho/carrinho.php"><img src="../assets/img/Icons/shopping_bag_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="shoppingbag"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fim NavBar -->

    <!-- Início BreadCrumb -->
    <br><br><div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../inicio.php" class="breadcrumb1">Início</a></li>
                <li class="breadcrumb-item"><a href="../telasmenu/personalizar.php" class="breadcrumb1">Personalizar</a></li>
                <li class="breadcrumb-item"><a href="../telaspersonalizar/tamanho.php" class="breadcrumb1">Defina o peso do bolo</a></li>
                <li class="breadcrumb-item"><a href="../telaspersonalizar/massa.php" class="breadcrumb1">Defina a massa do bolo</a></li>
                <li class="breadcrumb-item active" aria-current="page">Defina o recheio do bolo</li>
            </ol>
        </nav>
    </div>
    <!-- Fim BreadCrumb -->

    <!-- Início Div Personalizar -->
    <div class="novidades">
        <h1><br>Personalizar<img src="../assets/img/Icons/bolo-de-casamento.png" class="mx-2 icon" width="30px" height="30px"></h1>
    </div>
    <!-- Fim Div Personalizar -->

    <!-- Personalizar -->
    <div class="container">
        <div class="row">
            <form method="POST">
                <p class="infprimaria my-2">Defina o recheio do bolo (opcional)</p>
                <label for="opcaoa" class="text-center mx-2 my-2">
                    <p class="infsecundaria">Brigadeiro</p>
                    <div class="col-4 cols">
                        <img src="../assets/img/Personalizar/Recheio1/recheio-de-brigadeiro-para-bolo.jpg" width="130px" height="130px">
                    </div>
                    <input type="radio" id="opcaoa" name="opcao" value="Brigadeiro" style="width: 15px; height: 15px;" class="my-1">
                </label>
                <label for="opcaob" class="text-center mx-2">
                    <p class="infsecundaria">Ovomaltine</p>
                    <div class="col-4 cols">
                        <img src="../assets/img/Personalizar/Recheio1/Receita-de-Recheio-de-Ovomaltine-para-bolo-de-pote.png" width="130px" height="130px">
                    </div>
                    <input type="radio" id="opcaob" name="opcao" value="Ovomaltine" style="width: 15px; height: 15px;" class="my-1">
                </label>
                <label for="opcaoc" class="text-center mx-2">
                    <p class="infsecundaria">Morango</p>
                    <div class="col-4 cols">
                        <img src="../assets/img/Personalizar/Recheio1/recheio-morango-bolo-trufa.png" width="130px" height="130px">
                    </div>
                    <input type="radio" id="opcaoc" name="opcao" value="Morango" style="width: 15px; height: 15px;" class="my-1">
                </label>
                <div class="botoes">
                    <button type="submit" class="btnconfirmar" id="btnProximo">PRÓXIMO</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Fim Personalizar -->

    <!-- Inicio Footer -->
    <nav class="nav nav2 d-mb-block">
        <div class="container">
            <br><ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <p class="footertitle text-start">REDES SOCIAS</p>
                    <div class="text-start">
                        <p><a href="#"><img src="../assets/img/Icons/instagram.png" width="24px" height="24px"></a><a href="#"><img src="../assets/img/Icons/facebook.png" class="mx-2" width="24px" height="24px"></a></p>
                    </div>
                </li>
                <li class="nav-item">
                    <p class="footertitle text-start">INFORMAÇÃO</p>
                    <div class="text-start">
                        <p><a href="#" class="footerdesc">Perguntas Frequentes</a></p>
                        <p><a href="#" class="footerdesc">Devolução e Trocas</a></p>
                        <p><a href="#" class="footerdesc">Termos de Serviço</a></p>
                        <p><a href="#" class="footerdesc">Política de Reembolso</a></p>
                    </div>
                </li>
                <li class="nav-item">
                    <p class="footertitle text-start">EMPRESA</p>
                    <div class="text-start">
                        <p><a href="#" class="footerdesc">Contato</a></p>
                        <p><a href="#" class="footerdesc">Termos e Condições</a></p>
                        <p><a href="#" class="footerdesc">Política de Privacidade</a></p>
                    </div>
                </li>
                <li class="nav-item d-none d-md-block">
                    <p class="footertitle text-sm-start">RECEBA AS NOVIDADES</p>
                    <div class="text-start">
                        <div>
                            <label for="formGroupExampleInput" class="form-label"></label>
                            <input type="text" class="recebanovidades text-sm-start" id="formGroupExampleInput" placeholder="Seu E-mail">
                        </div>
                    </div>
                </li>
            </ul>
            <div>
                <br><p class="copyright text-start">© 2025 Nova Code</p>
                <p class="copyrighttitle text-sm-center d-none d-md-block">Nova Code Brasil - CNPJ: 000.000.000/0000-00</p>
                <br><p class="copyrighttitle text-start d-md-none">Nova Code Brasil - CNPJ: 000.000.000/0000-00</p>
            </div>
        </div>
    </nav>
    <!-- Fim Footer -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>