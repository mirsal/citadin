<?php

/**
 * Migrations between versions 002 and 003.
 */
class Migration003 extends sfMigration
{
  /**
   * Migrate up to version 003.
   */
  public function up()
  {
    $this->loadSql(dirname(__FILE__).'/003_announcements.sql');
  }

  /**
   * Migrate down to version 002.
   */
  public function down()
  {
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=0');
    $this->executeSQL('DROP TABLE announcement');
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=1');
  }
}
