<?php
namespace Magestore\Multivendor\Model;
class Vendor extends \Magento\Framework\Model\AbstractModel{
    public function __construct(
            \Magento\Framework\Model\Context $context,
            \Magento\Framework\Registry $registry,
            \Magestore\Multivendor\Model\ResourceModel\Vendor $resource,
            \Magestore\Multivendor\Model\ResourceModel\Vendor\Collection $resourceCollection
           ) {
        parent::__construct($context, $registry, $resource, $resourceCollection);
    }
}