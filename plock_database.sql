SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `plock` DEFAULT CHARACTER SET latin1 ;
USE `plock` ;

-- -----------------------------------------------------
-- Table `plock`.`servers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `plock`.`servers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(255) NULL DEFAULT NULL ,
  `url` VARCHAR(255) NULL DEFAULT NULL ,
  `usuario` VARCHAR(255) NULL DEFAULT NULL ,
  `senha` VARCHAR(255) NULL DEFAULT NULL ,
  `ip` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `plock`.`clientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `plock`.`clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL DEFAULT NULL ,
  `contato_1` VARCHAR(45) NULL DEFAULT NULL ,
  `contato_2` VARCHAR(45) NULL DEFAULT NULL ,
  `site_antigo` VARCHAR(255) NOT NULL ,
  `site` VARCHAR(255) NOT NULL ,
  `telefone_1` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone_2` VARCHAR(45) NULL DEFAULT NULL ,
  `telefone_3` VARCHAR(45) NULL DEFAULT NULL ,
  `email_1` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_1` VARCHAR(45) NULL DEFAULT NULL ,
  `email_2` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_2` VARCHAR(45) NULL DEFAULT NULL ,
  `email_3` VARCHAR(45) NULL DEFAULT NULL ,
  `senha_3` VARCHAR(45) NULL DEFAULT NULL ,
  `observacoes` TEXT NOT NULL ,
  `created` VARCHAR(45) NULL DEFAULT NULL ,
  `modified` VARCHAR(45) NULL DEFAULT NULL ,
  `servers_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_clientes_servers1` (`servers_id` ASC) ,
  CONSTRAINT `fk_clientes_servers1`
    FOREIGN KEY (`servers_id` )
    REFERENCES `plock`.`servers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 257
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `plock`.`ftps`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `plock`.`ftps` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `dominio` VARCHAR(255) NULL DEFAULT NULL ,
  `host` VARCHAR(255) NULL DEFAULT NULL ,
  `username` VARCHAR(255) NULL DEFAULT NULL ,
  `password` VARCHAR(255) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `clientes_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ftps_clientes1` (`clientes_id` ASC) ,
  CONSTRAINT `ftps_ibfk_1`
    FOREIGN KEY (`clientes_id` )
    REFERENCES `plock`.`clientes` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 144
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `plock`.`tasks`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `plock`.`tasks` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NULL DEFAULT NULL ,
  `conteudo` TEXT NULL DEFAULT NULL ,
  `data` VARCHAR(45) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `clientes_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tasks_clientes` (`clientes_id` ASC) ,
  CONSTRAINT `fk_tasks_clientes`
    FOREIGN KEY (`clientes_id` )
    REFERENCES `plock`.`clientes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `plock`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `plock`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(40) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `created` DATETIME NOT NULL ,
  `modified` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
