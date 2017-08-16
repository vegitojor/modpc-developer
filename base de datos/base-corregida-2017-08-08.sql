-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema modpc
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `modpc` ;

-- -----------------------------------------------------
-- Schema modpc
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `modpc` DEFAULT CHARACTER SET utf8 ;
USE `modpc` ;

-- -----------------------------------------------------
-- Table `modpc`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`provincia` (
  `id_provincia` INT NOT NULL,
  `provincia` VARCHAR(45) NULL,
  PRIMARY KEY (`id_provincia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modpc`.`localidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`localidad` (
  `id_localidad` INT NOT NULL,
  `localidad` VARCHAR(45) NULL,
  `id_provincia` INT NOT NULL,
  PRIMARY KEY (`id_localidad`))
ENGINE = InnoDB;

CREATE INDEX `fk_localidad_provincia1_idx` ON `modpc`.`localidad` (`id_provincia` ASC);


-- -----------------------------------------------------
-- Table `modpc`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NULL,
  `email` VARCHAR(255) NOT NULL,
  `pass` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  `nombre` VARCHAR(100) NULL,
  `apellido` VARCHAR(100) NULL,
  `cod_postal` INT NULL,
  `domicilio` VARCHAR(100) NULL,
  `admin` TINYINT(1) NULL,
  `fecha_nacimiento` DATE NULL,
  `id_localidad` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE INDEX `fk_cliente_localidad1_idx` ON `modpc`.`cliente` (`id_localidad` ASC);


-- -----------------------------------------------------
-- Table `modpc`.`proveedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`proveedor` (
  `id_proveedor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `telefono` VARCHAR(30) NULL,
  `direccion` VARCHAR(100) NULL,
  `cod_postal` INT NULL,
  `mail` VARCHAR(255) NULL,
  `id_localidad` INT NULL,
  PRIMARY KEY (`id_proveedor`))
ENGINE = InnoDB;

CREATE INDEX `fk_proveedor_localidad1_idx` ON `modpc`.`proveedor` (`id_localidad` ASC);


-- -----------------------------------------------------
-- Table `modpc`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`categoria` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modpc`.`marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`marca` (
  `id_marca` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`id_marca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modpc`.`producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`producto` (
  `id_producto` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(300) NULL,
  `precio` DECIMAL(6,2) NULL,
  `valoracion` FLOAT NULL,
  `meses_garantia` TINYINT(1) NULL,
  `nuevo` TINYINT(1) NULL,
  `cod_fabricante` VARCHAR(255) NULL,
  `modelo` VARCHAR(100) NULL,
  `disponible` TINYINT(1) NULL,
  `cod_proveedor` INT NULL,
  `path_imagen` VARCHAR(500) NULL,
  `path_video` VARCHAR(500) NULL,
  `id_categoria` INT NULL,
  `id_proveedor` INT NULL,
  `id_marca` INT NULL,
  PRIMARY KEY (`id_producto`))
ENGINE = InnoDB;

CREATE INDEX `fk_producto_proveedor_idx` ON `modpc`.`producto` (`id_proveedor` ASC);

CREATE INDEX `fk_producto_categoria1_idx` ON `modpc`.`producto` (`id_categoria` ASC);

CREATE INDEX `fk_producto_marca1_idx` ON `modpc`.`producto` (`id_marca` ASC);


-- -----------------------------------------------------
-- Table `modpc`.`respuesta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`respuesta` (
  `id_respuesta` INT NOT NULL AUTO_INCREMENT,
  `respuesta` VARCHAR(500) NULL,
  PRIMARY KEY (`id_respuesta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modpc`.`pregunta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`pregunta` (
  `id_pregunta` INT NOT NULL AUTO_INCREMENT,
  `pregunta` VARCHAR(500) NULL,
  `respondida` TINYINT(1) NULL,
  `id_cliente` INT NULL,
  `id_producto` INT NULL,
  `id_respuesta` INT NULL,
  PRIMARY KEY (`id_pregunta`))
ENGINE = InnoDB;

CREATE INDEX `fk_pregunta_cliente1_idx` ON `modpc`.`pregunta` (`id_cliente` ASC);

CREATE INDEX `fk_pregunta_producto1_idx` ON `modpc`.`pregunta` (`id_producto` ASC);

CREATE INDEX `fk_pregunta_respuesta1_idx` ON `modpc`.`pregunta` (`id_respuesta` ASC);


-- -----------------------------------------------------
-- Table `modpc`.`venta_cliente_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`venta_cliente_producto` (
  `id_cliente` INT NOT NULL,
  `id_producto` INT NOT NULL,
  `fecha_venta` DATETIME NOT NULL,
  `cantidad` VARCHAR(45) NULL,
  PRIMARY KEY (`id_cliente`, `id_producto`, `fecha_venta`))
ENGINE = InnoDB;

CREATE INDEX `fk_cliente_has_producto_producto1_idx` ON `modpc`.`venta_cliente_producto` (`id_producto` ASC);

CREATE INDEX `fk_cliente_has_producto_cliente1_idx` ON `modpc`.`venta_cliente_producto` (`id_cliente` ASC);


-- -----------------------------------------------------
-- Table `modpc`.`favorito_cliente_producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`favorito_cliente_producto` (
  `id_cliente` INT NOT NULL,
  `id_producto` INT NOT NULL,
  PRIMARY KEY (`id_cliente`, `id_producto`))
ENGINE = InnoDB;

CREATE INDEX `fk_cliente_has_producto_producto2_idx` ON `modpc`.`favorito_cliente_producto` (`id_producto` ASC);

CREATE INDEX `fk_cliente_has_producto_cliente2_idx` ON `modpc`.`favorito_cliente_producto` (`id_cliente` ASC);


-- -----------------------------------------------------
-- Table `modpc`.`moneda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `modpc`.`moneda` (
  `id_moneda` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  `valor_en_peso` DECIMAL(3,2) NULL,
  PRIMARY KEY (`id_moneda`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
