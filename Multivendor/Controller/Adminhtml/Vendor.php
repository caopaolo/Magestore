<?php
namespace Magestore\Multivendor\Controller\Adminhtml;
abstract class Vendor extends \Magento\Backend\App\Action{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    public function _isAllowed() {
        return $this->_authorization->isAllowed('Magestore_Multivendor::vendor_manage');
    }
}

