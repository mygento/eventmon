<?php 
class Mygento_Eventmon_Block_Adminhtml_Event_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function _construct()
	{
		parent::_construct();
		$this->_objectId = 'id';
		$this->_controller = 'adminhtml_event';
		$this->_blockGroup = 'eventmon';
		$this->_updateButton('save', 'label', Mage::helper('eventmon')->__('Save Event'));
		$this->_updateButton('delete', 'label', Mage::helper('eventmon')->__('Delete Event'));
		$this->_addButton('saveandcontinue', array(
			'label'=> Mage::helper('adminhtml')->__('Save And Continue Edit'),
			'onclick'=> 'saveAndContinueEdit()',
			'class'=> 'save',
		), -100);
		$this->_formScripts[] = "
			function saveAndContinueEdit(){
				editForm.submit($('edit_form').action+'back/edit/');
			}
		";
	}

	public function getHeaderText()
	{
		if( Mage::registry('event_data') && Mage::registry('event_data')->getId() ) {
			return Mage::helper('eventmon')->__("Edit Event %s", $this->htmlEscape(Mage::registry('event_data')->getId()));
		} else {
			return Mage::helper('eventmon')->__('Add Event');
		}
	}
}
?>