-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sk8
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_sub_id` int(11) DEFAULT NULL,
  `cat_nom` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_497DD634DB6E77AC` (`cat_sub_id`),
  CONSTRAINT `FK_497DD634DB6E77AC` FOREIGN KEY (`cat_sub_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,NULL,'Physique','Type de planche qui utilise la force du corps pour avancer','https://picsum.photos/200/300'),(2,NULL,'Électrique','Type de planche qui utilise la force électrique pour avancer','https://picsum.photos/200/300'),(3,1,'Skateboard','Skate simple','https://picsum.photos/200/300'),(4,1,'Cruiser','Petit skate','https://picsum.photos/200/300'),(5,1,'Longboard','Long skate','https://picsum.photos/200/300'),(6,2,'Hoverboard','Board a 2 roue avec moteur électrique','https://picsum.photos/200/300'),(7,2,'Onewheel','Une unique roue avec un moteur électrique','https://picsum.photos/200/300');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_id` int(11) DEFAULT NULL,
  `paiement_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `livraison_id` int(11) DEFAULT NULL,
  `com_date` datetime NOT NULL,
  `com_total` decimal(10,2) DEFAULT NULL,
  `com_adresse` varchar(255) NOT NULL,
  `com_ville` varchar(255) NOT NULL,
  `com_cp` varchar(255) NOT NULL,
  `reduction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EEAA67DF6203804` (`statut_id`),
  KEY `IDX_6EEAA67D2A4C4478` (`paiement_id`),
  KEY `IDX_6EEAA67DFB88E14F` (`utilisateur_id`),
  KEY `IDX_6EEAA67D8E54FB25` (`livraison_id`),
  CONSTRAINT `FK_6EEAA67D2A4C4478` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`id`),
  CONSTRAINT `FK_6EEAA67D8E54FB25` FOREIGN KEY (`livraison_id`) REFERENCES `livraison` (`id`),
  CONSTRAINT `FK_6EEAA67DF6203804` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`),
  CONSTRAINT `FK_6EEAA67DFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` VALUES (1,1,2,2,3,'2011-11-20 21:06:18',150.00,'674, place de Texier','Le Goffnec','66 496',NULL),(2,1,2,3,3,'2004-06-12 15:55:21',600.00,'avenue Gonzalez','Perrot-sur-Mer','97 496',NULL),(3,1,2,4,3,'1982-02-08 13:30:21',NULL,'16, place de Allard','Bruneau-sur-Francois','97 477',NULL),(4,3,2,5,3,'2007-02-05 14:44:06',NULL,'592, boulevard de Rocher','Blanchard-sur-Bodin','25 953',NULL),(5,1,2,6,3,'1998-07-15 05:06:59',NULL,'618, rue de Benard','BlotVille','74 683',NULL);
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edite`
--

DROP TABLE IF EXISTS `edite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `livraison_id` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1239B6FEF347EFB` (`produit_id`),
  KEY `IDX_1239B6FE8E54FB25` (`livraison_id`),
  CONSTRAINT `FK_1239B6FE8E54FB25` FOREIGN KEY (`livraison_id`) REFERENCES `livraison` (`id`),
  CONSTRAINT `FK_1239B6FEF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edite`
--

LOCK TABLES `edite` WRITE;
/*!40000 ALTER TABLE `edite` DISABLE KEYS */;
/*!40000 ALTER TABLE `edite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` VALUES (1,'Noel SA','+33 1 24 24 88 53','6, chemin Inès Lebrun','Cohendan','82 286','Cocos (Îles)'),(2,'Lecomte Martinez S.A.S.','+33 1 11 85 15 39','boulevard Diaz','GonzalezBourg','39 687','Qatar'),(3,'Langlois','+33 (0)4 92 64 97 71','81, boulevard Dos Santos','Michaud-sur-Morin','99 088','Togo'),(4,'Levy','+33 7 30 29 13 65','555, rue de Antoine','Etienne-sur-Denis','13 495','Guinée Equatoriale'),(5,'Pelletier SA','+33 (0)1 69 28 43 81','460, rue Denis Maurice','Regnier-sur-Bigot','09650','Koweit');
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignedecommande`
--

DROP TABLE IF EXISTS `lignedecommande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignedecommande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `commande_id` int(11) DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A4C3DF16F347EFB` (`produit_id`),
  KEY `IDX_A4C3DF1682EA2E54` (`commande_id`),
  CONSTRAINT `FK_A4C3DF1682EA2E54` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`),
  CONSTRAINT `FK_A4C3DF16F347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignedecommande`
--

LOCK TABLES `lignedecommande` WRITE;
/*!40000 ALTER TABLE `lignedecommande` DISABLE KEYS */;
INSERT INTO `lignedecommande` VALUES (1,1,2,3,200.00);
/*!40000 ALTER TABLE `lignedecommande` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`admin`@`localhost`*/ /*!50003 TRIGGER maj_total_update AFTER UPDATE ON lignedecommande
    FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.commande_id; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE commande_id=id_c); -- on recalcul le total
    UPDATE commande SET com_total=tot WHERE id=id_c; -- on stocke le total dans la table commande
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `liv_id_id` int(11) DEFAULT NULL,
  `liv_nom` varchar(255) NOT NULL,
  `liv_url` varchar(255) NOT NULL,
  `liv_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A60C9F1F58FCEBF7` (`liv_id_id`),
  CONSTRAINT `FK_A60C9F1F58FCEBF7` FOREIGN KEY (`liv_id_id`) REFERENCES `edite` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livraison`
--

LOCK TABLES `livraison` WRITE;
/*!40000 ALTER TABLE `livraison` DISABLE KEYS */;
INSERT INTO `livraison` VALUES (1,NULL,'Abeille Rush','https://picsum.photos/200/300','2015-08-31 15:15:45'),(2,NULL,'FedEx','https://picsum.photos/200/300','1978-12-24 10:20:50'),(3,NULL,'Colissimo','https://picsum.photos/200/300','2016-04-05 18:06:37');
/*!40000 ALTER TABLE `livraison` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_methode` varchar(255) NOT NULL,
  `p_date` datetime NOT NULL,
  `p_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiement`
--

LOCK TABLES `paiement` WRITE;
/*!40000 ALTER TABLE `paiement` DISABLE KEYS */;
INSERT INTO `paiement` VALUES (1,'Paypal','1992-09-21 10:56:03',952.50),(2,'Mastercard','1972-06-23 00:45:36',901.34),(3,'Lydia','2019-07-03 17:50:03',228.19);
/*!40000 ALTER TABLE `paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) DEFAULT NULL,
  `fournisseur_id` int(11) DEFAULT NULL,
  `pro_nom` varchar(255) NOT NULL,
  `pro_description` varchar(255) NOT NULL,
  `prix_achat` decimal(10,2) NOT NULL,
  `prix_vente` decimal(10,2) NOT NULL,
  `pro_image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29A5EC27BCF5E72D` (`categorie_id`),
  KEY `IDX_29A5EC27670C757F` (`fournisseur_id`),
  CONSTRAINT `FK_29A5EC27670C757F` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`),
  CONSTRAINT `FK_29A5EC27BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produit`
--

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` VALUES (1,3,2,'Skate GLOBE','Planche en bois avec 4 roue en plastique.',40.00,50.00,'https://picsum.photos/200/300',1),(2,4,NULL,'Cruiser PENNY','Petite planche en plastique avec 4 roue en gomme.',10.00,20.00,'https://picsum.photos/200/300',1),(3,5,NULL,'Long LOADED','Grande planche en bois et 4 roue en gomme.',110.00,100.00,'https://picsum.photos/200/300',1),(4,6,NULL,'Hover HUMMER','Grande planche en bois et 4 roue en gomme.',210.00,200.00,'https://picsum.photos/200/300',1),(5,7,NULL,'Onewheel PINT','Un format pocket qui va vous faire aimer vos déplacements au quotidien. Le Onewheel Pint est un concentré de technologie, léger, réactif et puissant.',510.00,500.00,'https://picsum.photos/200/300',1);
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO `statut` VALUES (1,'Validée'),(2,'En préparation'),(3,'Expédiée'),(4,'Livrée');
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `u_adresse` varchar(255) NOT NULL,
  `u_ville` varchar(255) NOT NULL,
  `u_cp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1D1C63B3E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'admin@mail.fr','[\"ROLE_ADMIN\"]','$2y$13$CvK3EUoJQLvlKGlyxLmAn.V/1U.zOhju3F1QVZczhV22G4le4mwBi','Malek','Julien','ADMIN','0322329588','13, boulevard Gros','Lopez','92 141'),(2,'chartier.antoinette@collet.com','[\"ROLE_USER\"]','$2y$13$kGhxTZoQFqpNcTxM48l.Hu1dgNe2nJsRA4/55SAVp9nnCWbb1/0Pm','Lambert','Brigitte','Professionnel','+33 (0)9 94 46 22 03','6, rue Marie Mace','Fontaine','32008'),(3,'gregoire.tristan@club-internet.fr','[\"ROLE_USER\"]','$2y$13$U8CipqAvk4TYl6NrcU1XR.7oThNmzX7B1CQ4EcRI1xX1KdSzOCBNq','Laroche','Dominique','Particulier','+33 1 17 64 66 88','5, chemin Rodriguez','Gillesboeuf','31731'),(4,'jdelattre@free.fr','[\"ROLE_USER\"]','$2y$13$u15ik/F8xI4XucB.LZsweOY1HkPjFPQlWIkRK7SOwCD2Sal1JZtq2','Paul','Marcel','Particulier','09 27 40 77 46','54, rue Hélène Rousseau','Arnaud-sur-Dumas','60 719'),(5,'guillaume.mace@orange.fr','[\"ROLE_USER\"]','$2y$13$YyaijvmHJkfxRFVuXEnL4u.4NQKFpzWBr8m4KcmeAhK5xX8HZ0d5q','Moulin','Hortense','Particulier','+33 2 32 78 93 31','93, avenue Rémy Laurent','PierreVille','72 154'),(6,'bernard02@jacques.net','[\"ROLE_USER\"]','$2y$13$ko7pWAaLCUJ7JccT3by6OOtskYRHZgffqdGYpOPZ7E6mUQQmw3Uz6','Da Silva','Anouk','Professionnel','+33 3 92 64 11 05','87, impasse de Bertin','Lacombe','16212');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vue_produits_categorie`
--

DROP TABLE IF EXISTS `vue_produits_categorie`;
/*!50001 DROP VIEW IF EXISTS `vue_produits_categorie`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vue_produits_categorie` AS SELECT
 1 AS `produit_id`,
  1 AS `nom_produit`,
  1 AS `description_produit`,
  1 AS `prix_achat_produit`,
  1 AS `prix_vente_produit`,
  1 AS `categorie_id`,
  1 AS `nom_categorie`,
  1 AS `description_categorie`,
  1 AS `image_categorie` */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `vue_produits_fournisseurs`
--

DROP TABLE IF EXISTS `vue_produits_fournisseurs`;
/*!50001 DROP VIEW IF EXISTS `vue_produits_fournisseurs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vue_produits_fournisseurs` AS SELECT
 1 AS `produit_id`,
  1 AS `nom_produit`,
  1 AS `description_produit`,
  1 AS `prix_achat_produit`,
  1 AS `prix_vente_produit`,
  1 AS `fournisseur_id`,
  1 AS `nom_fournisseur`,
  1 AS `telephone_fournisseur`,
  1 AS `adresse_fournisseur`,
  1 AS `ville_fournisseur`,
  1 AS `cp_fournisseur`,
  1 AS `pays_fournisseur` */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vue_produits_categorie`
--

/*!50001 DROP VIEW IF EXISTS `vue_produits_categorie`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vue_produits_categorie` AS select `p`.`id` AS `produit_id`,`p`.`pro_nom` AS `nom_produit`,`p`.`pro_description` AS `description_produit`,`p`.`prix_achat` AS `prix_achat_produit`,`p`.`prix_vente` AS `prix_vente_produit`,`c`.`id` AS `categorie_id`,`c`.`cat_nom` AS `nom_categorie`,`c`.`cat_description` AS `description_categorie`,`c`.`cat_image` AS `image_categorie` from (`produit` `p` left join `categorie` `c` on(`p`.`categorie_id` = `c`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vue_produits_fournisseurs`
--

/*!50001 DROP VIEW IF EXISTS `vue_produits_fournisseurs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`admin`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vue_produits_fournisseurs` AS select `p`.`id` AS `produit_id`,`p`.`pro_nom` AS `nom_produit`,`p`.`pro_description` AS `description_produit`,`p`.`prix_achat` AS `prix_achat_produit`,`p`.`prix_vente` AS `prix_vente_produit`,`f`.`id` AS `fournisseur_id`,`f`.`nom` AS `nom_fournisseur`,`f`.`telephone` AS `telephone_fournisseur`,`f`.`adresse` AS `adresse_fournisseur`,`f`.`ville` AS `ville_fournisseur`,`f`.`cp` AS `cp_fournisseur`,`f`.`pays` AS `pays_fournisseur` from (`produit` `p` left join `fournisseur` `f` on(`p`.`fournisseur_id` = `f`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-05 15:50:53
