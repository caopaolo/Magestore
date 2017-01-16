<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 12/01/2017
 * Time: 16:40
 */

namespace Magestore\Multivendor\Plugin\Catalog;


class Layer
{
    protected $_request;
    protected $_storeManager;
    protected $_objectManager;
    protected $_configHelper;
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Store\Model\StoreManager $storeManager,
        \Magestore\Multivendor\Helper\Config $configHelper,
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->_configHelper = $configHelper;
        $this->_request = $request;
        $this->_storeManager = $storeManager;
        $this->_objectManager = $objectManager;
    }
    public function afterGetProductCollection(\Magento\Catalog\Model\Layer $object, $listProduct)
    {
        if($this->_request->getRouteName() == 'multivendor'){
            $id = $this->_request->getParam('id');
            $vendorProductModel = $this->_objectManager->create('Magestore\Multivendor\Model\VendorProduct')->load($id,'vendor_id');
            $productIds = $vendorProductModel->getProductIds();

            $productIdArray = explode(',', $productIds);
            if($id){
                if($this->_configHelper->getStoreConfig('multivendor/general/active') == 0){
                    $listProduct->getSelect();
                }else{
                    $listProduct->getSelect()->where('e.entity_id in (?)',$productIdArray);
                }
               
            }
            else{
                $listProduct->getSelect();
            }

        }
        return $listProduct;
    }
}