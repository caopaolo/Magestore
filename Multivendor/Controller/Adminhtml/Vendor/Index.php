<?php
namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;
class Index extends \Magestore\Multivendor\Controller\Adminhtml\Vendor
{
    protected $resultPageFactory;
//    public function __construct(
//            \Magento\Backend\App\Action\Context $context,
//            \Magento\Framework\View\Result\PageFactory $resultPageFactory) {
//        parent::__construct($context);
//        $this->resultPageFactory = $resultPageFactory;
//    }
    public function execute() {
        echo 'fe';exit();
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}