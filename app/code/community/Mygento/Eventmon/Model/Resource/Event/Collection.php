<?php

class Mygento_Eventmon_Model_Resource_Event_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('eventmon/event');
    }

}