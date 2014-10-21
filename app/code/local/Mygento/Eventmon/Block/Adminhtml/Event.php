<?php 
class Mygento_Eventmon_Block_Adminhtml_Event extends Mage_Adminhtml_Block_Widget_Grid_Container
{
	public function _construct()
	{
		$this->_controller = 'adminhtml_event';
		$this->_blockGroup = 'eventmon';
		$this->_headerText = Mage::helper('eventmon')->__('Event Manager');
		$this->_addButtonLabel =  Mage::helper('eventmon')->__('Add Event');
		parent::_construct();
	}
}
?>