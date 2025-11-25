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
$table5_name = "movimentacoes"
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
  
  /*Criando a tabela de bolos personalizados*/
  CREATE TABLE `novacode`.`personalizar` (
  `personalizar_id` INT AUTO_INCREMENT PRIMARY KEY,
  `personalizar_peso` VARCHAR(45) NOT NULL,
  `personalizar_massa` VARCHAR(45) NOT NULL,
  `personalizar_recheio1` VARCHAR(45),
  `personalizar_recheio2` VARCHAR(45),
  `personalizar_cobertura` VARCHAR(45),
  `personalizar_complemento` VARCHAR(45),
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );
  
   SELECT * FROM personalizar;
   
   /* Criando a tabela produtos */
   CREATE TABLE `novacode` . `produtos` (
   `produto_id` INT AUTO_INCREMENT PRIMARY KEY,
   `produto_nome` VARCHAR(100) NOT NULL,
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
        '89,90',
        '79,90',
        '75,90',
        'descricao',
        'ingredientes',
        '3 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Grande - 2 KG'
    ),
    (
		'Bolo Gourmet de Cenoura com Chocolate',
        '89,90',
        '79,90',
        '75,90',
        'descricao',
        'ingredientes',
        '2 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Grande - 2 KG'
    ),
    (
		'Bolo Gourmet de Cenoura com Chocolate e Morango',
        '79,90',
        '69,90',
        '65,90',
        'descricao',
        'ingredientes',
        '1 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Médio - 1,5 KG'
    ),
    (
		'Bolo Gourmet de Chocolate Caseiro',
        '69,90',
        '59,90',
        '55,90',
        'descricao',
        'ingredientes',
        '2 Unidades',
        '2025-12-10',
        '2025-12-01',
        'Pequeno - 1 KG'
    );
   
   SELECT * FROM produtos;
   /*DROP TABLE produtos;*/
  
  
  /*Criando a tabela de bolos personalizados com chave estrangeira
  CREATE TABLE `novacode`.`personalizar` (
  `personalizar_id` INT AUTO_INCREMENT PRIMARY KEY,
  `login_id` INT,
  `personalizar_peso` VARCHAR(45) NOT NULL,
  `personalizar_massa` VARCHAR(45) NOT NULL,
  `personalizar_recheio1` VARCHAR(45),
  `personalizar_recheio2` VARCHAR(45),
  `personalizar_cobertura` VARCHAR(45),
  `personalizar_complemento` VARCHAR(45),
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  -- chave estrangeira
  CONSTRAINT fk_personalizar_login
        FOREIGN KEY (login_id)
        REFERENCES login(login_id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
  );*/

  /*DROP TABLE personalizar;*/
  
  
  
  
  /*CREATE TABLE `novacode`.`produtos` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_produto VARCHAR(50) UNIQUE NOT NULL,
    nome_produto VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL,
    tamanho VARCHAR(50) NOT NULL,
    preco INT NOT NULL,
    data_validade DATE,
    data_fabricacao DATE,
    sabor VARCHAR(50),
    descricao TEXT,
    ingredientes TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);*/

/*Populando a tabela produtos*/
/*INSERT INTO `novacode`.`produtos` (
    codigo_produto,
    nome_produto,
    quantidade,
    tamanho,
    preco,
    data_validade,
    data_fabricacao,
    sabor,
    descricao,
    ingredientes
)
VALUES
    (
        'BP001',
        'Bolo de Chocolate',
        '2',
        'Grande',
        '79',
        '2025-12-20',
        '2025-12-12',
        'Chocolate',
        'Bolo de qualidade',
        'Massa de chololate com cobertura de chocolate'
    );
    
    SELECT * FROM `produtos`; */