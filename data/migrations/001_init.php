<?php

/**
 * Migrations between versions 000 and 001.
 */
class Migration001 extends sfMigration
{
  /**
   * Migrate up to version 001.
   */
  public function up()
  {
    $this->loadSql(dirname(__FILE__).'/001_init.sql');
  }

  /**
   * Migrate down to version 000.
   */
  public function down()
  {
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=0');
    
    $this->executeSQL('DROP TABLE property');
    $this->executeSQL('DROP TABLE file_attachment');
    $this->executeSQL('DROP TABLE customer');
    $this->executeSQL('DROP TABLE sf_guard_group');
    $this->executeSQL('DROP TABLE sf_guard_permission');
    $this->executeSQL('DROP TABLE sf_guard_group_permission');
    $this->executeSQL('DROP TABLE sf_guard_user');
    $this->executeSQL('DROP TABLE sf_guard_user_permission');
    $this->executeSQL('DROP TABLE sf_guard_user_group');
    $this->executeSQL('DROP TABLE sf_guard_remember_key');
    
    $this->executeSQL('SET FOREIGN_KEY_CHECKS=1');
  }
}
