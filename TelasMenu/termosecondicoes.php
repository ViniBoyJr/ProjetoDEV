<?php
session_start();
// Verifica se o usuário está logado
if (!isset($_SESSION['login_nome'])) {
    header("Location: ../telasconta/login.html");
    exit();
}
//Armazena o nome do usuario
$nome_usuario = htmlspecialchars($_SESSION['login_nome']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/termosecondicoes.css">
    <link rel="icon" href="../assets/img/Logo/NC-Bolos-Pequeno.png" type="image/x-icon">
    <title>Termos e Condições - NC Bolos</title>
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
                        <a class="nav-link" href="../telacarrinho/carrinho.html"><img src="../assets/img/Icons/shopping_bag_24dp_E3E3E3_FILL0_wght400_GRAD0_opsz24.png" class="shoppingbag"></a>
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
                <li class="breadcrumb-item"><a href="../TelasMenu/minhaconta.php" class="breadcrumb1">Minha Conta</a></li>
                <li class="breadcrumb-item"><a href="../TelasMenu/configuracoes.php" class="breadcrumb1">Configurações</a></li>
                <li class="breadcrumb-item active" aria-current="page">Termos e Condições</li>
            </ol>
        </nav>
    </div>
    <!-- Fim BreadCrumb -->

    <!-- Início Minha Conta -->
    <div class="novidades">
        <h1>Termos e Condições<img src="../assets/img/Icons/list_alt_check_40dp_1F1F1F_FILL0_wght400_GRAD0_opsz40.png" class="mx-2 campaign"></h1>
    </div>
    <!-- Fim Minha Conta -->

    <!-- Início Política -->    
    <div class="container my-4">
        <p class="descricao">&nbsp Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem odit, unde pariatur voluptates aliquam laudantium quo aspernatur veniam 
            magni vitae illo officia earum voluptate. Rerum nulla perspiciatis dolore placeat dignissimos corporis eaque, quidem nobis saepe. Harum voluptatibus libero 
            officia repellat, quisquam rem nesciunt doloribus blanditiis hic error suscipit ducimus nostrum! Sint quis esse modi veniam consectetur eligendi quo. Facilis 
            maiores quae sapiente fugiat earum sint, expedita magni exercitationem quia repellat, placeat aut dignissimos eaque aspernatur ad voluptatum esse facere nulla 
            voluptates? Deleniti repudiandae voluptatibus, non vitae aperiam rem qui eos repellendus consequatur. Accusamus asperiores deleniti quasi dicta voluptatum a 
            porro!
        </p>
        <p class="descricao">&nbsp Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, repellat ratione animi aut magni suscipit omnis unde, quia repudiandae illum 
            obcaecati vel debitis ducimus dolorem quae quaerat, eligendi facere ullam nihil tenetur adipisci voluptates velit laborum excepturi! Maxime voluptas consequuntur 
            quibusdam iure fuga odio impedit sunt alias commodi, rerum porro. Asperiores odio adipisci quod, sed exercitationem at similique repudiandae temporibus quia deserunt 
            facere nesciunt voluptatibus? Velit iure beatae, ullam quo ipsa quia vero minus asperiores laborum mollitia dolor, deleniti deserunt nostrum laboriosam, maiores 
            molestias odit quae optio. Perspiciatis incidunt veniam architecto hic numquam beatae asperiores iure nihil natus? Numquam, accusantium.
        </p>
        <p class="descricao">&nbsp Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem at dolore, ullam voluptatum, eius est doloremque modi dicta velit 
            sit ad vel iste nulla quisquam. Eius vel aperiam repellat repudiandae debitis ipsam optio, aliquid rem laborum commodi omnis, dolor quidem dolores, deserunt 
            distinctio alias. Vel porro, tempora ipsum corrupti qui error hic nostrum culpa, soluta, dignissimos ratione enim libero sunt nihil facilis accusantium impedit. 
            Similique repellat laboriosam quisquam culpa, saepe laudantium in sapiente voluptas ea accusamus nobis nulla deleniti dolores ducimus sit iusto voluptatem id 
            officiis sed. Ipsa, laboriosam harum inventore recusandae soluta saepe illum voluptatum unde culpa dolore dolores.
        </p>
        <p class="descricao">&nbsp Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem odit, unde pariatur voluptates aliquam laudantium quo aspernatur veniam 
            magni vitae illo officia earum voluptate. Rerum nulla perspiciatis dolore placeat dignissimos corporis eaque, quidem nobis saepe. Harum voluptatibus libero 
            officia repellat, quisquam rem nesciunt doloribus blanditiis hic error suscipit ducimus nostrum! Sint quis esse modi veniam consectetur eligendi quo. Facilis 
            maiores quae sapiente fugiat earum sint, expedita magni exercitationem quia repellat, placeat aut dignissimos eaque aspernatur ad voluptatum esse facere nulla 
            voluptates? Deleniti repudiandae voluptatibus, non vitae aperiam rem qui eos repellendus consequatur. Accusamus asperiores deleniti quasi dicta voluptatum a 
            porro!
        </p>
        <p class="descricao">&nbsp Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, repellat ratione animi aut magni suscipit omnis unde, quia repudiandae illum 
            obcaecati vel debitis ducimus dolorem quae quaerat, eligendi facere ullam nihil tenetur adipisci voluptates velit laborum excepturi! Maxime voluptas consequuntur 
            quibusdam iure fuga odio impedit sunt alias commodi, rerum porro. Asperiores odio adipisci quod, sed exercitationem at similique repudiandae temporibus quia deserunt 
            facere nesciunt voluptatibus? Velit iure beatae, ullam quo ipsa quia vero minus asperiores laborum mollitia dolor, deleniti deserunt nostrum laboriosam, maiores 
            molestias odit quae optio. Perspiciatis incidunt veniam architecto hic numquam beatae asperiores iure nihil natus? Numquam, accusantium.
        </p>
        <p class="descricao">&nbsp Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem at dolore, ullam voluptatum, eius est doloremque modi dicta velit 
            sit ad vel iste nulla quisquam. Eius vel aperiam repellat repudiandae debitis ipsam optio, aliquid rem laborum commodi omnis, dolor quidem dolores, deserunt 
            distinctio alias. Vel porro, tempora ipsum corrupti qui error hic nostrum culpa, soluta, dignissimos ratione enim libero sunt nihil facilis accusantium impedit. 
            Similique repellat laboriosam quisquam culpa, saepe laudantium in sapiente voluptas ea accusamus nobis nulla deleniti dolores ducimus sit iusto voluptatem id 
            officiis sed. Ipsa, laboriosam harum inventore recusandae soluta saepe illum voluptatum unde culpa dolore dolores.
        </p>
    </div>
    <!-- Início Política -->

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