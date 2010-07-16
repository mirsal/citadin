
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- property
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `property`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`name` VARCHAR(128)  NOT NULL,
	`location` VARCHAR(255)  NOT NULL,
	`type` VARCHAR(64)  NOT NULL,
	`category` VARCHAR(64),
	`description` TEXT,
	`price` INTEGER,
	`surface` INTEGER,
	`rooms` INTEGER,
	`bedrooms` INTEGER,
	`orientation` VARCHAR(128),
	`garage` TINYINT,
	`parking` TINYINT,
	`balcony` TINYINT,
	`terrace` TINYINT,
	`cellar` TINYINT,
	`attic` TINYINT,
	`is_activated` TINYINT,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- file_attachment
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `file_attachment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`property_id` INTEGER,
	`file_attachment_id` INTEGER,
	`relative_size` VARCHAR(16),
	`content_type` VARCHAR(32),
	`size` INTEGER,
	`data` LONGBLOB,
	PRIMARY KEY (`id`),
	KEY `file_attachment_I_1`(`property_id`),
	KEY `file_attachment_I_2`(`file_attachment_id`),
	KEY `file_attachment_I_3`(`relative_size`),
	CONSTRAINT `file_attachment_FK_1`
		FOREIGN KEY (`property_id`)
		REFERENCES `property` (`id`)
		ON DELETE CASCADE,
	CONSTRAINT `file_attachment_FK_2`
		FOREIGN KEY (`file_attachment_id`)
		REFERENCES `file_attachment` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- customer
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `customer`
(
	`user_id` INTEGER  NOT NULL,
	`email` VARCHAR(128)  NOT NULL,
	`name` VARCHAR(128)  NOT NULL,
	`address` VARCHAR(255),
	`postal_code` VARCHAR(16),
	`home_phone` VARCHAR(16),
	`mobile_phone` VARCHAR(16),
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `customer_FI_1` (`user_id`),
	CONSTRAINT `customer_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- sf_guard_group
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sf_guard_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_guard_group_U_1` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_permission
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sf_guard_permission`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_guard_permission_U_1` (`name`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_group_permission
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission`
(
	`group_id` INTEGER  NOT NULL,
	`permission_id` INTEGER  NOT NULL,
	PRIMARY KEY (`group_id`,`permission_id`),
	CONSTRAINT `sf_guard_group_permission_FK_1`
		FOREIGN KEY (`group_id`)
		REFERENCES `sf_guard_group` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_group_permission_FI_2` (`permission_id`),
	CONSTRAINT `sf_guard_group_permission_FK_2`
		FOREIGN KEY (`permission_id`)
		REFERENCES `sf_guard_permission` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sf_guard_user`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(128)  NOT NULL,
	`algorithm` VARCHAR(128) default 'sha1' NOT NULL,
	`salt` VARCHAR(128)  NOT NULL,
	`password` VARCHAR(128)  NOT NULL,
	`created_at` DATETIME,
	`last_login` DATETIME,
	`is_active` TINYINT default 1 NOT NULL,
	`is_super_admin` TINYINT default 0 NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `sf_guard_user_U_1` (`username`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_permission
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission`
(
	`user_id` INTEGER  NOT NULL,
	`permission_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`permission_id`),
	CONSTRAINT `sf_guard_user_permission_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_permission_FI_2` (`permission_id`),
	CONSTRAINT `sf_guard_user_permission_FK_2`
		FOREIGN KEY (`permission_id`)
		REFERENCES `sf_guard_permission` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_user_group
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sf_guard_user_group`
(
	`user_id` INTEGER  NOT NULL,
	`group_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`group_id`),
	CONSTRAINT `sf_guard_user_group_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `sf_guard_user_group_FI_2` (`group_id`),
	CONSTRAINT `sf_guard_user_group_FK_2`
		FOREIGN KEY (`group_id`)
		REFERENCES `sf_guard_group` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- sf_guard_remember_key
#-----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key`
(
	`user_id` INTEGER  NOT NULL,
	`remember_key` VARCHAR(32),
	`ip_address` VARCHAR(50)  NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`user_id`,`ip_address`),
	CONSTRAINT `sf_guard_remember_key_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
