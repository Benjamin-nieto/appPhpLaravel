-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: assessmentcentersonline.com    Database: centerme_cuc
-- ------------------------------------------------------
-- Server version	5.7.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_alarmas`
--

DROP TABLE IF EXISTS `tbl_alarmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_alarmas` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_IDcliente` bigint(10) NOT NULL,
  `fld_IDusuario` bigint(10) NOT NULL,
  `fld_fecha` date NOT NULL,
  `fld_observacion` text NOT NULL,
  `fld_registro` datetime NOT NULL,
  PRIMARY KEY (`fld_id`),
  KEY `fld_IDcliente` (`fld_IDcliente`),
  KEY `fld_IDusuario` (`fld_IDusuario`),
  CONSTRAINT `ID cliente - alarmas` FOREIGN KEY (`fld_IDcliente`) REFERENCES `tbl_cliente` (`fld_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ID usuario - alarmas` FOREIGN KEY (`fld_IDusuario`) REFERENCES `tbl_usuarios` (`fld_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_alarmas`
--

LOCK TABLES `tbl_alarmas` WRITE;
/*!40000 ALTER TABLE `tbl_alarmas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_alarmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categoria` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_nombre` varchar(60) NOT NULL,
  `fld_descripcion` text,
  PRIMARY KEY (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cliente` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_nombre` varchar(50) NOT NULL,
  `fld_apellido` varchar(50) NOT NULL,
  `fld_correo` varchar(60) DEFAULT NULL,
  `fld_pais` varchar(60) NOT NULL,
  `fld_departamento` varchar(60) NOT NULL,
  `fld_ciudad` varchar(60) NOT NULL,
  `fld_direccion` varchar(60) DEFAULT NULL,
  `fld_tipo` varchar(20) NOT NULL,
  `fld_cedula` varchar(20) DEFAULT NULL,
  `fld_nacimiento` date DEFAULT NULL,
  `fld_estado` varchar(60) NOT NULL COMMENT 'Estado Civil',
  `fld_hijos` enum('0','1') NOT NULL COMMENT '0=No, 1=Si',
  `fld_numero` int(3) DEFAULT NULL COMMENT 'Numeros Hijos',
  `fld_registro` datetime NOT NULL,
  `fld_IDuser` bigint(10) NOT NULL COMMENT 'ID user de registros',
  `fld_UpdateFecha` datetime DEFAULT NULL,
  `fld_UpdateUser` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`fld_id`),
  KEY `fld_IDuser` (`fld_IDuser`),
  KEY `fld_UpdateUser` (`fld_UpdateUser`),
  CONSTRAINT `ID user - cliente` FOREIGN KEY (`fld_IDuser`) REFERENCES `tbl_usuarios` (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cliente`
--

LOCK TABLES `tbl_cliente` WRITE;
/*!40000 ALTER TABLE `tbl_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cliente_interes`
--

DROP TABLE IF EXISTS `tbl_cliente_interes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cliente_interes` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_IDcliente` bigint(10) NOT NULL,
  `fld_IDcategoria` bigint(10) NOT NULL,
  `fld_observacion` text,
  `fld_fecha` datetime NOT NULL,
  `fld_IDuser` bigint(10) NOT NULL,
  `fld_UpdateFecha` datetime DEFAULT NULL,
  `fld_UpdateUser` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`fld_id`),
  KEY `fld_IDcliente` (`fld_IDcliente`),
  KEY `fld_IDcategoria` (`fld_IDcategoria`),
  KEY `fld_IDuser` (`fld_IDuser`),
  KEY `fld_UpdateUser` (`fld_UpdateUser`),
  CONSTRAINT `ID Categoria - Historial Interes` FOREIGN KEY (`fld_IDcategoria`) REFERENCES `tbl_categoria` (`fld_id`),
  CONSTRAINT `ID cliente - historial interes` FOREIGN KEY (`fld_IDcliente`) REFERENCES `tbl_cliente` (`fld_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ID user - Historial interes` FOREIGN KEY (`fld_IDuser`) REFERENCES `tbl_usuarios` (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cliente_interes`
--

LOCK TABLES `tbl_cliente_interes` WRITE;
/*!40000 ALTER TABLE `tbl_cliente_interes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cliente_interes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pedido`
--

DROP TABLE IF EXISTS `tbl_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pedido` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_referencia` bigint(20) NOT NULL,
  `fld_IDcliente` bigint(10) NOT NULL,
  `fld_IDusuario` bigint(10) NOT NULL,
  `fld_total` bigint(15) NOT NULL,
  `fld_estado` enum('0','1','2') NOT NULL COMMENT '0=Pendiente, 1=Pagado, 2=Cancelado',
  `fld_registro` datetime NOT NULL,
  `fld_UpdateFecha` datetime DEFAULT NULL,
  `fld_UpdateUser` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`fld_id`),
  KEY `fld_referencia` (`fld_referencia`),
  KEY `fld_IDcliente` (`fld_IDcliente`),
  KEY `ID usuario - pedido` (`fld_IDusuario`),
  KEY `fld_UpdateUser` (`fld_UpdateUser`),
  CONSTRAINT `ID cliente - pedido` FOREIGN KEY (`fld_IDcliente`) REFERENCES `tbl_cliente` (`fld_id`),
  CONSTRAINT `ID usuario - pedido` FOREIGN KEY (`fld_IDusuario`) REFERENCES `tbl_usuarios` (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pedido`
--

LOCK TABLES `tbl_pedido` WRITE;
/*!40000 ALTER TABLE `tbl_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pedido_detalles`
--

DROP TABLE IF EXISTS `tbl_pedido_detalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pedido_detalles` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_IDpedido` bigint(10) NOT NULL,
  `fld_IDproducto` bigint(10) NOT NULL,
  `fld_valor` bigint(15) NOT NULL,
  `fld_cantidad` int(3) NOT NULL,
  `fld_total` bigint(15) NOT NULL,
  PRIMARY KEY (`fld_id`),
  KEY `fld_IDpedido` (`fld_IDpedido`),
  KEY `fld_producto` (`fld_IDproducto`),
  CONSTRAINT `ID pedido - detalles` FOREIGN KEY (`fld_IDpedido`) REFERENCES `tbl_pedido` (`fld_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ID producto - detalles` FOREIGN KEY (`fld_IDproducto`) REFERENCES `tbl_productos` (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pedido_detalles`
--

LOCK TABLES `tbl_pedido_detalles` WRITE;
/*!40000 ALTER TABLE `tbl_pedido_detalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pedido_detalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_productos`
--

DROP TABLE IF EXISTS `tbl_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_productos` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_IDcat` bigint(10) NOT NULL,
  `fld_nombre` varchar(100) NOT NULL,
  `fld_descripcion` varchar(300) NOT NULL,
  `fld_valor` bigint(12) NOT NULL,
  `fld_estado` enum('1','0') DEFAULT '1' COMMENT '1=Activo, 0=Inactivo',
  `fld_registro` datetime NOT NULL,
  `fld_IDuser` bigint(10) NOT NULL,
  `fld_UpdateFecha` datetime DEFAULT NULL,
  `fld_UpdateUser` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`fld_id`),
  KEY `fld_IDcat` (`fld_IDcat`),
  KEY `fld_IDuser` (`fld_IDuser`),
  KEY `fld_UpdateUser` (`fld_UpdateUser`),
  CONSTRAINT `ID categoria - producto` FOREIGN KEY (`fld_IDcat`) REFERENCES `tbl_productos_cat` (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_productos`
--

LOCK TABLES `tbl_productos` WRITE;
/*!40000 ALTER TABLE `tbl_productos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_productos_cat`
--

DROP TABLE IF EXISTS `tbl_productos_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_productos_cat` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Categoria de productos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_productos_cat`
--

LOCK TABLES `tbl_productos_cat` WRITE;
/*!40000 ALTER TABLE `tbl_productos_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_productos_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_roles` (
  `fld_id` int(10) NOT NULL AUTO_INCREMENT,
  `fld_nombre` varchar(60) NOT NULL,
  `fld_registro` datetime NOT NULL,
  PRIMARY KEY (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_roles`
--

LOCK TABLES `tbl_roles` WRITE;
/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuarios` (
  `fld_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `fld_IDrol` int(10) NOT NULL,
  `fld_nombre` varchar(60) NOT NULL,
  `fld_correo` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fld_clave` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fld_estado` enum('0','1') NOT NULL,
  `fld_registro` datetime NOT NULL,
  `fld_IDuser` bigint(10) NOT NULL,
  `fld_UpdateFecha` datetime NOT NULL,
  `fld_UpdateUser` bigint(10) NOT NULL,
  PRIMARY KEY (`fld_id`),
  UNIQUE KEY `fld_correo` (`fld_correo`),
  KEY `fld_IDrol` (`fld_IDrol`),
  KEY `fld_IDuser` (`fld_IDuser`),
  KEY `fld_UpdateUser` (`fld_UpdateUser`),
  CONSTRAINT `ID rol - user` FOREIGN KEY (`fld_IDrol`) REFERENCES `tbl_roles` (`fld_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-31 21:42:38
