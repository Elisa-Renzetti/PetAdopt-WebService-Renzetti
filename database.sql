
CREATE DATABASE IF NOT EXISTS rifugio_db;
USE rifugio_db;

CREATE TABLE IF NOT EXISTS animali (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    specie VARCHAR(30) NOT NULL,
    razza VARCHAR(50),
    eta INT,
    stato VARCHAR(20) DEFAULT 'disponibile'
);

INSERT INTO animali (nome, specie, razza, eta, stato) VALUES 
('Rex', 'Cane', 'Pastore Tedesco', 5, 'disponibile'),
('Mimi', 'Gatto', 'Persiano', 2, 'adottato'),
('Luna', 'Cane', 'Meticcio', 1, 'disponibile'),
('Whiskers', 'Gatto', 'Europeo', 4, 'disponibile');
