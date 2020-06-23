-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema aia_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aia_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aia_db` DEFAULT CHARACTER SET utf8 ;
USE `aia_db` ;

-- -----------------------------------------------------
-- Table `aia_db`.`live`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aia_db`.`live` (
  `reservation_number` INT(5) NOT NULL,
  `start_date` VARCHAR(10) NOT NULL,
  `start_time` VARCHAR(10) NOT NULL,
  `slot` VARCHAR(3) NOT NULL,
  `vehicle_id` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`reservation_number`))
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aia_db`.`reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aia_db`.`reservation` (
  `reservation_number` INT(5) NOT NULL,
  `start_date` VARCHAR(10) NOT NULL,
  `start_time` VARCHAR(5) NOT NULL,
  `end_date` VARCHAR(10) NOT NULL,
  `end_time` VARCHAR(5) NOT NULL,
  `vehicle_id` VARCHAR(10) NOT NULL,
  `slot` VARCHAR(2) NOT NULL,
  `duration` INT(10) NOT NULL,
  `amount` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`reservation_number`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aia_db`.`slots`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aia_db`.`slots` (
  `slot` VARCHAR(3) NOT NULL,
  `available` VARCHAR(13) NOT NULL,
  `vehicle_id` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`slot`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `aia_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aia_db`.`users` (
  `idusers` INT(11) NOT NULL,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `type` ENUM('CASH', 'ADMIN', 'IN', 'OUT') NULL DEFAULT NULL,
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
