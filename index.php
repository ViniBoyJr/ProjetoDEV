<?php
// 1. Configuração do Banco de Dados
$servername = "localhost"; // Localhost
$username = "root";       // Usuário MySQL
$password = "";           // Senha MySQL
$dbname = "novacode"; // Nome do banco de dados
$table4_name  = "produtos"; // Tabela produtos

// 2. Conexão com o Banco de Dados
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password); // Conexão com PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define modo de erro

// Busca informações do Produto 1
    $sql1 = $conn->prepare("SELECT produto_nome, produto_imagem, produto_precoantigo, produto_precopix, produto_descricao
                            FROM $table4_name
                            WHERE produto_id = 1");

    $sql1->execute();
    $linha1 = $sql1->fetch(PDO::FETCH_ASSOC);

// Inicializa variável (Produto1)
// Valores padrão caso nada seja encontrado (Produto1)
    $produto_nome1 = "Email não encontrado";
    $produto_imagem1 = "Imagem não encontrada";
    $produto_precoantigo1 = "Preço não encontrado";
    $produto_precopix1 = "Preço não encontrado";
    $produto_descricao1 = "Descrição não encontrada";

    if ($linha1) {
        if (!empty($linha1["produto_nome"])) {
            $produto_nome1 = $linha1["produto_nome"];
        }
        if (!empty($linha1["produto_imagem"])) {
            $produto_imagem1 = $linha1["produto_imagem"];
        }
        if (!empty($linha1["produto_precoantigo"])) {
            $produto_precoantigo1 = $linha1["produto_precoantigo"];
        }
        if (!empty($linha1["produto_precopix"])) {
            $produto_precopix1 = $linha1["produto_precopix"];
        }
        if (!empty($linha1["produto_descricao"])) {
            $produto_descricao1 = $linha1["produto_descricao"];
        }
    }


// Busca informações do Produto 2
    $sql2 = $conn->prepare("SELECT produto_nome, produto_imagem, produto_precoantigo, produto_precopix, produto_descricao
                            FROM $table4_name
                            WHERE produto_id = 2");

    $sql2->execute();
    $linha2 = $sql2->fetch(PDO::FETCH_ASSOC);

// Inicializa variável (Produto2)
// Valores padrão caso nada seja encontrado (Produto2)
    $produto_nome2 = "Email não encontrado";
    $produto_imagem2 = "Imagem não encontrada";
    $produto_precoantigo2 = "Preço não encontrado";
    $produto_precopix2 = "Preço não encontrado";
    $produto_descricao2 = "Descrição não encontrada";

    if ($linha2) {
        if (!empty($linha2["produto_nome"])) {
            $produto_nome2 = $linha2["produto_nome"];
        }
        if (!empty($linha2["produto_imagem"])) {
            $produto_imagem2 = $linha2["produto_imagem"];
        }
        if (!empty($linha2["produto_precoantigo"])) {
            $produto_precoantigo2 = $linha2["produto_precoantigo"];
        }
        if (!empty($linha2["produto_precopix"])) {
            $produto_precopix2 = $linha2["produto_precopix"];
        }
        if (!empty($linha2["produto_descricao"])) {
            $produto_descricao2 = $linha2["produto_descricao"];
        }
    }


// Busca informações do Produto 3
    $sql3 = $conn->prepare("SELECT produto_nome, produto_imagem, produto_precoantigo, produto_precopix, produto_descricao
                            FROM $table4_name
                            WHERE produto_id = 3");

    $sql3->execute();
    $linha3 = $sql3->fetch(PDO::FETCH_ASSOC);

// Inicializa variável (Produto3)
// Valores padrão caso nada seja encontrado (Produto3)
    $produto_nome3 = "Email não encontrado";
    $produto_imagem3 = "Imagem não encontrada";
    $produto_precoantigo3 = "Preço não encontrado";
    $produto_precopix3 = "Preço não encontrado";
    $produto_descricao3 = "Descrição não encontrada";

    if ($linha3) {
        if (!empty($linha3["produto_nome"])) {
            $produto_nome3 = $linha3["produto_nome"];
        }
        if (!empty($linha3["produto_imagem"])) {
            $produto_imagem3 = $linha3["produto_imagem"];
        }
        if (!empty($linha3["produto_precoantigo"])) {
            $produto_precoantigo3 = $linha3["produto_precoantigo"];
        }
        if (!empty($linha3["produto_precopix"])) {
            $produto_precopix3 = $linha3["produto_precopix"];
        }
        if (!empty($linha3["produto_descricao"])) {
            $produto_descricao3 = $linha3["produto_descricao"];
        }
    }


// Busca informações do Produto 4
    $sql4 = $conn->prepare("SELECT produto_nome, produto_imagem, produto_precoantigo, produto_precopix, produto_descricao
                            FROM $table4_name
                            WHERE produto_id = 4");

    $sql4->execute();
    $linha4 = $sql4->fetch(PDO::FETCH_ASSOC);

// Inicializa variável (Produto4)
// Valores padrão caso nada seja encontrado (Produto4)
    $produto_nome4 = "Email não encontrado";
    $produto_imagem4 = "Imagem não encontrada";
    $produto_precoantigo4 = "Preço não encontrado";
    $produto_precopix4 = "Preço não encontrado";
    $produto_descricao4 = "Descrição não encontrada";

    if ($linha4) {
        if (!empty($linha4["produto_nome"])) {
            $produto_nome4 = $linha4["produto_nome"];
        }
        if (!empty($linha4["produto_imagem"])) {
            $produto_imagem4 = $linha4["produto_imagem"];
        }
        if (!empty($linha4["produto_precoantigo"])) {
            $produto_precoantigo4 = $linha4["produto_precoantigo"];
        }
        if (!empty($linha4["produto_precopix"])) {
            $produto_precopix4 = $linha4["produto_precopix"];
        }
        if (!empty($linha4["produto_descricao"])) {
            $produto_descricao4 = $linha4["produto_descricao"];
        }
    }


} catch (PDOException $e) {
    die("Erro de Conexão: " . $e->getMessage()); // Erro de conexão
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/indexstyle.css">
    <link rel="icon" href="./assets/img/Logo/NC-Bolos-Pequeno.png" type="image/x-icon">
    <title>NC Bolos | Seu Bolo Personalizado</title>
</head>
<body>
    <!-- Início NavBar-->
    <nav class="navbar navnavbar navbar-expand navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-4" href="./index.php"><img src="./assets/img/Logo/NC-Bolos - Menor.png" class="logo"></a>
            <div class="container text-center">
                <form method="POST" class="mx-3 d-none d-lg-inline-block">   
                    <input type="text" class="searchfield">
                    <i class="searchiconfield">
                        <img src="./assets/img/Icons/search_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="searchicon">
                    </i>
                </form>
            </div>
        </div>
        <div class="mx-4">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="#"><img src="./assets/img/Icons/search_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="searchicon"></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./assets/img/Icons/person_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24-browm.png" class="person">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="menutext dropdown-item2"><a class="dropdown-item text-center dropdown-item2" href="./telasconta/login.html">Entrar</a></li>
                            <li class="menutext"><a class="dropdown-item text-center" href="./telasconta/cadastro.html">Cadastrar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./assets/img/Icons/menu_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="menu">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="menutext"><a class="dropdown-item" href="./telasmenu/personalizar.html"><img src="./assets/img/Icons/bolo-de-casamento.png" class="mx-2" width="24px" height="24px">Personalizar</a></li>
                        <li class="menutext"><a class="dropdown-item" href="./telasmenu/novidades-deslogado.php"><img src="./assets/img/Icons/campaign_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2" width="24px" height="24px">Novidades</a></li>
                        <li class="menutext"><a class="dropdown-item" href="./telasmenu/promocoes-deslogado.php"><img src="./assets/img/Icons/shoppingmode_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2" width="24px" height="24px">Promoções</a></li>
                        <li class="menutext"><a class="dropdown-item" href="./telasmenu/bolosprontos-deslogado.php"><img src="./assets/img/Icons/fatia-de-bolo.png" class="mx-2" width="24px" height="24px" width="24px" height="24px">Bolos Prontos</a></li>
                        <li class="menutext"><a class="dropdown-item" href="./telasmenu/minhaconta.html"><img src="./assets/img/Icons/person_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2" width="24px" height="24px">Minha Conta</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./telacarrinho/carrinho.html"><img src="./assets/img/Icons/shopping_bag_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="shoppingbag"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fim NavBar -->

    <!-- Início Navs & Tabs -->
    <br><br class="d-none d-md-block"><ul class="nav nav-pills nav-fill">
        <li class="nav-item d-none d-md-block">
            <a href="./telasmenu/personalizar.html"><button type="submit" class="btnnavtab">Personalizar</button></a>
        </li>
        <li class="nav-item d-none d-md-block">
            <a href="./telasmenu/novidades-deslogado.php"><button type="submit" class="btnnavtab">Novidades</button></a>
        </li>
        <li class="nav-item d-none d-lg-block">
            <a href="./telasmenu/promocoes-deslogado.php"><button type="submit" class="btnnavtab">Promoções</button></a>
        </li>
        <li class="nav-item d-none d-xxl-block">
            <a href="./telasmenu/bolosprontos-deslogado.php"><button type="submit" class="btnnavtab">Bolos Prontos</button></a>
        </li>
    </ul>
    <!-- Fim Navs & Tabs -->

    <!-- Início Div Novidades -->
    <div class="novidades">
        <br><br><h1>Novidades<img src="./assets/img/Icons/campaign_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2 icon" width="35px" height="35px"></h1>
    </div>
    <!-- Fim Div Novidades -->

    <!-- Início Carousel -->
    <br><br><div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner carouselimg">
                <div class="carousel-item active">
                    <img src="./assets/img/Carousel/Banner 1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/Carousel/Banner 2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/Carousel/Banner 3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
    <!-- Fim Carousel -->

    <!-- Início Div Promoções -->
    <div class="novidades">
        <br><br><h1>Promoções<img src="./assets/img/Icons/shoppingmode_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="mx-2 sale"></h1>
    </div>
    <!-- Fim Div Promoções -->

    <!-- Início Card 1 -->
    <div class="container">
    <br><br><div class="row justify-content-center justify-content-md-between">
        <div class="card produto" style="width: 18rem;">
            <a href="./telasprodutos/produto1-deslogado.php"><img src="<?= htmlspecialchars($produto_imagem1); ?>" class="card-img-top cardimg" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($produto_nome1); ?></h5>
                <p class="card-text descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eligendi doloremque ad ea modi sit!</p>
                <p class="card-text precoantes">R$ <?= htmlspecialchars($produto_precoantigo1); ?></p>
                <p class="card-text preconovo">R$ <?= htmlspecialchars($produto_precopix1); ?></p>
            </div>
        </div>
    <!-- Fim -->

    <!-- Início Card 2 -->
        <div class="card produto" style="width: 18rem;">
            <a href="./telasprodutos/produto2-deslogado.php"><img src="<?= htmlspecialchars($produto_imagem2); ?>" class="card-img-top cardimg" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($produto_nome2); ?></h5>
                <p class="card-text descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eligendi doloremque ad ea modi sit!</p>
                <p class="card-text precoantes">R$ <?= htmlspecialchars($produto_precoantigo2); ?></p>
                <p class="card-text preconovo">R$ <?= htmlspecialchars($produto_precopix2); ?></p>
            </div>
        </div>
    <!-- Fim -->

    <!-- Início Card 3 -->
        <div class="card produto" style="width: 18rem;">
            <a href="./telasprodutos/produto3-deslogado.php"><img src="<?= htmlspecialchars($produto_imagem3); ?>" class="card-img-top cardimg" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($produto_nome3); ?></h5>
                <p class="card-text descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eligendi doloremque ad ea modi sit!</p>
                <p class="card-text precoantes">R$ <?= htmlspecialchars($produto_precoantigo3); ?></p>
                <p class="card-text preconovo">R$ <?= htmlspecialchars($produto_precopix3); ?></p>
            </div>
        </div>
    <!-- Fim -->

    <!-- Início Card 4 -->
        <div class="card produto" style="width: 18rem;">
            <a href="./telasprodutos/produto4-deslogado.php"><img src="<?= htmlspecialchars($produto_imagem4); ?>" class="card-img-top cardimg" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($produto_nome4); ?></h5>
                <p class="card-text descricao">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eligendi doloremque ad ea modi sit!</p>
                <p class="card-text precoantes">R$ <?= htmlspecialchars($produto_precoantigo4); ?></p>
                <p class="card-text preconovo">R$ <?= htmlspecialchars($produto_precopix4); ?></p>
            </div>
        </div>
    </div>
    </div>
    <br><br>
    <!-- Fim -->

    <!-- Inicio Footer -->
    <nav class="nav nav2 d-mb-block">
        <div class="container">
            <br><ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <p class="footertitle text-start">REDES SOCIAS</p>
                    <div class="text-start">
                        <p><a href="#"><img src="./assets/img/Icons/instagram.png" width="24px" height="24px"></a><a href="#"><img src="./assets/img/Icons/facebook.png" class="mx-2" width="24px" height="24px"></a></p>
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
    const produto = JSON.parse(localStorage.getItem("produto_atual"));
    const produto2 = JSON.parse(localStorage.getItem("produto2_atual"));
    const produto3 = JSON.parse(localStorage.getItem("produto3_atual"));
    const produto4 = JSON.parse(localStorage.getItem("produto4_atual"));

    if (produto) {
        document.getElementById("nome").innerText = produto.nome;
        document.getElementById("preco_novo").innerText = produto.preco_novo;
        document.getElementById("preco_antigo").innerText = produto.preco_antigo;
        document.getElementById("imagem").src = produto.imagem;
    }
    if (produto2) {
        document.getElementById("nome2").innerText = produto2.nome2;
        document.getElementById("preco_novo2").innerText = produto2.preco_novo2;
        document.getElementById("preco_antigo2").innerText = produto2.preco_antigo2;
        document.getElementById("imagem2").src = produto2.imagem2;
    }
    if (produto3) {
        document.getElementById("nome3").innerText = produto3.nome3;
        document.getElementById("preco_novo3").innerText = produto3.preco_novo3;
        document.getElementById("preco_antigo3").innerText = produto3.preco_antigo3;
        document.getElementById("imagem3").src = produto3.imagem3;
    }
    if (produto4) {
        document.getElementById("nome4").innerText = produto4.nome4;
        document.getElementById("preco_novo4").innerText = produto4.preco_novo4;
        document.getElementById("preco_antigo4").innerText = produto4.preco_antigo4;
        document.getElementById("imagem4").src = produto4.imagem4;
    }
</script>
</html>