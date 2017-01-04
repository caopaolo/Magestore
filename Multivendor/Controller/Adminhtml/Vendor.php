<?php
namespace Magestore\Multivendor\Controller\Adminhtml;
abstract class Vendor extends \Magento\Backend\App\Action{
    public function __construct(\Magento\Backend\App\Action\Context $context) {
        parent::__construct($context);
    }
    public function _isAllowed() {
        return $this->_authorization->isAllowed('Magestore_Multivendor::vendor_manage');
    }
}

