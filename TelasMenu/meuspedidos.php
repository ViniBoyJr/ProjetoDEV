<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['login_nome'])) {
    header("Location: ../telasconta/login.html");
    exit();
}

$nome_usuario = mb_convert_case(htmlspecialchars($_SESSION['login_nome']), MB_CASE_TITLE, "UTF-8");

// Controle de sessão
$timeout = 3600;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}
$_SESSION['last_activity'] = time();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "novacode";

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // ---------------------------------------------------------
    // 1️⃣ Buscar o login_id do usuário
    // ---------------------------------------------------------
    $sql_user = $conn->prepare("
        SELECT login_id 
        FROM login 
        WHERE login_nome = :login_nome
    ");

    $sql_user->bindParam(':login_nome', $_SESSION['login_nome']);
    $sql_user->execute();
    $usuario = $sql_user->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die("Erro: Usuário não encontrado.");
    }

    $login_id = $usuario['login_id'];


    // ---------------------------------------------------------
    // 2️⃣ Buscar pedidos (produto normal OU bolo personalizado)
    // ---------------------------------------------------------
    $sql_pedidos = $conn->prepare("

        SELECT 
            p.pedido_id,
            p.quantidade,
            p.pedido_pagamento,
            p.pedido_preco,
            p.pedido_data,

            pr.produto_nome,
            pr.produto_imagem,

            pers.personalizar_peso,
            pers.personalizar_massa,
            pers.personalizar_recheio1,
            pers.personalizar_recheio2,
            pers.personalizar_cobertura,
            pers.personalizar_complemento,
            pers.personalizar_preco

        FROM pedidos p

        LEFT JOIN produtos pr 
            ON p.produto_id = pr.produto_id

        LEFT JOIN personalizar pers
            ON p.personalizar_id = pers.personalizar_id

        WHERE p.login_id = :login_id
        ORDER BY p.pedido_data DESC
    ");

    $sql_pedidos->bindParam(':login_id', $login_id);
    $sql_pedidos->execute();
    $pedidos = $sql_pedidos->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    die("Erro de Conexão: " . $e->getMessage());
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/meuspedidos.css">
    <link rel="icon" href="../assets/img/Logo/NC-Bolos-Pequeno.png" type="image/x-icon">
    <title>Meus pedidos - NC Bolos</title>
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
                    <a class="nav-link" href="./minhaconta.php">
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
                <li class="breadcrumb-item active" aria-current="page">Meus pedidos</li>
            </ol>
        </nav>
    </div>
    <!-- Fim BreadCrumb -->

    <!-- Início Div Favoritos -->
    <div class="novidades">
        <h1>Meus pedidos<img src="../assets/img/Icons/article_40dp_1F1F1F_FILL0_wght400_GRAD0_opsz40.png" class="mx-2 sale"></h1>
    </div>
    <!-- Fim Div Favoritos -->

    <!-- Início Favoritos -->
    <div class="container">
        <div style="margin-top: 40px;">
            <div id="lista-pedidos">
                <?php if (count($pedidos) > 0): ?>

                    <?php foreach ($pedidos as $pedido): ?>

                        <?php
                        // Verifica se é bolo personalizado
                        $isPersonalizado = !empty($pedido['personalizar_peso']);

                        // Se for personalizado → usa a imagem padrão
                        $img = $isPersonalizado 
                            ? "../assets/img/Icons/bolo-de-casamento2.png"
                            : $pedido['produto_imagem'];

                        // Nome do item
                        $nome_item = $isPersonalizado 
                            ? "Bolo Personalizado"
                            : $pedido['produto_nome'];

                        ?>

                        <div class="container my-4">
                            <div class="row text-center">

                                <div class="col-md-4 text-end">
                                    <img src="<?= $img ?>" class="imgproduto">
                                </div>

                                <div class="col-md-8 text-start">
                                    <h2><?= $nome_item ?></h2>

                                    <h3 class="preconovo my-2">
                                        R$ <?= number_format($pedido['pedido_preco'], 2, ',', '.') ?>
                                    </h3>

                                    <p class="quantidadetext">
                                        Quantidade: <?= $pedido['quantidade'] ?>
                                    </p>

                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <p class="descricao text-center">Você ainda não fez nenhum pedido.</p>

                <?php endif; ?>

            </div>
        </div>
    </div>
    <!-- Fim Favoritos -->

    <!-- Inicio Footer -->
    <br><br><nav class="nav nav2 d-mb-block">
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