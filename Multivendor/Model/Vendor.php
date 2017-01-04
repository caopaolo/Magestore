<?php
namespace Magestore\Multivendor\Model;
class Vendor extends \Magento\Framework\Model\AbstractModel{
    public function __construct(
            \Magento\Framework\Model\Context $context, 
            \Magento\Framework\Registry $registry, 
            \Magento\Framework\Model\ResourceModel\AbstractResource $resource, 
            \Magento\Framework\Data\Collection\AbstractDb $resourceCollection 
           ) {
        parent::__construct($context, $registry, $resource, $resourceCollection);
    }
}