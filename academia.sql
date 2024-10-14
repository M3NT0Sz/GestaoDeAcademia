START TRANSACTION;
SET time_zone = "+03:00";

CREATE TABLE `recepcionista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `dataNascimento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;