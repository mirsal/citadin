<?php

require 'lib/model/om/BaseAnnouncement.php';


/**
 * Skeleton subclass for representing a row from the 'announcement' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Sat 17 Jul 2010 09:45:21 AM CEST
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Announcement extends BaseAnnouncement {

    public function __toString()
    {
        return $this->getText();
    }

} // Announcement