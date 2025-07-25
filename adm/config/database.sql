CREATE DATABASE brisavinicola;

CREATE TABLE adm (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    cpf VARCHAR(11) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(15),
    status ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo',
    poder TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO adm (id, nome, email,cpf,senha,telefone,status,poder) VALUES
(1, 'Isabel', 'isabel@gmail.com','41976083818', '123456','11979907856','ativo',9);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    descricao TEXT NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    status ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo',
    datahora DATETIME DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO produtos (nome, preco, datahora, descricao, imagem, status) VALUES
('Château Margaux', 219.99, NOW(), 'Vinho tinto produzido em Margaux, França. Safra 2015. Elaborado com Cabernet Sauvignon e Merlot, é conhecido por sua elegância e complexidade.', 'vinho-tinto-15.png', 'ativo'),
('Penfolds Grange', 150.00, NOW(), 'Ícone australiano da Penfolds, produzido em Adelaide, Austrália. Safra 2018. Blend de Shiraz e Cabernet Sauvignon, envelhecido em barris de carvalho.', 'vinho-tinto-4.png', 'ativo'),
('Brunello Biondi Santi', 89.90, NOW(), 'Vinho tinto de Montalcino, Itália. Safra 2016. Feito exclusivamente de Sangiovese Grosso, com longa maturação em carvalho.', 'vinho-tinto-11.png', 'ativo'),
('Almaviva', 145.50, NOW(), 'Vinho chileno de Puente Alto, Chile. Safra 2019. Blend de Cabernet Sauvignon, Carmenère e Cabernet Franc. Envelhecido em carvalho francês.', 'espumante-3.png', 'ativo'),
('Opus One', 119.99, NOW(), 'Produzido em Napa Valley, EUA. Safra 2018. Um blend sofisticado de Cabernet Sauvignon, Merlot, Cabernet Franc, Malbec e Petit Verdot.', 'vinho-tinto-5.png', 'ativo'),
('Malbec Catena', 109.99, NOW(), 'Vinho argentino de Mendoza. Safra 2020. 100% Malbec, com notas de frutas vermelhas e toque de especiarias.', 'vinho-branco-2.png', 'ativo'),
('Vega Sicilia', 69.90, NOW(), 'Vinho espanhol de Ribera del Duero, Espanha. Safra 2017. Blend de Tempranillo e outras uvas locais, envelhecido por anos em carvalho.', 'vinho-tinto-16.png', 'ativo'),
('Barolo Gaja', 55.90, NOW(), 'Produzido em Barolo, Itália. Safra 2019. 100% Nebbiolo, com características marcantes de trufas, cerejas e taninos firmes.', 'vinho-tinto-14.png', 'ativo'),
('Quinta Crasto', 300.00, NOW(), 'Vinho português do Douro. Safra 2017. Blend de uvas tradicionais da região, envelhecido em carvalho e com grande estrutura.', 'espumante.png', 'ativo'),
('Carmenère Montes', 200.00, NOW(), 'Vinho chileno de Colchagua. Safra 2020. 100% Carmenère, com notas de frutas maduras e especiarias.', 'tinto5.png', 'ativo'),
('Puligny-Montrachet', 100.00, NOW(), 'Vinho branco francês de Puligny-Montrachet, França. Safra 2018. Produzido com Chardonnay, destaca-se pela mineralidade e finesse.', 'vinho-tinto-2.png', 'ativo'),
('Cloudy Sauvignon', 180.00, NOW(), 'Produzido em Marlborough, Nova Zelândia. Safra 2021. 100% Sauvignon Blanc, com notas vibrantes de maracujá e ervas.', 'vinho-rose-1.png', 'ativo'),
('Scharzhofberger', 99.90, NOW(), 'Vinho branco alemão da região de Saar. Safra 2019. Feito com Riesling, apresenta frescor e mineralidade.', 'vinho-tinto-1.png', 'ativo'),
('Chardon Cakebread', 75.90, NOW(), 'Vinho branco de Napa Valley, EUA. Safra 2020. Produzido com Chardonnay, destaca-se por notas de maçã e carvalho.', 'vinho-branco-3.png', 'ativo'),
('Albariño Señorans', 200.00, NOW(), 'Vinho espanhol de Rías Baixas. Safra 2020. Feito com Albariño, é refrescante e frutado.', 'vinho-branco-4.png', 'ativo'),
('Pinot Margherita', 220.00, NOW(), 'Vinho tinto italiano de Trentino-Alto Adige. Safra 2019. Feito com Pinot Noir, elegante e com boa acidez.', 'vinho-tinto-10.png', 'ativo'),
('Chenin Mullineux', 85.50, NOW(), 'Vinho branco sul-africano de Swartland. Safra 2020. Feito com Chenin Blanc, apresenta boa estrutura e frescor.', 'vinho-tinto-13.png', 'ativo'),
('Gewürztraminer', 145.50, NOW(), 'Vinho branco de Alsace, França. Safra 2021. Feito com Gewürztraminer, notas florais e exóticas.', 'vinho-branco-1.png', 'ativo'),
('Verdelho Barbeito', 200.00, NOW(), 'Vinho português da Madeira. Safra 2018. Feito com Verdelho, é intenso e com excelente equilíbrio.', 'vinho-tinto-12.png', 'ativo'),
('Dom Pérignon', 169.90, NOW(), 'Champagne francês de Épernay. Safra 2012. Blend de Chardonnay e Pinot Noir, reconhecido mundialmente.', 'espumante-1.png', 'ativo'),
('Prosecco', 79.99, NOW(), 'Espumante italiano de Valdobbiadene. Safra 2021. Produzido com Glera, leve e refrescante.', 'vinho-tinto-7.png', 'ativo'),
('Cava Codorníu', 80.00, NOW(), 'Espumante espanhol de Penedès. Safra 2020. Blend de Macabeo, Xarel·lo e Parellada, fresco e vibrante.', 'vinho-tinto-11.png', 'ativo'),
('Chandon Brut', 150.00, NOW(), 'Espumante brasileiro do Vale dos Vinhedos. Safra 2021. Blend de uvas Chardonnay e Pinot Noir.', 'vinho-tinto-10.png', 'ativo'),
('Champagne Bollinger', 159.99, NOW(), 'Champagne francês de Aÿ. Safra 2018. Feito com predominância de Pinot Noir, encorpado e complexo.', 'vinho-tinto-16.png', 'ativo');



CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    cpf VARCHAR(11) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(15),
    status ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO cliente (id, nome, email,cpf,senha,telefone,status) VALUES
(1, 'Isabel', 'isabel@gmail.com','41976083818', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','11979907856','ativo');

CREATE TABLE  endereco (
  ID_ENDERECO int NOT NULL AUTO_INCREMENT,
  id_cliente int DEFAULT NULL,
  cep varchar(10) DEFAULT NULL,
  estado varchar(50) DEFAULT NULL,
  cidade varchar(50) DEFAULT NULL,
  bairro varchar(50) DEFAULT NULL,
  rua varchar(100) DEFAULT NULL,
  numero int DEFAULT NULL,
  bloco varchar(10) DEFAULT NULL,
  apto varchar(10) DEFAULT NULL,
  nome varchar(100) DEFAULT NULL,
  datahora datetime DEFAULT NULL,
  status tinyint(1) NOT NULL COMMENT '1-ative| 0-disabled',
  PRIMARY KEY (ID_ENDERECO),
  KEY id_cliente (id_cliente)
) ;

INSERT INTO endereco (ID_ENDERECO, id_cliente, cep, estado, cidade, bairro, rua, numero, bloco, apto, nome, datahora, status) VALUES
(1, 1, '05891280', 'SP', 'São Paulo', 'Jardim', 'Rua Luisa Todi', 647, '52 ', '', 'Casa Família', '0000-00-00 00:00:00', 1);


CREATE TABLE  pedidos (
  ID_PEDIDO int NOT NULL AUTO_INCREMENT,
  id_cliente int DEFAULT NULL,
  id_endereco int DEFAULT NULL,
  id_produtos int DEFAULT NULL,
  valor decimal(10,2) DEFAULT NULL,
  pagamento varchar(50) DEFAULT NULL,
  status varchar(100) DEFAULT NULL,
  datahora datetime DEFAULT NULL,
  PRIMARY KEY (ID_PEDIDO),
  KEY id_cliente (id_cliente),
  KEY id_endereco (id_endereco)
);

INSERT INTO pedidos (ID_PEDIDO, id_cliente, id_endereco, id_produtos,valor, pagamento, status, datahora) VALUES
(1, 2, 1,1, '399.96', 'pix', '6', '2024-11-26 20:24:59');

CREATE TABLE pedidos_clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    cpf VARCHAR(14),
    telefone VARCHAR(15),
    endereco TEXT,
    metodo_pagamento VARCHAR(50),
    metodo_envio VARCHAR(50),
    total DECIMAL(10, 2),
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pedido_produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT,
    produto_id INT,
    nome VARCHAR(255),
    quantidade INT,
    preco DECIMAL(10,2),
  KEY pedido_id (pedido_id)
);

CREATE TABLE  pedidos_status (
  ID_STATUS int NOT NULL AUTO_INCREMENT,
  status varchar(100) NOT NULL,
  PRIMARY KEY (ID_STATUS)
) ;

INSERT INTO pedidos_status (ID_STATUS, status) VALUES
(1, 'Aguardando Pagamento'),
(2, 'Em preparação'),
(3, 'Em rota de entrega'),
(4, 'Finalizado'),
(5, 'Aguardando devolução'),
(6, 'Estornado'),
(7, 'Cancelado'),
(8, 'Tentativa de entrega')
