<?php 
class Mygento_Eventmon_Block_Adminhtml_Event_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function _construct()
	{
		parent::_construct();
		$this->setId('eventGrid');
		$this->setDefaultSort('id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
	}
	protected function _prepareCollection()
	{
		$collection = Mage::getModel('eventmon/event')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}
	protected function _prepareColumns()
	{
		$this->addColumn('id', array(
			'header'	=> Mage::helper('eventmon')->__('ID'),
			'align'	=>'right',
			'width'	=>'30px',
			'index'	=>'id',
		));
		//other columns here
		$this->addColumn('action',
			array(
				'header'	=>Mage::helper('eventmon')->__('Action'),
				'width'	=>'50',
				'type'	=>'action',
				'getter'	=>'getId',
				'actions'	=>array(
					array(
						'caption'	=>Mage::helper('eventmon')->__('Edit'),
						'url'	=>array('base'=> '*/*/edit'),
						'field'	=>'id'
					)
				),
				'filter'	=>false,
				'sortable'	=>false,
				'index'	=>'stores',
				'is_system'	=>true,
			));
		return parent::_prepareColumns();
	}
	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
}
?>