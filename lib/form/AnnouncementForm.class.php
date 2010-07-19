<?php

/**
 * Announcement form.
 *
 * @package    citadin
 * @subpackage form
 * @author     Your name here
 */
class AnnouncementForm extends BaseAnnouncementForm
{
  public function configure()
  {
    unset($this['created_at']);

    $this->widgetSchema['text'] = new sfWidgetFormTextArea();
  }
}
