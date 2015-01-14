<?php

class Mygento_Eventmon_Model_Resource_Event extends Mage_Core_Model_Resource_Db_Abstract {

    public function _construct() {
        $this->_init('eventmon/event', 'id');
    }

    public function clean($time) {
        $readAdapter = $this->_getReadAdapter();
        $writeAdapter = $this->_getWriteAdapter();

        $timeLimit = $this->formatDate(Mage::getModel('core/date')->gmtTimestamp() - $time);

        while (true) {
            $select = $readAdapter->select()
                    ->from($this->getMainTable(), array('id'))
                    ->where('start_time < ?', $timeLimit)
                    ->limit(100);
            $ids = $readAdapter->fetchCol($select);

            if (!$ids) {
                break;
            }

            $condition = array('id IN (?)' => $ids);

            // remove
            $writeAdapter->delete($this->getMainTable(), $condition);
        }

        return $this;
    }

}
