<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 08/01/2017
 * Time: 09:30
 */

namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;


class Product extends \Magestore\Multivendor\Controller\Adminhtml\Vendor
{
    public function execute()
    {
        $resultLayout = $this->_resultLayoutFactory->create();
        $resultLayout->getLayout()->getBlock('vendor.edit.tab.product')
        ->setProducts($this->getRequest()->getPost('oproduct', null));
        return $resultLayout;
    }
}