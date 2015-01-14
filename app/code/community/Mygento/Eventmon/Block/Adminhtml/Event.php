<?php

class Mygento_Eventmon_Block_Adminhtml_Event extends Mage_Adminhtml_Block_Template {

    public function __construct() {
        parent::__construct();
        $this->setTemplate('mygento/eventmon/table.phtml');
    }

    public function _beforeToHtml() {
        $this->setChild('grid', $this->getLayout()->createBlock('eventmon/adminhtml_event_grid', 'event.grid'));
        $this->setChild('graph', $this->getLayout()->createBlock('eventmon/adminhtml_graph', 'event.graph'));
        return parent::_beforeToHtml();
    }

}
