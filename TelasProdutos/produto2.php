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


    $sql = $conn->prepare("SELECT produto_nome, produto_imagem, produto_precoantigo, produto_preconovo, produto_precopix, produto_descricao, produto_ingredientes, produto_validade, produto_fabricacao
                        FROM $table4_name
                        WHERE produto_id = 2");

    $sql->execute();
    $linha = $sql->fetch(PDO::FETCH_ASSOC);

// Inicializa variável
// Valores padrão caso nada seja encontrado
    $produto_nome = "Email não encontrado";
    $produto_imagem = "Imagem não encontrada";
    $produto_precoantigo = "Preço não encontrado";
    $produto_preconovo = "Preço não encontrado";
    $produto_precopix = "Preço não encontrado";
    $produto_descricao = "Descrição não encontrada";
    $produto_ingredientes = "Ingredientes não encontrados";
    $produto_validade = "Validade não encontrada";
    $produto_fabricacao = "Fabricação não encontrada";

    if ($linha) {
        if (!empty($linha["produto_nome"])) {
            $produto_nome = $linha["produto_nome"];
        }
        if (!empty($linha["produto_imagem"])) {
            $produto_imagem = $linha["produto_imagem"];
        }
        if (!empty($linha["produto_precoantigo"])) {
            $produto_precoantigo = $linha["produto_precoantigo"];
        }
        if (!empty($linha["produto_preconovo"])) {
            $produto_preconovo = $linha["produto_preconovo"];
        }
        if (!empty($linha["produto_precopix"])) {
            $produto_precopix = $linha["produto_precopix"];
        }
        if (!empty($linha["produto_descricao"])) {
            $produto_descricao = $linha["produto_descricao"];
        }
        if (!empty($linha["produto_ingredientes"])) {
            $produto_ingredientes = $linha["produto_ingredientes"];
        }
        if (!empty($linha["produto_validade"])) {
            $produto_validade = $linha["produto_validade"];
        }
        if (!empty($linha["produto_fabricacao"])) {
            $produto_fabricacao = $linha["produto_fabricacao"];
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
    <link rel="stylesheet" href="../assets/css/produto1.css">
    <link rel="icon" href="../assets/img/Logo/NC-Bolos-Pequeno.png" type="image/x-icon">
    <title><?= htmlspecialchars($produto_nome); ?> - NC Bolos</title>
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
    <br><div class="container">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../inicio.php" class="breadcrumb1">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($produto_nome); ?></li>
            </ol>
        </nav>
    </div>
    <!-- Fim BreadCrumb -->

    <!-- Começo Produto -->
    <br>
    <div class="container" id="produto">
        <div class="row">
            <h1 class="text-start d-block d-md-none"><?= htmlspecialchars($produto_nome); ?></h1>
            <div class="col-md-6 text-center">
                <img src="<?= htmlspecialchars($produto_imagem); ?>" class="imgproduto">
            </div>
            <div class="col-6 d-none d-md-block text-md-start">
                <h1><?= htmlspecialchars($produto_nome); ?></h1>
                <img src="../assets/img/Icons/favorite_24dp_1F1F1F_FILL0_wght400_GRAD0_opsz24.png" class="favorito" id="imagem" onclick="trocarImagem()"><i class="descricao">&nbsp Adicionar aos favoritos</i>
                <div class="d-none d-md-block"><br>
                    <p class="precoantigo">R$ <?= htmlspecialchars($produto_precoantigo); ?></p>
                    <h2 class="preconovo">R$ <?= htmlspecialchars($produto_preconovo); ?></h2>
                    <p class="descricao">R$ <?= htmlspecialchars($produto_precopix); ?> á vista com desconto Pix</p>
                </div>
                <div>
                    <h2>Quantidade</h2>
                    <div class="col-sm-10">
                        <input type="number" class="quantidade" id="quantidade" name="quantidade" value="1" min="1" max="20">
                    </div>
                </div>
                <div class="d-none d-xl-block my-4">
                    <a href="#"><button type="button" class="btnaddcart" id="addcart">ADICIONAR AO CARRINHO</button></a>
                    <a href="#"><button type="button" class="btncomprar mx-2" id="addcart">COMPRAR</button></a>
                </div>
                <div class="d-none d-md-block d-xl-none my-4">
                    <a href="#"><button type="button" class="btnaddcart" id="addcart">ADICIONAR AO CARRINHO</button></a>
                    <a href="#"><button type="button" class="btncomprar my-2" id="addcart">COMPRAR</button></a>
                </div>
            </div>
            <div class="text-start d-md-none">
                <br><p class="precoantigo">R$ <?= htmlspecialchars($produto_precoantigo); ?></p>
                <h2 class="preconovo">R$ <?= htmlspecialchars($produto_preconovo); ?></h2>
                <p class="descricao">R$ R$ <?= htmlspecialchars($produto_precopix); ?> á vista com desconto Pix</p>
            </div>
            <div class="d-md-none">
                <a href="#"><button type="button" class="btnaddcart" id="addcart">ADICIONAR AO CARRINHO</button></a>
                <a href="#"><button type="button" class="btncomprar my-2" id="addcart">COMPRAR</button></a>
            </div>
        </div>
        <br>
        <div class="col-12">
            <h2>DESCRIÇÃO</h2>
            <p class="descricao">&nbsp Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores itaque nobis reprehenderit adipisci officia minima tenetur molestiae! 
                Saepe repellat laborum, animi ipsa molestias aliquam ex voluptatem vel qui. Eligendi sapiente dolorum sed consequuntur aperiam quam quod officiis 
                id commodi, rerum officia doloribus quisquam suscipit praesentium totam molestiae cum iusto. Ipsam odio itaque similique quaerat tempora? Tempore 
                modi ut, facilis quod sapiente adipisci inventore deserunt nam optio harum dignissimos fugit quaerat veritatis? Laborum velit illo adipisci id, 
                necessitatibus repellendus a obcaecati cupiditate distinctio est veniam alias consequatur quod, deserunt hic ducimus beatae sit itaque tenetur, 
                culpa vero! Odio adipisci non architecto.</p>
            <br><h2>INGREDIENTES</h2>
            <p class="descricao">&nbsp Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam adipisci deleniti obcaecati maiores culpa provident fugit neque, quidem 
                repudiandae tempora itaque! Nulla delectus nostrum, assumenda natus similique vitae, aspernatur nam fuga consectetur illum quis enim architecto modi vel saepe et 
                distinctio. Iusto eaque molestiae ut, suscipit saepe temporibus beatae animi?</p>
            <br><h2 class="text-center">AVALIAÇÃO DE CLIENTES</h2>

            <!-- Início Estrelas (XL)-->
            <!-- Início Estrelas-->
            <div class="row">
                <div class="col-6 text-end">
                    <img src="../assets/img/Icons/star0.png">
                    <img src="../assets/img/Icons/star0.png">
                    <img src="../assets/img/Icons/star0.png">
                    <img src="../assets/img/Icons/star0.png">
                    <img src="../assets/img/Icons/star0.png">
                </div>
                <div class="col-6 text-start align-content-end">
                    <i class="avaliartext">0.00 de 0</i>
                </div>
            </div>
            <!-- Fim Estrelas -->

            <div class="my-2"></div>

            <!-- Início 5 Estrelas -->
            <div class="row">
                <div class="col-6 col-xl-5 text-end">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                </div>
                <div class="col-2 d-none d-xl-block">
                    <div class="progress progresso my-2">
                        <div class="progress-bar w-0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-6 col-xl-5 text-start align-content-center avaliartext">0</div>
            </div>
            <!-- Fim 5 Estrelas -->

            <!-- Início 4 Estrelas -->
            <div class="row">
                <div class="col-6 col-xl-5 text-end">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                </div>
                <div class="col-2 d-none d-xl-block">
                    <div class="progress progresso my-2">
                        <div class="progress-bar w-0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-6 col-xl-5 text-start align-content-center avaliartext">0</div>
            </div>
            <!-- Fim 4 Estrelas -->

            <!-- Início 3 Estrelas -->
            <div class="row">
                <div class="col-6 col-xl-5 text-end">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                </div>
                <div class="col-2 d-none d-xl-block">
                    <div class="progress progresso my-2">
                        <div class="progress-bar w-0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-6 col-xl-5 text-start align-content-center avaliartext">0</div>
            </div>
            <!-- Fim 3 Estrelas -->

            <!-- Início 2 Estrelas -->
            <div class="row">
                <div class="col-6 col-xl-5 text-end">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                </div>
                <div class="col-2 d-none d-xl-block">
                    <div class="progress progresso my-2">
                        <div class="progress-bar w-0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-6 col-xl-5 text-start align-content-center avaliartext">0</div>
            </div>
            <!-- Fim 2 Estrelas -->

            <!-- Início 1 Estrela -->
            <div class="row">
                <div class="col-6 col-xl-5 text-end">
                    <img src="../assets/img/Icons/star1.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                    <img src="../assets/img/Icons/star0.png" width="17px" height="17px">
                </div>
                <div class="col-2 d-none d-xl-block">
                    <div class="progress progresso my-2">
                        <div class="progress-bar w-0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="col-6 col-xl-5 text-start align-content-center avaliartext">0</div>
            </div>
            <!-- Fim 1 Estrela -->
            <!-- Fim Estrelas (XL) -->

            <div class="text-center">
                <button type="button" class="avaliar my-4">ESCREVER UMA AVALIAÇÃO</button>
            </div>

        </div>
    </div>
    <!-- Fim Produto -->

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
<script src="../assets/js/scriptproduto.js"></script>
<script>
    document.querySelectorAll("#addcart").forEach(btn => {
        btn.addEventListener("click", () => {

            const nome = document.querySelector(".col-md-6 ~ .col-6 h1").innerText;
            const preco = document.querySelector(".preconovo").innerText;
            const imagem = document.querySelector(".imgproduto").src;
            const quantidade = parseInt(document.querySelector("#quantidade").value);

            const novoProduto = {
                nome,
                preco,
                imagem,
                quantidade
            };

            let carrinho = JSON.parse(localStorage.getItem("carrinho")) || [];

            // Verifica se o produto já existe
            const existente = carrinho.find(item => item.nome === novoProduto.nome);

            if (existente) {
                // Se existe, soma as quantidades
                existente.quantidade += quantidade;
            } else {
                // Caso contrário, adiciona como novo produto
                carrinho.push(novoProduto);
            }

            // Salva no localStorage
            localStorage.setItem("carrinho", JSON.stringify(carrinho));

            // Vai para o carrinho
            window.location.href = "../telacarrinho/carrinho.php";
        });
    });
</script>
</html>