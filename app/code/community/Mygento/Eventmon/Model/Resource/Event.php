<?php

class Mygento_Eventmon_Model_Resource_Event extends Mage_Core_Model_Resource_Db_Abstract {

    public function _construct() {
        $this->_init('eventmon/event', 'id');
    }

}