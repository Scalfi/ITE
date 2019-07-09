-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: prefeitura
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bairros`
--

DROP TABLE IF EXISTS `bairros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bairros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cras_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bairros_cras_id_foreign` (`cras_id`),
  CONSTRAINT `bairros_cras_id_foreign` FOREIGN KEY (`cras_id`) REFERENCES `cras` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bairros`
--

LOCK TABLES `bairros` WRITE;
/*!40000 ALTER TABLE `bairros` DISABLE KEYS */;
INSERT INTO `bairros` VALUES (1,1,'Jd. TV'),(2,1,'Vila Garcia'),(3,1,'Colina Verde'),(4,1,'Santa Cecília'),(5,2,'Fortunato'),(6,2,'Rocha Lima'),(7,2,'Jaraguá'),(8,2,'Santa Edwirgens'),(9,2,'IX de Julho '),(10,3,'Jd. Ivone '),(11,3,'Pousada da Esperança'),(12,3,' Vila São Paulo'),(13,3,' Jardim Chapadão'),(14,3,' Nova Bauru'),(15,4,'RIO VERDE/AEROPORTO'),(16,4,'SANTA MARIA'),(17,4,'DISTRITO DE TIBIRIÇÁ'),(18,5,'Parque Viaduto'),(19,5,'Vila Celina'),(20,5,'Santa Cândida'),(21,5,'Vila Industrial I'),(22,5,'Vila Industrial II'),(23,5,'Vila Industrial III'),(24,5,'Parque Real'),(25,5,'Vila Dutra'),(26,5,'Leão XIII'),(27,6,'Ferradura Mirim'),(28,6,'Manchester'),(29,6,' Vargem Limpa'),(30,6,'Aimorés'),(31,6,'Country Club'),(32,6,'Tangarás'),(33,7,'Vila Zillo'),(34,7,'Pq das Nações'),(35,7,'Comunidade do Jd Europa'),(36,7,'Jd Nicéia'),(37,7,'Águas Virtuosas'),(38,8,'Jd Vitória'),(39,8,'Jd Ouro Verde'),(40,8,' Jd Ferraz'),(41,8,'Vila Ipiranga'),(42,8,'Jd Solange'),(43,8,'Vila Santista');
/*!40000 ALTER TABLE `bairros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'Bauru');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cras`
--

DROP TABLE IF EXISTS `cras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cidade_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cras_cidade_id_foreign` (`cidade_id`),
  CONSTRAINT `cras_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cras`
--

LOCK TABLES `cras` WRITE;
/*!40000 ALTER TABLE `cras` DISABLE KEYS */;
INSERT INTO `cras` VALUES (1,1,'GODOY'),(2,1,'IX DE JULHO'),(3,1,'NOVA BAURU'),(4,1,'TIBIRIÇÁ'),(5,1,'SANTA CÂNDIDA'),(6,1,'FERRADURA MIRIM'),(7,1,'EUROPA'),(8,1,'FERRAZ');
/*!40000 ALTER TABLE `cras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_03_20_000540_create_cidade_table',2),(4,'2019_03_21_010550_create_cras_table',3),(5,'2019_03_21_011003_create_bairros_table',4),(16,'2019_03_21_013242_create_pesquisa_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesquisas`
--

DROP TABLE IF EXISTS `pesquisas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesquisas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `idade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reponsavel_familia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtd_pessoas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtd_idade_1` int(11) NOT NULL DEFAULT '0',
  `qtd_idade_2` int(11) NOT NULL DEFAULT '0',
  `qtd_idade_3` int(11) NOT NULL DEFAULT '0',
  `qtd_idade_4` int(11) NOT NULL DEFAULT '0',
  `qtd_idade_5` int(11) NOT NULL DEFAULT '0',
  `qtd_idade_6` int(11) NOT NULL DEFAULT '0',
  `pessoas_deficiencia` tinyint(1) DEFAULT NULL,
  `escolaridade_infantantil` int(11) NOT NULL DEFAULT '0',
  `escolaridade_fundamental_um` int(11) NOT NULL DEFAULT '0',
  `escolaridade_fundamental_dois` int(11) NOT NULL DEFAULT '0',
  `escolaridade_medio_completo` int(11) NOT NULL DEFAULT '0',
  `escolaridade_medio_incompleto` int(11) NOT NULL DEFAULT '0',
  `escolaridade_superior_completo` int(11) NOT NULL DEFAULT '0',
  `escolaridade_superior_incompleto` int(11) NOT NULL DEFAULT '0',
  `escolaridade_ceja` int(11) NOT NULL DEFAULT '0',
  `escolaridade_eja` int(11) NOT NULL DEFAULT '0',
  `escolaridade_nao_alfabetizado` int(11) NOT NULL DEFAULT '0',
  `quantidade_de_renda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fonte_de_renda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auxilio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cadastro_unico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempo_reside_municipio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempo_reside_bairro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membro_na_rua` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_material_residencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agua_encanada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `possui_acessibilidade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `energia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `escoamento_sanitario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banheiro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coleta_de_lixo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pavimentacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acessos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interesse_cras` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atendimento_creas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familia_acesso_politicas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finalizado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesquisas`
--

LOCK TABLES `pesquisas` WRITE;
/*!40000 ALTER TABLE `pesquisas` DISABLE KEYS */;
INSERT INTO `pesquisas` VALUES (1,1,'1','(14) 3222-6634','17013-290','Rua Tupy','Vila Cardia','Bauru','SP','1','pai','homem','1',0,0,0,0,0,0,NULL,0,0,0,0,0,0,0,0,0,0,'extrema_probreza','formal','nao','sim','nao','1','1','sim','invadida','reciclavel','sim','espacos_internos_para_rua','sim','sim','sim','sim','sim','desconhecimento','sim','sim','cultura',1);
/*!40000 ALTER TABLE `pesquisas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ITE','ite@ite.edu.br',NULL,'$2y$10$Wr4juhBp9vNnO4huzbGanuFc8epjlldd/zw4kFPUl361d1nzucRVG','w8Ck6L3KKripuvSJ5J1IJcrcyODc0pVjAqvBP6tLbtyqbNl7wsa4U5V8u7qc','2019-03-20 02:08:31','2019-03-20 02:08:31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-09 14:06:05
