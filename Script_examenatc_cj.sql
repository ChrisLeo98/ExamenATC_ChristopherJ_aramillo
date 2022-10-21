-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema examenatc_cj
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema examenatc_cj
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `examenatc_cj` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `examenatc_cj` ;

-- -----------------------------------------------------
-- Table `examenatc_cj`.`conductor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`conductor` (
  `idConductor` INT NOT NULL AUTO_INCREMENT,
  `nombreConductor` VARCHAR(50) NULL DEFAULT NULL,
  `apellidoConductor` VARCHAR(50) NULL DEFAULT NULL,
  `cedulaConductor` VARCHAR(10) NULL DEFAULT NULL,
  `telefonoConductor` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`idConductor`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `examenatc_cj`.`vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`vehiculo` (
  `idVehiculo` INT NOT NULL AUTO_INCREMENT,
  `marcaVehiculo` VARCHAR(50) NULL DEFAULT NULL,
  `modeloVehiculo` VARCHAR(50) NULL DEFAULT NULL,
  `anioVechiculo` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`idVehiculo`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `examenatc_cj`.`asignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`asignacion` (
  `idAsignacion` INT NOT NULL AUTO_INCREMENT,
  `idConductor` INT NULL DEFAULT NULL,
  `idVehiculo` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idAsignacion`),
  INDEX `FK_conductor_idx` (`idConductor` ASC) VISIBLE,
  INDEX `FK_vehiculo_idx` (`idVehiculo` ASC) VISIBLE,
  CONSTRAINT `FK_conductor`
    FOREIGN KEY (`idConductor`)
    REFERENCES `examenatc_cj`.`conductor` (`idConductor`),
  CONSTRAINT `FK_vehiculo`
    FOREIGN KEY (`idVehiculo`)
    REFERENCES `examenatc_cj`.`vehiculo` (`idVehiculo`))
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `examenatc_cj`.`failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `examenatc_cj`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `examenatc_cj`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `examenatc_cj`.`personal_access_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`personal_access_tokens` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `abilities` TEXT NULL DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `personal_access_tokens_token_unique` (`token` ASC) VISIBLE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type` ASC, `tokenable_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `examenatc_cj`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `examenatc_cj`.`users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
