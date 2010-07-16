<?php

/**
 * Migrations between versions 001 and 002.
 */
class Migration002 extends sfMigration
{
  /**
   * Migrate up to version 002.
   */
  public function up()
  {
    $this->executeSQL("ALTER TABLE property DROP COLUMN `is_activated`");
    $this->executeSQL("ALTER TABLE property ADD COLUMN `available` TINYINT default 1 NOT NULL");
    $this->executeSQL("ALTER TABLE property ADD COLUMN `visible` TINYINT default 1 NOT NULL");
  }

  /**
   * Migrate down to version 001.
   */
  public function down()
  {
    $this->executeSQL("ALTER TABLE property ADD COLUMN `is_activated` TINYINT");
    $this->executeSQL("ALTER TABLE property DROP COLUMN `available`");
    $this->executeSQL("ALTER TABLE property DROP COLUMN `visible`");
  }
}
