<?php

namespace Magestore\Multivendor\Controller;
use Magestore\Multivendor\Controller\Vendor\View\ViewInterface;
use Magestore\Multivendor\Model\Vendor as ModelVendor;
abstract class Vendor extends \Magento\Framework\App\Action\Action implements ViewInterface
{
    protected function _initProduct()
    {
        $categoryId = (int)$this->getRequest()->getParam('category', false);
        $productId = (int)$this->getRequest()->getParam('id');

        $params = new \Magento\Framework\DataObject();
        $params->setCategoryId($categoryId);

        /** @var \Magento\Catalog\Helper\Product $product */
        $product = $this->_objectManager->get('Magento\Catalog\Helper\Product');
        return $product->initProduct($productId, $this, $params);
    }
}