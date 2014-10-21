<?php 
class Mygento_Eventmon_Block_Adminhtml_Event_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _prepareForm()
	{
		$form = new Varien_Data_Form();
		$this->setForm($form);
		$fieldset = $form->addFieldset('event_form', array('legend'=>Mage::helper('eventmon')->__('Event Information')));
		if(Mage::registry('event_data') && array_key_exists('id',Mage::registry('event_data')->getData()))
		{
			$fieldset->addField('id', 'hidden', array('label' => Mage::helper('eventmon')->__('ID'),'name' => 'id','required'=> true));
		}
		if ( Mage::getSingleton('adminhtml/session')->getEventData())
		{
			$form->setValues(Mage::getSingleton('adminhtml/session')->getEventData());
			Mage::getSingleton('adminhtml/session')->setEventData(null);
		} elseif(Mage::registry('event_data')){
			$form->setValues(Mage::registry('event_data')->getData());
		}
		return parent::_prepareForm();
	}
}
?>