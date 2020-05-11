-- MySQL Script generated by MySQL Workbench
-- Sun May 10 21:16:23 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema fanatics
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema fanatics
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fanatics` DEFAULT CHARACTER SET utf8 ;
USE `fanatics` ;

-- -----------------------------------------------------
-- Table `fanatics`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanatics`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(55) NULL,
  `sobrenome` VARCHAR(45) NULL,
  `celular` VARCHAR(20) NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(255) NULL,
  `ativo` CHAR(1) NULL DEFAULT 'S',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fanatics`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanatics`.`categoria` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fanatics`.`blog`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanatics`.`blog` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL,
  `texto` VARCHAR(1000) NULL,
  `imagem` VARCHAR(45) NULL,
  `usuario_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`, `categoria_id`),
  INDEX `fk_blog_usuario_idx` (`usuario_id` ASC) VISIBLE,
  INDEX `fk_blog_categoria1_idx` (`categoria_id` ASC) VISIBLE,
  CONSTRAINT `fk_blog_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `fanatics`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_blog_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `fanatics`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
