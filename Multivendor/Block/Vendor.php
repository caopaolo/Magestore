<?php

namespace Magestore\Multivendor\Block;

class Vendor extends \Magento\Framework\View\Element\Template
{
    protected $_vendorCollectionFactory;
    protected $_configHelper;
    public $_storeManager;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magestore\Multivendor\Helper\Config $configHelper,
        \Magestore\Multivendor\Model\ResourceModel\Vendor\CollectionFactory $vendorCollectionFactory,
        array $data = []
    )
    {
        $this->_configHelper = $configHelper;
        $this->_storeManager=$storeManager;
        $this->_vendorCollectionFactory = $vendorCollectionFactory;
        parent::__construct($context, $data);
    }
    protected function _prepareLayout()
    {
        
        return parent::_prepareLayout();
    }
    public function getVendorCollection()
    {
        $collection = $this->_vendorCollectionFactory->create();
        return $collection;
    }
    public function getMediaUrl(){
        $media_dir = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $media_dir;
    }
    public function  toHtml()
    {
        if($this->_configHelper->getStoreConfig('multivendor/general/active') == 0){
            return '';
        }
        else{
            return parent::toHtml(); // TODO: Change the autogenerated stub
        }
    }
}