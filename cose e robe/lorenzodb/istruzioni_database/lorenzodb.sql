-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Lug 29, 2017 alle 10:57
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clarissa`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `lavori`
--

CREATE TABLE `lavori` (
  `id` int(11) NOT NULL,
  `titolo` varchar(250) NOT NULL,
  `descrizione` mediumtext NOT NULL,
  `immagine` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `lavori`
--

INSERT INTO `lavori` (`id`, `titolo`, `descrizione`, `immagine`) VALUES
(1, 'mimmacccsfdgasdfasdf', 'tua nonnaccccsdfasdfasfdasdf', '17807223_264511167344316_8925205856668368115_o.jpg'),
(2, 'tua zia', 'grassa e brutta', '18891527_290691911392908_8096291548611389471_o.jpg'),
(3, 'montonesi', 'tutti strunzi Inserisci descrizione', '17807595_264511144010985_3372372952965043689_o.jpg'),
(4, 'poggio renatico', 'fa veramente schifo', '18880318_290693118059454_1695425893581165002_o.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
