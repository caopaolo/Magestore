<?php
namespace Magestore\Multivendor\Controller\Vendor;

use Magento\Framework\App\Action\Context;

class Index extends \Magestore\Multivendor\Controller\Vendor
{
    protected $_resultPageFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}