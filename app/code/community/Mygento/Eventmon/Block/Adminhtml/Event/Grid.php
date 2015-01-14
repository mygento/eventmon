<?php

class Mygento_Eventmon_Block_Adminhtml_Event_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function _construct() {
        parent::_construct();
        $this->setId('eventGrid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('eventmon/event')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('id', array(
            'header' => Mage::helper('eventmon')->__('ID'),
            'align' => 'right',
            'width' => '30px',
            'index' => 'id',
        ));

        $this->addColumn('event', array(
            'header' => Mage::helper('eventmon')->__('Event'),
            'align' => 'right',
            'width' => '100px',
            'index' => 'event',
        ));
        
        $this->addColumn('status', array(
            'header' => Mage::helper('sales')->__('Status'),
            'index' => 'status',
            'width' => '50px',
        ));
        
        $this->addColumn('message', array(
            'header' => Mage::helper('sales')->__('Message'),
            'index' => 'message',
            
        ));

        $this->addColumn('start_time', array(
            'header' => Mage::helper('sales')->__('Start time'),
            'index' => 'start_time',
            'type' => 'datetime',
            'width' => '100px',
        ));

        $this->addColumn('end_time', array(
            'header' => Mage::helper('sales')->__('End time'),
            'index' => 'end_time',
            'type' => 'datetime',
            'width' => '100px',
        ));
        
        return parent::_prepareColumns();
    }

//    public function getRowUrl($row) {
//        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
//    }

}
