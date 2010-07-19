# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- announcement
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `announcement`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`text` VARCHAR(128)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

SET FOREIGN_KEY_CHECKS = 1;
