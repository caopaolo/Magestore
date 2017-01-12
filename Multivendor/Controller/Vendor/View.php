<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 12/01/2017
 * Time: 09:30
 */

namespace Magestore\Multivendor\Controller\Vendor;

use Magento\Framework\App\Action\Context;
class View extends \Magestore\Multivendor\Controller\Vendor
{
    protected $_resultPageFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {



        $this->_pageConfig->getTitle()->set('Meta Title');



        return parent::_prepareLayout();
    }
    public function execute()
    {
        $vendorId = $this->getRequest()->getParam('id');
        $vendor_model = $this->_objectManager->create('Magestore\Multivendor\Model\Vendor')->load($vendorId);
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}