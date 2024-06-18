-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 juin 2024 à 20:16
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
  `numeroTelephone` varchar(15) NOT NULL,
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
(20, 'BIBANG MINTSA ', 'Laurent Jethro Elisha', '076534321', 'elishaibang@mail.com', '1718708908_OIP (1).jpeg', 1, 2, 3),
(21, 'EBENDE MAVOUROULOU', 'Brice Angelyn', '062840135', 'bricemavourolou@mail.com', '1718709100_OIP (1).jpeg', 1, 5, 3),
(22, 'KAGHETA PAMAN', 'AXIAL', '077901678', 'kaghetapamanaxial@gmail.com', '1718709340_OIP (1).jpeg', 1, 1, 3),
(23, 'MOUNDZINGOU MBELA ', 'Vann Djeffry', '062998084', 'mbelavanndjeffrycamille@gmail.com', '1718709502_OIP (1).jpeg', 1, 1, 3),
(24, 'ASSEMBE NDONG', 'Adevy Jorence', '074761410', 'Jorenceaxel@gmail.com', '1718709690_OIP (1).jpeg', 1, 1, 3),
(25, 'OTSAGHE ', 'Josph Alexandre', '076522230', 'otsaghealexandre@gmail.com', '1718709878_OIP (1).jpeg', 1, 2, 3),
(26, 'NZOUGHE NGUEMA  ', 'Paul Alain ', '077708457', 'alinhonguema@gmail.com', '1718710066_IMG-20240612-WA0055.jpg', 1, 2, 3),
(27, 'NZOUKI NIANG', 'Abdel Bachir', '066205512', 'nzoukib@gmail.com', '1718710235_IMG-20240612-WA0035.jpg', 1, 1, 2),
(28, 'SOUAMY', 'Kylian Mael', '074782843', 'souamykylianmael@gmail.com', '1718710413_IMG-20240612-WA0040.jpg', 1, 2, 2),
(29, 'BAH', 'Abou', '074410347', 'bahabou42@gmail.com', '1718710568_OIP (1).jpeg', 1, 1, 3),
(30, 'BHONGO MAVOUNGOU', 'Muccia Marie-Pierre', '077624151', 'mucciabhongomavoungou@gmail.com', '1718710695_OIP (1).jpeg', 1, 1, 3),
(31, 'MISSOU DINZAMBOU', 'Alexandre Isa\'ac Ibrahim', '074290186', 'alexandredinzambou@gmail.com', '1718710872_IMG-20240612-WA0041.jpg', 1, 3, 3),
(32, 'KOUMBA WANDE', 'Diarrisso', '074148711', 'Maviogatalici@gmail.com', '1718710984_IMG-20240612-WA0044.jpg', 1, 2, 3),
(33, 'GOGAN', 'Syfaure Saïd', '062596222', 'skygogan4@gmail.com', '1718711416_OIP (1).jpeg', 1, 1, 3),
(34, 'nsumbu', 'Obed-riche ', '074421185', 'richensumbu@gmail.com', '1718711595_IMG-20240612-WA0042.jpg', 1, 1, 3),
(35, 'Mavoungou', 'Beni reel', '074803148', 'benireelmavoungou@gmail.com', '1718711784_IMG-20240612-WA0053.jpg', 1, 1, 3),
(36, 'IBOUANGA IBOUANGA', 'Levi emmanuel', '074288075', 'ibouangaleviemmanuel@gmail.com', '1718711970_OIP (1).jpeg', 1, 1, 3),
(37, 'KOFFI HOUNSOUGBIN ', 'Yenagnon Bekale Baurice', '066014325', 'bauriceyenagnon@gmail.com', '1718712134_OIP (1).jpeg', 1, 1, 3),
(38, 'EBENDE KWALLO', 'Lauren Junior', '062287505', 'juniorebende79@gmail.com', '1718712295_OIP (1).jpeg', 1, 2, 3),
(39, 'BOUKA NGOLO', 'Victoria Esther', '077878984', 'estherbouka2@gmail.com', '1718716318_IMG-20240612-WA0037.jpg', 1, 1, 2);

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
(3, 'donas@gmail.com', 'donas', '9JBGOl4ZxPN+b7Tmq26h2g==', 'normal');

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
  MODIFY `idEtudiant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
