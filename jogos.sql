set SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
start TRANSACTION;
set time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `jogos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jogos`;

create table `usuario`(
    `id` int(11) NOT NULL,
    `usuario` varchar(50) NOT NULL,
    `senha` varchar (32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

insert into `usuario` (`id`, `usuario`, `senha`)VALUES
(1, 'Matheus', 'beateaterisabop5');

alter table `usuario`
 add PRIMARY KEY (`id`);

alter table `usuario`
 MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

CREATE TABLE `historia`(
   `id` int(11) NOT NULL,
   `nome` varchar(200) NOT NULL,
   `genero` varchar (30) NOT NULL,
   `desc` varchar(6000),
   `dataAdd` date NOT NULL,
   `dataUpdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4 COLLATE=utf8mb4_general_ci;

insert into `historia` (`id`, `nome`, `genero`, `desc`, `dataAdd`, `dataUpdate`) VALUES
(1, 'Astro Bot','Aventura', '', '2025-06-21', '2025-06-22');

CREATE TABLE `personagem`(
    `id` int(11) NOT NULL,
    `nome` varchar(200) NOT NULL,
    `tipo` varchar(60) NOT NULL,
    `descricao` varchar(6000),
    `dataAdd` date NOT NULL,
    `dataUpdate` date NOT NULL 
)ENGINE=InnoDB DEFAULT CHARSET = utf8mb4 COLLATE=utf8mb4_general_ci;

alter table `personagem`
  ADD PRIMARY KEY (`id`);

alter table `personagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

insert into `personagem` (`id`, `nome`, `tipo`, `descricao`, `dataAdd`, `dataUpdate`) VALUES
(1, 'Astro Bot', 'Robô', '', '2025-06-21', '2025-06-22');



 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
 /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
 /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;