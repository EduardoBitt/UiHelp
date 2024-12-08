CREATE DATABASE uihelp;
USE uihelp;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE instituicoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cnpj VARCHAR(18) NOT NULL UNIQUE,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100),
    imagem VARCHAR(255),
    categoria VARCHAR(50),
    horario_abertura TIME,
    horario_fechamento TIME,
    whatsapp VARCHAR(20),
    instagram VARCHAR(255),
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    status ENUM('pendente', 'aprovado') DEFAULT 'pendente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO admin (user, password) VALUES ('admin', '$2y$10$4CJ9axF3dkIlrV8Q1Nu.2ON5WKQtwgcsU8yx88oKtbP/7W7DAkFuO');
