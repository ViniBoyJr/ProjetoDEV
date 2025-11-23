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
  `login_imagem` VARCHAR (255) DEFAULT '/novacode/assets/img/Icons/Ellipse'
);
    
  SELECT * FROM `novacode`.`login`;
  
  /*Criando a tabela de cadastro*/
  CREATE TABLE `novacode`.`cadastro` (
  `cadastro_id` INT AUTO_INCREMENT PRIMARY KEY,
  `cadastro_nome` VARCHAR(45) NOT NULL,
  `cadastro_sobrenome` VARCHAR(45) NOT NULL,
  `cadastro_email` VARCHAR(255) NOT NULL,
  `cadastro_senha` VARCHAR(45) NOT NULL,
  `cadastro_imagem` VARCHAR(255) DEFAULT '/novacode/assets/img/Icons/Ellipse'
  );
  
  SELECT * FROM cadastro;  
  /*INSERT INTO cadastro (cadastro_nome, cadastro_sobrenome, cadastro_email, cadastro_senha)
  VALUES ('teste', 'teste', 'teste@gmail.com', '123');*/
  
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