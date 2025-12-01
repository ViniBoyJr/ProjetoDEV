/*Informações do Banco de dados*/
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "novacode";
$table1_name = "login";
$table2_name = "cadastro";
$table3_name = "personalizar";
$table4_name = "produtos";
$table5_name = "pedidos"
*/

/*Criando o Schema*/
CREATE SCHEMA `novacode` ;
USE novacode;

/*Criando a tabela de login*/
CREATE TABLE `novacode`.`login` (
	`login_id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	`login_nome` VARCHAR(45) NOT NULL,
	`login_email` VARCHAR(255) NOT NULL,
	`login_senha` VARCHAR(45) NOT NULL,
	`login_cpf` VARCHAR(11) NOT NULL,
	`login_imagem` VARCHAR (255) DEFAULT '/novacode/assets/img/Icons/perfilsemfoto.png'
);
    
SELECT * FROM `novacode`.`login`;
  
/*Criando a tabela de cadastro*/
CREATE TABLE `novacode`.`cadastro` (
	`cadastro_id` INT AUTO_INCREMENT PRIMARY KEY,
	`cadastro_nome` VARCHAR(45) NOT NULL,
	`cadastro_sobrenome` VARCHAR(45) NOT NULL,
	`cadastro_email` VARCHAR(255) NOT NULL,
	`cadastro_senha` VARCHAR(45) NOT NULL,
	`cadastro_imagem` VARCHAR(255) DEFAULT '/novacode/assets/img/Icons/perfilsemfoto.png'
);
  
SELECT * FROM cadastro;  
  
/*Criando a tabela de bolos personalizados com chave estrangeira*/
CREATE TABLE `novacode`.`personalizar` (
	`personalizar_id` INT AUTO_INCREMENT PRIMARY KEY,
	`login_id` INT NOT NULL,
	`personalizar_peso` VARCHAR(45) NOT NULL,
	`personalizar_massa` VARCHAR(45) NOT NULL,
	`personalizar_recheio1` VARCHAR(45),
	`personalizar_recheio2` VARCHAR(45),
	`personalizar_cobertura` VARCHAR(45),
	`personalizar_complemento` VARCHAR(45),
    `personalizar_preco` VARCHAR(6) NOT NULL,
	`data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
	-- chave estrangeira
	CONSTRAINT fk_personalizar_login
		FOREIGN KEY (login_id)
        REFERENCES login(login_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
  
SELECT * FROM personalizar;
   
/* Criando a tabela produtos */
CREATE TABLE `novacode` . `produtos` (
	`produto_id` INT AUTO_INCREMENT PRIMARY KEY,
	`produto_nome` VARCHAR(100) NOT NULL,
	`produto_imagem` VARCHAR(255) NOT NULL,
	`produto_precoantigo` VARCHAR(6) NOT NULL,
	`produto_preconovo` VARCHAR(6) NOT NULL,
	`produto_precopix` VARCHAR(6) NOT NULL,
	`produto_descricao` TEXT,
	`produto_ingredientes` TEXT,
	`produto_quantidade` VARCHAR(20) NOT NULL,
	`produto_validade` DATE,
	`produto_fabricacao` DATE,
	`produto_tamanho` VARCHAR(45)
);
   
/*Populando a tabela produtos*/
INSERT INTO `novacode`.`produtos` (
    produto_nome,
    produto_imagem,
    produto_precoantigo,
    produto_preconovo,
    produto_precopix,
    produto_descricao,
    produto_ingredientes,
    produto_quantidade,
    produto_validade,
    produto_fabricacao,
    produto_tamanho
)
VALUES
    (
        'Bolo Gourmet de Chocolate',
        '/novacode/assets/img/Products/imagem1.png',
        '89,90',
        '79,90',
        '75,90',
        'Uma composição sofisticada que exalta a intensidade do cacau. Este bolo apresenta uma estrutura de massa de chocolate de alta densidade 
        e umidade, harmonizada com um recheio e cobertura de *Brigadeiro Gourmet* de textura aveludada. A estética é marcada pela aplicação 
        perimetral de wafer sticks de chocolate (Kit Kat), fixados por uma fita de cetim, conferindo um acabamento visualmente impactante. 
        A finalização é realizada com um crescendo de rosetas de brigadeiro e esferas de beijinho, proporcionando um contraste sutil de sabor 
        e uma apresentação de requinte.',
        'Massa: Farinha de trigo refinada, cacau em pó alcalino, ovos de granja, leite integral e extrato de baunilha. Recheio e Cobertura: Leite 
        condensado integral, creme de leite UHT, chocolate nobre (mínimo 50% cacau) e manteiga sem sal. Decoração: Barras de chocolate Kit Kat, 
        beijinhos de coco e granulado de chocolate belga.',
        '3 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Grande - 2 KG'
    ),
    (
		'Bolo Gourmet de Cenoura com Chocolate',
        '/novacode/assets/img/Products/imagem2.png',
        '89,90',
        '79,90',
        '75,90',
        'Uma releitura contemporânea do clássico bolo de cenoura, apresentado no formato Naked Cake (Bolo Desconstruído). A massa, de coloração 
        vibrante e textura aerada, é elaborada com cenouras frescas, resultando em um sabor naturalmente adocicado. As camadas são generosamente 
        intercaladas com um recheio denso de *Brigadeiro Gourmet, que confere estabilidade e riqueza. O topo é finalizado com uma *ganache de 
        chocolate de alto brilho, que escorre delicadamente pelas laterais, e adornado com esferas de brigadeiro crocante, garantindo uma 
        experiência sensorial de múltiplas texturas.',
        'Massa: Cenouras frescas, farinha de trigo, açúcar cristal, ovos e óleo vegetal. Recheio e Cobertura: Leite condensado, creme de leite, 
        chocolate em pó premium e manteiga. Decoração: Brigadeiros enrolados em granulado de chocolate.',
        '2 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Grande - 2 KG'
    ),
    (
		'Bolo Gourmet de Cenoura com Chocolate e Morango',
        '/novacode/assets/img/Products/imagem3.png',
        '79,90',
        '69,90',
        '65,90',
        'Uma harmonização equilibrada entre a doçura da cenoura e a acidez do morango. Este bolo, com sua massa de cenoura macia, é coroado por 
        uma Calda de Chocolate Intensa que se concentra no centro, criando o efeito "vulcão". A cobertura é complementada por uma disposição 
        radial de morangos frescos e fatiados, que adicionam frescor e um vibrante apelo visual. A combinação da base de cenoura com a ganache 
        de chocolate e a fruta fresca resulta em um perfil de sabor complexo e refrescante.',
        'Massa: Cenoura fresca, farinha de trigo, açúcar, ovos e fermento químico. Cobertura: Ganache de chocolate meio amargo e creme de leite. 
        Decoração: Morangos in natura e raspas de chocolate.',
        '1 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Médio - 1,5 KG'
    ),
    (
		'Bolo Gourmet de Chocolate Caseiro',
        '/novacode/assets/img/Products/imagem4.png',
        '69,90',
        '59,90',
        '55,90',
        'Representando a excelência da confeitaria tradicional, este bolo é uma celebração do sabor puro do chocolate. A massa é caracterizada por 
        sua estrutura robusta e sabor profundo. A cobertura é uma *Ganache de Chocolate* de consistência rústica, que envolve o bolo de forma homogênea. 
        O acabamento é realizado com a aspersão de açúcar de confeiteiro e a inclusão de chips de chocolate, conferindo um toque artesanal e sofisticado. 
        É a escolha ideal para apreciadores de um chocolate intenso e reconfortante.',
        'Massa: Farinha de trigo, cacau em pó, açúcar, ovos, manteiga e leite. Cobertura: Chocolate meio amargo e creme de leite. Decoração: Açúcar 
        de confeiteiro e pedaços de chocolate.',
        '2 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Pequeno - 1 KG'
    );

   SELECT * FROM produtos;
   
/* Criando a tabela pedidos */
CREATE TABLE `novacode` . `pedidos` (
	`pedido_id` INT AUTO_INCREMENT PRIMARY KEY,
	`login_id` INT NOT NULL,
    `produto_id` INT,
    `personalizar_id` INT,  
    `quantidade` VARCHAR(20) NOT NULL,
    `pedido_pagamento` VARCHAR (45) NOT NULL,
    `pedido_preco` VARCHAR(6) NOT NULL,
    `pedido_data` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    
    -- chave estrangeira
	CONSTRAINT fk_pedidos_login
		FOREIGN KEY (login_id)
        REFERENCES login(login_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
        
	CONSTRAINT fk_pedidos_produto
		FOREIGN KEY (produto_id)
        REFERENCES produtos(produto_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
        
	CONSTRAINT fk_pedidos_personalizar
		FOREIGN KEY (personalizar_id)
        REFERENCES personalizar(personalizar_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
	
);

SELECT * FROM pedidos;