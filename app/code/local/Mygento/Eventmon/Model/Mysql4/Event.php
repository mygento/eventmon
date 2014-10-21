<?php

class Mygento_Eventmon_Model_Mysql4_Event extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct() {
        $this->_init('eventmon/event', 'id');
    }

}