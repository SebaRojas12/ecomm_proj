/*
 Navicat Premium Data Transfer

 Source Server         : tp1
 Source Server Type    : MySQL
 Source Server Version : 100432
 Source Host           : localhost:3306
 Source Schema         : ecomm_pj

 Target Server Type    : MySQL
 Target Server Version : 100432
 File Encoding         : 65001

 Date: 07/09/2024 01:45:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id_categoria` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `portada_categoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `descripcion_categoria` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Perfumes', 'portada_perfumes.jpg', 'Descubre tu fragancia ideal en nuestra colección de perfumes. Desde aromas frescos y ligeros hasta esencias intensas y sofisticadas, tenemos una amplia variedad para cada personalidad y ocasión. ¡Encuentra el perfume que te haga sentir único y especia');
INSERT INTO `categorias` VALUES (2, 'Zapatos', 'portada_zapatos.png', 'Encuentra tu par perfecto en nuestra selección de zapatos. Desde cómodas zapatillas para el día a día hasta elegantes tacones para ocasiones especiales, tenemos opciones para todos los estilos y necesidades. ¡Camina con confianza y estilo con nuestro');
INSERT INTO `categorias` VALUES (3, 'Accesorios', 'portada_accesorios.jpg', 'Completa tu estilo con nuestra exclusiva colección de accesorios. Desde elegantes joyas hasta prácticos bolsos y modernos sombreros, encuentra el complemento perfecto para cada ocasión. ¡Descubre cómo pequeños detalles pueden hacer una gran diferencia.');

-- ----------------------------
-- Table structure for favoritos
-- ----------------------------
DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE `favoritos`  (
  `id_favorito` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_usuario` int UNSIGNED NULL DEFAULT NULL,
  `id_producto` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_favorito`) USING BTREE,
  INDEX `usuario`(`id_usuario` ASC) USING BTREE,
  INDEX `producto`(`id_producto` ASC) USING BTREE,
  CONSTRAINT `producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of favoritos
-- ----------------------------

-- ----------------------------
-- Table structure for marcas
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas`  (
  `id_marca` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `logo_marca` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_marca`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES (1, 'Paco Rabanne', 'rabanne.jpg');
INSERT INTO `marcas` VALUES (2, 'Rolex', 'rolex.jpg');
INSERT INTO `marcas` VALUES (3, 'Pandora', 'pandora.jpg');
INSERT INTO `marcas` VALUES (4, 'ZARA', 'Zara_logo.svg.png');

-- ----------------------------
-- Table structure for niveles
-- ----------------------------
DROP TABLE IF EXISTS `niveles`;
CREATE TABLE `niveles`  (
  `id_nivel` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nivel` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_nivel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of niveles
-- ----------------------------
INSERT INTO `niveles` VALUES (1, 'admin');
INSERT INTO `niveles` VALUES (2, 'usuario');

-- ----------------------------
-- Table structure for ofertas
-- ----------------------------
DROP TABLE IF EXISTS `ofertas`;
CREATE TABLE `ofertas`  (
  `id_oferta` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_producto` int UNSIGNED NULL DEFAULT NULL,
  `precio_anterior` decimal(10, 2) UNSIGNED NULL DEFAULT NULL,
  `precio_oferta` decimal(10, 2) UNSIGNED NULL DEFAULT NULL,
  `fecha_inicio` date NULL DEFAULT NULL,
  `fecha_fin` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_oferta`) USING BTREE,
  INDEX `producto_id`(`id_producto` ASC) USING BTREE,
  CONSTRAINT `producto_id` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ofertas
-- ----------------------------

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id_producto` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `descripcion_corta` tinytext CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `descripcion_larga` longtext CHARACTER SET utf8 COLLATE utf8_bin NULL,
  `id_marca` int UNSIGNED NULL DEFAULT NULL,
  `id_categoria` int UNSIGNED NULL DEFAULT NULL,
  `foto_producto` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  `precio` decimal(10, 2) UNSIGNED NULL DEFAULT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id_producto`) USING BTREE,
  INDEX `cat`(`id_categoria` ASC) USING BTREE,
  INDEX `marca`(`id_marca` ASC) USING BTREE,
  CONSTRAINT `cat` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `marca` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 'Perfume Paco Rabbane Invictus', 'Perfume Paco Rabanne Invictus Hombre Edt Original 100 Ml', 'Perfume Paco Rabanne Invictus Hombre EDT Original 100 ml Perfume Hombre Paco Rabanne Invictus Edt 100ml Original\r\n\r\nUna fragancia que te hará sentir la adrenalina de la competencia y el éxtasis de la victoria\r\nÉl es un ícono para los hombres y la fantasía absoluta para las mujeres.\r\nUn top marino muy fresco y un corazón sensual compuesto de ingredientes madorosos que le dan poder a esta nueva fragancia.\r\nEsta nueva fragancia para hombres con una botella diseñada en forma de un trofeo representa la creación fresca y deportiva en relación con los otros perfumes de la casa.\r\nLa fragancia se presenta en julio de 2013 con el nombre de Invictus, que en latín significa \"invencible\" y representa el dinamismo y la energía.', 1, 1, 'invictus.jpg', 155000.00, 0);
INSERT INTO `productos` VALUES (2, 'Reloj Rolex Submariner', 'Rolex Submariner Acero inoxidable Amarillo Oro Reloj Diamond Dial 116613', 'Rolex Submariner 116613 es un lujoso reloj de fabricación suiza que presenta una esfera negra engastada con diamantes, un bisel de oro amarillo de 18 quilates con inserto de bisel de cerámica Cerachrom resistente a los arañazos, y un movimiento automático del cronómetro. También tiene una capacidad impermeable de 300 metros, garantía de 6 años y viene con un certificado de autenticidad y caja de fabricante.', 2, 3, 'submariner.jpg', 1000000.00, 0);
INSERT INTO `productos` VALUES (3, 'Collar Herradura Pandora', 'Collar Herradura Pandora Moments Pandora Plata Esterlina', 'Dale una oportunidad a la buena suerte con el Collar Herradura Pandora Moments. Este colgante, en plata de primera ley, recuerda al símbolo tradicional de la buena suerte, la herradura, en nuestro icónico diseño de cadena de serpiente se puede añadir hasta 2-3 de tus charms de Pandora favoritos. El collar tiene dos cierres de bola conectados al colgante en la parte superior, uno de los cuales se puede abrir. Además, el collar se puede ajustar a dos longitudes. Dale un toque de energía positiva a tu estilo con este porta charms fácil de personalizar o regálaselo a la coleccionista de charms de tu vida.', 3, 3, 'herradura_pandora.png', 10000.00, 0);
INSERT INTO `productos` VALUES (4, 'Zapato Tacon ZARA', 'Zapato Tacón Hebilla', 'Zapato tacón destalonado. Tacón fino. Acabado en punta. Cierre mediante hebilla en la pulsera la tobillo.\r\n\r\nAltura del tacón: 10 cm', 4, 2, 'zapato_tacon_zara.jpg', 60000.00, 0);
INSERT INTO `productos` VALUES (5, 'SILVER + GOLD 100ML', 'ZARA MAN SILVER EDT 100ML + ZARA MAN GOLD EDT 100ML (3,38 FL. OZ).', 'Eau de toilette dúo set. La pirámide olfativa incluye notas de limón, jazmín y patchouli (I) +notas de limón, canela y palo santo (II).', 4, 1, 'silver_gold.jpg', 50000.00, 0);
INSERT INTO `productos` VALUES (6, 'ZAPATILLA BÁSICA', 'Zapatilla deportiva básica.', 'Zapatilla deportiva. Parte superior fabricada en combinación de piezas. Cordonera con siete pasados. Forro interior y plantilla a contraste. Suela plana.', 4, 2, 'zapatilla_basica.jpg', 80000.00, 0);
INSERT INTO `productos` VALUES (7, 'no', 'no', 'no', NULL, 2, 'gatito_ejemplo.jpg', 0.00, 10);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `mail` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `clave` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_nivel` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `numero_cel` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  INDEX `nivel_us`(`id_nivel` ASC) USING BTREE,
  CONSTRAINT `nivel_us` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'skay', 'test.mail@gmail.com', 'esteesuntest', 1, '', '', NULL);
INSERT INTO `usuarios` VALUES (2, 'gsboo', 'usuario.mail@gmail.com', 'contrausuario1', 2, '', '', NULL);
INSERT INTO `usuarios` VALUES (4, 'eskay', 'maildeprueba@gmail.com', 'test2001', 2, 'seba', 'rojas', '12345678');

SET FOREIGN_KEY_CHECKS = 1;
