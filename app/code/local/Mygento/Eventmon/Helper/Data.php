<?php 

class Mygento_Eventmon_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function AddLog($text)
	{
		if (Mage::getStoreConfig('eventmon/general/debug')) {
			Mage::log($text, null, 'eventmon.log');
		}
	}
}
?>