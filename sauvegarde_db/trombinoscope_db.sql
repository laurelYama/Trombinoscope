-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 juin 2024 à 12:08
-- Version du serveur : 8.0.36
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trombinoscope_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtudiant` int NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `numeroTelephone` varchar(9) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `email` varchar(45) NOT NULL,
  `photo` text NOT NULL,
  `id_parcours` int NOT NULL,
  `id_specialite` int NOT NULL,
  `id_promotion` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `nom`, `prenom`, `numeroTelephone`, `email`, `photo`, `id_parcours`, `id_specialite`, `id_promotion`) VALUES
(17, 'NGWAMBILA YAMA', 'laurel steffen', '066396925', 'ngwambilaj@gmail.com', '1718707769_IMG-20240612-WA0012.jpg', 1, 3, 2),
(19, 'DJAMPOU NKAPSEU', 'Emmanuel Stéphane', '074394225', 'xeneomega@gmail.com', '1718708483_IMG-20240612-WA0015.jpg', 1, 1, 2),
(20, 'BIBANG MINTSA ', 'Laurent Jethro Elisha', '076534321', 'elishaibang@mail.com', 'WhatsApp Image 2024-06-20 à 18.58.10_0d48a45b.jpg', 1, 2, 3),
(21, 'EBENDE MAVOUROULOU', 'Brice Angelyn', '062840135', 'bricemavourolou@mail.com', 'WhatsApp Image 2024-06-20 à 18.58.08_c34d4226.jpg', 1, 5, 3),
(22, 'KAGHETA PAMAN', 'AXIAL', '077901678', 'kaghetapamanaxial@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.07_0d03b4c6.jpg', 1, 1, 3),
(23, 'MOUNDZINGOU MBELA ', 'Vann Djeffry', '062998084', 'mbelavanndjeffrycamille@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.09_f05010e0.jpg', 1, 1, 3),
(24, 'ASSEMBE NDONG', 'Adevy Jorence', '074761410', 'Jorenceaxel@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.09_b6c1b33d.jpg', 1, 1, 3),
(25, 'OTSAGHE ', 'Josph Alexandre', '076522230', 'otsaghealexandre@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.01_fdd8d70d.jpg', 1, 2, 3),
(26, 'NZOUGHE NGUEMA  ', 'Paul Alain ', '077708457', 'alinhonguema@gmail.com', '1718710066_IMG-20240612-WA0055.jpg', 1, 2, 3),
(27, 'NZOUKI NIANG', 'Abdel Bachir', '066205512', 'nzoukib@gmail.com', '1718710235_IMG-20240612-WA0035.jpg', 1, 1, 2),
(28, 'SOUAMY', 'Kylian Mael', '074782843', 'souamykylianmael@gmail.com', '1718710413_IMG-20240612-WA0040.jpg', 1, 2, 2),
(29, 'BAH', 'Abou', '074410347', 'bahabou42@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.03_b5163480.jpg', 1, 1, 3),
(30, 'BHONGO MAVOUNGOU', 'Muccia Marie-Pierre', '077624151', 'mucciabhongomavoungou@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.06_7a012c11.jpg', 1, 1, 3),
(31, 'MISSOU DINZAMBOU', 'Alexandre Isa\'ac Ibrahim', '074290186', 'alexandredinzambou@gmail.com', '1718710872_IMG-20240612-WA0041.jpg', 1, 3, 3),
(32, 'KOUMBA WANDE', 'Diarrisso', '074148711', 'Maviogatalici@gmail.com', '1718710984_IMG-20240612-WA0044.jpg', 1, 2, 3),
(33, 'GOGAN', 'Syfaure Saïd', '062596222', 'skygogan4@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.07_82c209a3.jpg', 1, 1, 3),
(34, 'nsumbu', 'Obed-riche ', '074421185', 'richensumbu@gmail.com', '1718711595_IMG-20240612-WA0042.jpg', 1, 1, 3),
(35, 'Mavoungou', 'Beni reel', '074803148', 'benireelmavoungou@gmail.com', '1718711784_IMG-20240612-WA0053.jpg', 1, 1, 3),
(36, 'IBOUANGA IBOUANGA', 'Levi emmanuel', '074288075', 'ibouangaleviemmanuel@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.08_4e2f2e35.jpg', 1, 1, 3),
(37, 'KOFFI HOUNSOUGBIN ', 'Yenagnon Bekale Baurice', '066014325', 'bauriceyenagnon@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.02_35b7d5a3.jpg', 1, 1, 3),
(38, 'EBENDE KWALLO', 'Lauren Junior', '062287505', 'juniorebende79@gmail.com', 'WhatsApp Image 2024-06-20 à 18.58.04_90cfb7b5.jpg', 1, 2, 3),
(39, 'BOUKA NGOLO', 'Victoria Esther', '077878984', 'estherbouka2@gmail.com', '1718716318_IMG-20240612-WA0037.jpg', 1, 1, 2),
(43, 'JAHGARDE-LECLERC ', 'NZE ASSOUMOU', '077184937', 'jahgardeleclerc22@gmail.com', '1718802191_IMG-20240612-WA0030.jpg', 1, 3, 2),
(44, 'MAGANGA MADARIAGA', 'Luis Maryon', '065312137', 'Lullu.mdr@gmail.com', '1718802544_IMG-20240612-WA0048.jpg', 1, 3, 3),
(51, 'KONGO', 'Olivier', '062814308', 'mitombaolivier@gmail.com', '1718962931_IMG-20240612-WA0021.jpg', 1, 3, 2),
(52, 'Essone Ntoutoume', 'Yannice Yves', '074376401', 'essonentoutoumeyanniceyves@gmail.com', '1718963079_IMG-20240612-WA0024.jpg', 1, 1, 2),
(53, 'MBALIKOMET', 'Andrell Garland', '062223083', 'andrellgarland16@gmail.cim', '1718963239_IMG-20240612-WA0036.jpg', 1, 1, 2),
(54, 'OBAME ESSONO MBOMEYO', 'Mohamed Nasser', '076504443', 'essonoobame12@gmail.com', '1718963397_IMG-20240612-WA0013.jpg', 1, 3, 2),
(55, 'ETOULOU KANDA', 'Marie Cathrine', '074012687', 'cathykanda14@gmail.com', '1718963514_IMG-20240612-WA0017.jpg', 1, 2, 2),
(56, 'ABA NGUEMAH', 'Samuel-Junior', '074605580', 'junioraba6@gmail.com', '1718963637_IMG-20240612-WA0026.jpg', 1, 2, 2),
(57, 'ONA-ONA', 'Brandon', '074724996', 'bonaona2.0@gmail.com', '1718963780_IMG-20240612-WA0016.jpg', 1, 1, 2),
(58, 'issanga angoue', 'quessia germie', '066111330', 'sarahangoue2@gmail.com', '1718964001_WhatsApp Image 2024-06-20 à 18.58.10_6da69045.jpg', 1, 2, 3),
(59, 'MANIVA MAKOTY', 'Leaticia Chimene', '077701950', 'kimberlymaniva@gmail.com', '1718964934_WhatsApp Image 2024-06-20 à 18.58.02_3ee3a5cf.jpg', 1, 5, 3),
(60, 'DIENGUESSE NGUEMA OBAME', 'jean daniel junior', '065298821', 'jn783097@gmail.com', '1718965206_IMG-20240612-WA0033.jpg', 1, 1, 2),
(61, 'MEGNE EKOGHA', 'Gyvane Yorick', '077598508', 'gyvaneyorickmegne@gmail.com', '1718965425_IMG-20240612-WA0034.jpg', 1, 4, 2),
(62, 'NGUEMA BEKA', 'Constant', '077351689', 'bekaconstant123@gmail.com', '1718966953_IMG-20240612-WA0047.jpg', 1, 4, 2),
(63, 'BOUSSANGA  MONDJO', 'Josty Thiephel Evans', '074378281', 'jostyevans@gmail.com', '1718968241_IMG-20240612-WA0045.jpg', 1, 1, 3),
(64, 'BOUKANDOU NGOYO', 'Sterina Carelle', '074047649', 'sterinangogo@mail.com', '1718968383_IMG-20240612-WA0043.jpg', 1, 2, 2),
(65, 'EZE NDZINGA', 'David Junior', '062262214', 'ezejordan318@gmail.com', '1718968572_IMG-20240612-WA0028.jpg', 1, 3, 2),
(66, 'MOUTENDY PEME', 'Juniore', '065519321', 'junioremoutendy716@gmail.com', '1718969077_WhatsApp Image 2024-06-20 à 18.58.09_441c165f.jpg', 1, 1, 3),
(67, 'NGUEMA MVE', 'RHUDY FARID', '077975698', 'rhudyfaridbarthelemienguemamv@gmail.com', '1718969723_IMG-20240612-WA0023.jpg', 1, 2, 2),
(68, 'NZIENGUI GOUTATA ', 'Hamel Dean Farel', '074052447', 'shmurdadara@gmail.com', '1718969929_IMG-20240612-WA0022.jpg', 1, 1, 2),
(69, 'MENGUE NDZENG', 'sabrina', '060383266', 'menguendzengsabrina@gmail.com', '1718970371_WhatsApp Image 2024-06-20 à 18.58.03_5dc5bcb7.jpg', 1, 1, 3),
(70, 'MPIGA MADARIAGA', 'Alexia Venus Zia', '074673144', 'madariagazia@gmail.com', '1718970930_IMG-20240612-WA0054.jpg', 1, 1, 3),
(71, 'BOUKOUEMBI KOUMBA', 'eyce Jovie', '074400818', 'jeyce8485@gmail.com', '1718971447_IMG-20240612-WA0019.jpg', 1, 4, 2),
(72, 'MOUBENGOU', 'Bodri', '074034755', 'mbgbodri@gmail.com', '1718981946_IMG-20240612-WA0031.jpg', 1, 3, 2),
(73, 'MOUCKAKI SADIBI', 'Oldrich', '074577874', 'raphsadibi@gmail.com', '1718982066_IMG-20240612-WA0032.jpg', 1, 1, 2),
(74, 'BIYOGHE BI OBIANG', 'axel aubry', '066100789', 'biyoghebiobiangaxe@gmail.com', '1718985057_IMG-20240612-WA0014.jpg', 1, 1, 2),
(75, 'EVORA', 'rebecca herly', '077017972', 'evoraherly01@gmail.com', '1718985291_IMG-20240612-WA0039.jpg', 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `idParcours` int NOT NULL,
  `niveau` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`idParcours`, `niveau`) VALUES
(1, 'Licence Professionnelle informatique');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `idPromotion` int NOT NULL,
  `annee` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`idPromotion`, `annee`) VALUES
(1, 2021),
(2, 2022),
(3, 2023);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `idSpecialite` int NOT NULL,
  `nom_specialite` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`idSpecialite`, `nom_specialite`) VALUES
(1, 'CYBER DEFENSE'),
(2, 'MONETIQUE BANCAIRE'),
(3, 'DEVELOPPEMENT WEB & MOBILE'),
(4, 'RESEAUX HAUT DEBIT ET SANS FIL'),
(5, 'BIG DATA'),
(6, 'CLOUD COMPUTING');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(2, 'ngwambilaj@gmail.com', 'yamal', 'xoJ0MBQcwMwE6QDj+neRKA==', 'admin'),
(3, 'donas@gmail.com', 'donas', '9JBGOl4ZxPN+b7Tmq26h2g==', 'normal'),
(32, 'xeneomega@gmail.com', 'emannuelle', 'xS40llAy3S07QhaqScPrbA==', 'normal');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtudiant`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numeroTelephone` (`numeroTelephone`),
  ADD KEY `id_parcours` (`id_parcours`),
  ADD KEY `id_promotion` (`id_promotion`),
  ADD KEY `id_specialite` (`id_specialite`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`idParcours`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`idPromotion`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`idSpecialite`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtudiant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `idParcours` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `idPromotion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `idSpecialite` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`id_parcours`) REFERENCES `parcours` (`idParcours`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`idPromotion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `etudiant_ibfk_4` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`idSpecialite`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
