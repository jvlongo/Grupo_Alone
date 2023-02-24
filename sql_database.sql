CREATE DATABASE cadastro_bio;

USE cadastro_bio;

CREATE TABLE `bio` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `idade` int(3) NOT NULL,
  `profissao` varchar(30) NOT NULL,
  `resumo` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);
