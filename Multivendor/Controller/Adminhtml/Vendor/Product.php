<?php
namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;

class Product extends \Magestore\Multivendor\Controller\Adminhtml\Vendor {
    public function execute()
    {
        $resultLayout = $this->resultLayoutFactory->create();
        $resultLayout->getLayout()->getBlock('vendor.edit.tab.product')
            ->setProducts($this->getRequest()->getPost('oproduct', null));
        return $resultLayout;
    }

}