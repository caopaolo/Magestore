<?php

namespace Magestore\Multivendor\Block;

class Vendor extends \Magento\Framework\View\Element\Template
{
    protected $_vendorCollectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magestore\Multivendor\Model\ResourceModel\Vendor\CollectionFactory $vendorCollectionFactory,
        array $data = []
    )
    {
        $this->_vendorCollectionFactory = $vendorCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getVendorCollection()
    {
        $collection = $this->_vendorCollectionFactory->create();
    die('fe');
        return $collection;
    }
}