-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ott 06, 2024 alle 20:19
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creato` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id`, `titolo`, `content`, `creato`) VALUES
(1, 'Cos\'? il Cloud Computing?', 'Il Cloud Computing ? una tecnologia che consente agli utenti di accedere a risorse computazionali come server, storage, database e software tramite Internet. Invece di possedere infrastrutture fisiche, gli utenti possono affittare risorse dal cloud provider, risparmiando sui costi hardware e di gestione. Tra i principali vantaggi del cloud computing ci sono la scalabilit?, la flessibilit? e la riduzione dei costi operativi. Le principali piattaforme di cloud includono Amazon Web Services (AWS), Microsoft Azure e Google Cloud.', '2024-10-03 15:05:31'),
(2, 'Intelligenza Artificiale: Potenzialit? e Sfide', 'L\'Intelligenza Artificiale (IA) ? un ramo dell\'informatica che si concentra sulla creazione di sistemi in grado di apprendere, ragionare e adattarsi a nuove informazioni. Le applicazioni dell\'IA spaziano dalla medicina, all\'automazione industriale, fino ai chatbot e agli assistenti virtuali come Siri e Alexa. Tuttavia, l\'IA solleva anche sfide etiche riguardo alla privacy, alla sicurezza e alla perdita di posti di lavoro a causa dell\'automazione. La ricerca sull\'IA ? in continua evoluzione, con progressi significativi in settori come il machine learning e il deep learning.', '2024-10-03 15:05:31'),
(3, 'Introduzione al Linguaggio di Programmazione Python', 'Python ? uno dei linguaggi di programmazione pi? popolari al mondo grazie alla sua sintassi semplice e leggibile. ? particolarmente usato nello sviluppo web, nell\'analisi dei dati, nell\'automazione e nel machine learning. Python supporta diversi paradigmi di programmazione, tra cui la programmazione orientata agli oggetti e la programmazione funzionale. Grazie alla vasta comunit? e alla disponibilit? di librerie esterne, Python ? diventato una scelta comune per i programmatori di ogni livello.', '2024-10-03 15:05:31'),
(4, 'L\'Importanza della Sicurezza Informatica nelle Aziende', 'La sicurezza informatica ? un aspetto cruciale per le aziende, data la crescente minaccia di attacchi informatici. Proteggere i dati sensibili e le infrastrutture informatiche ? fondamentale per prevenire violazioni della privacy e perdite economiche. Le strategie comuni includono l\'uso di firewall, la crittografia dei dati, e la formazione dei dipendenti per riconoscere le minacce di phishing. Con l\'aumento delle minacce come i ransomware, le aziende devono investire in soluzioni di sicurezza avanzate per proteggere i loro asset digitali.', '2024-10-03 15:05:31'),
(5, 'Blockchain: Oltre il Bitcoin', 'La blockchain ? una tecnologia che consente la creazione di registri digitali immutabili e distribuiti, utilizzata originariamente come base per il Bitcoin. Tuttavia, la blockchain ha potenziali applicazioni che vanno ben oltre le criptovalute, come la gestione delle supply chain, i contratti intelligenti (smart contracts) e l\'autenticazione dell\'identit? digitale. Grazie alla sua trasparenza e sicurezza, la blockchain sta diventando una tecnologia chiave in settori che richiedono la fiducia e la verificabilit? dei dati.', '2024-10-03 15:05:31');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
