<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 12/01/2017
 * Time: 11:20
 */

namespace Magestore\Multivendor\Block\Vendor;


use Magestore\Multivendor\Block\Vendor;

class View extends Vendor
{   protected $_objectManager;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context, 
        \Magento\Store\Model\StoreManagerInterface $storeManager, 
        \Magestore\Multivendor\Model\ResourceModel\Vendor\CollectionFactory $vendorCollectionFactory,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        array $data)
    {
        $this->_objectManager = $objectManager;
        parent::__construct($context, $storeManager, $vendorCollectionFactory, $data);
    }

    public function getVendorDetail(){
        $vendorId = $this->getRequest()->getParam('id');
        $vendor_model = $this->_objectManager->create('Magestore\Multivendor\Model\Vendor')->load($vendorId);
        //$this->pageConfig->getTitle()->set('Vendor '. $this->getVendorDetail()['name']);
        return $vendor_model->getData();
    }
    public function getMediaUrl()
    {
        return parent::getMediaUrl(); // TODO: Change the autogenerated stub
    }
//    protected function _prepareLayout()
//    {
//        if(isset($this->getRequest()->getParam('id'))){
//            
//        }
//        return parent::_prepareLayout();
//    }
    public function toHtml()
    {
        return parent::toHtml(); // TODO: Change the autogenerated stub
    }
}
