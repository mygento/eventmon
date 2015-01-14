<?php

class Mygento_Eventmon_Model_Event extends Mage_Core_Model_Abstract {

    const XML_LOG_CLEAN_DAYS = 'eventmon/general/keep';

    public function _construct() {
        parent::_construct();
        $this->_init('eventmon/event');
    }

    /**
     * Set event name, status and start time to event
     * 
     * @param string $event
     * @param string $status
     * 
     * @return Mygento_Eventmon_Model_Event
     */
    public function processStart($event) {
        $this->setEvent($event);
        $this->setStatus('running');
        $this->setStartTime(time());
        $this->save();
        return $this;
    }

    /**
     * Update status in event
     * 
     * @param string $status
     * @return Mygento_Eventmon_Model_Event
     */
    public function updateStatus($status) {
        $this->setStatus($status);
        $this->save();
        return $this;
    }

    /**
     * Set event message and end time
     * 
     * @param string $message
     * @param string $status
     * 
     * @return Mygento_Eventmon_Model_Event
     */
    public function processEnd($message, $status = 'finished') {
        $this->setMessage($message);
        $this->setStatus($status);
        $this->setEndTime(time());
        $this->save();
        return $this;
    }

    public function getLogCleanTime() {
        return Mage::getStoreConfig(self::XML_LOG_CLEAN_DAYS) * 60 * 60 * 24;
    }

    /**
     * Clean database via cron
     */
    public function clean() {
        $time = $this->getLogCleanTime();
        $this->getResource()->clean($time);
    }

}
