<?php
session_start();
// Verifica se o usuário está logado
if (!isset($_SESSION['login_nome'])) {
    header("Location: ../telasconta/login.html");
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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/carrinho.css">
    <link rel="icon" href="../img/Logo/NC-Bolos-Pequeno.png" type="image/x-icon">
    <title>Seu Carrinho de Compras - NC Bolos</title>
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
                        <a class="nav-link" href="./carrinho.php"><img src="../assets/img/Icons/shopping_bag_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="shoppingbag"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fim NavBar -->

    <!-- Início Div Promoções -->
    <div class="novidades">
        <br><br><h1>Seu Carrinho<img src="../assets/img/Icons/shopping_bag_40dp_000000_FILL0_wght400_GRAD0_opsz40.png" class="mx-2 sale" width="30px" height="30px"></h1>
    </div>
    <!-- Fim Div Promoções -->

    <!-- Início Produtos -->
    <div class="container">
        <div style="margin-top: 40px;">
            <div id="lista-carrinho"></div>
        </div>
        <p id="msg-vazio" class="descricao d-none text-center">Você ainda não adicionou nenhum produto no carrinho.
            <br><a href="../inicio.php"><button type="button" class="btnaddcart my-4">CONTINUAR COMPRANDO</button></a>
        </p>
        <div id="acoes-carrinho" class="d-none my-4 text-center">
            <p id="total-carrinho" class="text-center my-4 descricao">Total: R$ 0,00</p>
            <a href="../inicio.php"><button type="button" class="btnaddcart my-4">CONTINUAR COMPRANDO</button></a>
            <a href="#"><button type="button" class="btncomprar mx-2">FINALIZAR PEDIDO</button></a>
        </div>
    </div>
    <!-- Fim Produtos -->

    <!-- Inicio Footer -->
    <br><nav class="nav nav2 d-mb-block">
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
<script>
// Carrega o carrinho
function carregarCarrinho() {
    const container = document.getElementById("lista-carrinho");
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

    container.innerHTML = "";

    carrinho.forEach((item, index) => {
        const bloco = `
        <div class="container my-4">
            <div class="row align-items-center">
                <div class="col-md-4 text-end">
                    <img src="${item.imagem}" class="imgproduto">
                </div>
                <div class="col-4 align-content-center">
                    <h2>${item.nome}</h2>
                    <h3 class="preconovo my-2">${item.preco}</h3>
                    <p class="quantidadetext">Quantidade: ${item.quantidade}
                        <button class="quantidade" style="margin-left: 10px;" onclick="alterarQuantidade(${index}, -1)">-</button>
                        <button class="quantidade" onclick="alterarQuantidade(${index}, 1)">+</button>
                    </p>
                </div>
                <div class="col-4 text-center">
                    <img src="../assets/img/Icons/close_40dp_000000_FILL0_wght400_GRAD0_opsz40.png"
                        class="remove" onclick="remover(${index})">
                </div>
            </div>
        </div>
        `;
        container.innerHTML += bloco;
    });

    atualizarTotal();
    atualizarAcoesCarrinho();
}

// Calcula subtotal de um produto
function calcularSubtotal(item) {
    // Remove "R$ " e converte para número
    let precoNumero = parseFloat(item.preco.replace("R$ ", "").replace(",", "."));
    let subtotal = precoNumero * item.quantidade;
    return subtotal.toFixed(2).replace(".", ",");
}

// Atualiza quantidade
function alterarQuantidade(index, valor) {
    let carrinho = JSON.parse(localStorage.getItem("carrinho"));
    let item = carrinho[index];

    item.quantidade += valor;

    if (item.quantidade < 1) item.quantidade = 1;
    if (item.quantidade > 20) item.quantidade = 20;

    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    carregarCarrinho();
}

// Remove item
function remover(index){
    let carrinho = JSON.parse(localStorage.getItem("carrinho"));
    carrinho.splice(index, 1);
    localStorage.setItem("carrinho", JSON.stringify(carrinho));
    carregarCarrinho();
}

// Atualiza total geral do carrinho
function atualizarTotal() {
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    let total = 0;

    carrinho.forEach(item => {
        let precoNumero = parseFloat(item.preco.replace("R$ ", "").replace(",", "."));
        total += precoNumero * item.quantidade;
    });

    document.getElementById("total-carrinho").innerText = 
        "Total: R$ " + total.toFixed(2).replace(".", ",");
}

// Mostra/oculta botões e mensagem
function atualizarAcoesCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];
    const divAcoes = document.getElementById("acoes-carrinho");
    const msgVazio = document.getElementById("msg-vazio");

    if (carrinho.length === 0) {
        divAcoes.classList.add("d-none");
        msgVazio.classList.remove("d-none");
        document.getElementById("total-carrinho").innerText = "Total: R$ 0,00";
    } else {
        divAcoes.classList.remove("d-none");
        msgVazio.classList.add("d-none");
    }
}

document.addEventListener("DOMContentLoaded", function() {
    carregarCarrinho();
});
</script>
</html>