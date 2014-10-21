<?php 
class Mygento_Eventmon_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction() {
		$this->loadLayout()->_setActiveMenu('eventmon/event')->_addBreadcrumb(Mage::helper('adminhtml')->__('Event Manager'), Mage::helper('adminhtml')->__('Event Manager'));
		return $this;
	}

	public function indexAction() {
		$this->_initAction()->renderLayout();
	}

	public function newAction() {
		$this->_forward('edit');
	}

	public function editAction() {
		$id = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('eventmon/event')->load($id);
		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) { $model->setData($data); }
			Mage::register('event_data', $model);
			$this->loadLayout();
			$this->_setActiveMenu('eventmon/event');
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Event Manager'), Mage::helper('adminhtml')->__('Event Manager'));
			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			$this->_addContent($this->getLayout()->createBlock('eventmon/adminhtml_event_edit'))->_addLeft($this->getLayout()->createBlock('eventmon/adminhtml_event_edit_tabs'));
			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('eventmon')->__('Event does not exist'));
			$this->_redirect('*/*/');
		}
	}

	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			$model = Mage::getModel('eventmon/event');
			$model->setData($data)->setId($this->getRequest()->getParam('id'));
			try {
				$model->save();
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('eventmon')->__('Event was successfully saved'));
				Mage::getSingleton('adminhtml/session')->setFormData(false);
				if ($this->getRequest()->getParam('back')) {
					$this->_redirect('*/*/edit', array('id' => $model->getId()));
					return;
				}
				$this->_redirect('*/*/');
				return;
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				Mage::getSingleton('adminhtml/session')->setFormData($data);
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
				return;
			}
		}
		Mage::getSingleton('adminhtml/session')->addError(Mage::helper('eventmon')->__('Unable to find Event to save'));
		$this->_redirect('*/*/');
	}
}
?>