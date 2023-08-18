-- MySQL Script generated by MySQL Workbench
-- Wed Sep  7 23:14:24 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema AgendaDeContato
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `AgendaDeContato` ;

-- -----------------------------------------------------
-- Schema AgendaDeContato
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AgendaDeContato` DEFAULT CHARACTER SET utf8 ;
USE `AgendaDeContato` ;

-- -----------------------------------------------------
-- Table `AgendaDeContato`.`Usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgendaDeContato`.`Usuarios` ;

CREATE TABLE IF NOT EXISTS `AgendaDeContato`.`Usuarios` (
  `Usuario` VARCHAR(31) NOT NULL,
  `Senha` VARCHAR(20) NOT NULL,
  `Administrador` TINYINT NOT NULL,
  `UsuarioNome` VARCHAR(255) NOT NULL,
  `Flag` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`Usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgendaDeContato`.`Categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgendaDeContato`.`Categorias` ;

CREATE TABLE IF NOT EXISTS `AgendaDeContato`.`Categorias` (
  `categoria_Id` VARCHAR(2) NOT NULL,
  `Categoria_Descricao` VARCHAR(51) NOT NULL,
  `Flag` TINYINT(1) NULL DEFAULT 0,
  PRIMARY KEY (`categoria_Id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgendaDeContato`.`Contatos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgendaDeContato`.`Contatos` ;

CREATE TABLE IF NOT EXISTS `AgendaDeContato`.`Contatos` (
  `Id_Contato` INT NOT NULL AUTO_INCREMENT,
  `Contato_Nome` VARCHAR(255) NOT NULL,
  `Email` VARCHAR(100) NOT NULL,
  `CEP_Contato` DECIMAL(8) NOT NULL,
  `Endereco_UF` VARCHAR(45) NOT NULL,
  `Endereco_Cidade` VARCHAR(45) NOT NULL,
  `Endereco_Bairro` VARCHAR(45) NOT NULL,
  `Endereco_Rua` VARCHAR(45) NOT NULL,
  `Endereco_Nro` VARCHAR(20) NOT NULL,
  `Endereco_Compl` VARCHAR(50) NOT NULL,
  `Favorito` TINYINT(1) NULL DEFAULT 0,
  `Flag` TINYINT(1) NULL DEFAULT 0,
  `Fk_Usuario` VARCHAR(31) NOT NULL,
  `Fk_Categoria` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`Id_Contato`),
  INDEX `fk_Contatos_Usuarios_idx` (`Fk_Usuario` ASC),
  INDEX `fk_Contatos_Categorias1_idx` (`Fk_Categoria` ASC),
  CONSTRAINT `fk_Contatos_Usuarios`
    FOREIGN KEY (`Fk_Usuario`)
    REFERENCES `AgendaDeContato`.`Usuarios` (`Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Contatos_Categorias1`
    FOREIGN KEY (`Fk_Categoria`)
    REFERENCES `AgendaDeContato`.`Categorias` (`categoria_Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AgendaDeContato`.`Telefones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AgendaDeContato`.`Telefones` ;

CREATE TABLE IF NOT EXISTS `AgendaDeContato`.`Telefones` (
  `Telefone_Nro` DECIMAL(15) NOT NULL,
  `Telefone_Tipo` TINYINT(1) NOT NULL,
  `Telefone_DDI` INT NOT NULL,
  `Telefone_DDD` INT NOT NULL,
  `Flag` TINYINT(1) NULL DEFAULT 0,
  `Fk_Id_Contato` INT NOT NULL,
  PRIMARY KEY (`Telefone_Nro`, `Telefone_Tipo`, `Telefone_DDI`, `Telefone_DDD`),
  INDEX `fk_Telefones_Contatos1_idx` (`Fk_Id_Contato` ASC),
  CONSTRAINT `fk_Telefones_Contatos1`
    FOREIGN KEY (`Fk_Id_Contato`)
    REFERENCES `AgendaDeContato`.`Contatos` (`Id_Contato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
