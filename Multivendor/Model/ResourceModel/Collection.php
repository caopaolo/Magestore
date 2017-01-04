<?php
namespace Magestore\Multivendor\Model\ResourceModel;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    protected function _construct(){
        parent::_construct();
        $this->_init('Magestore\Multivendor\Model\Vendor','Magestore\Multivendor\Model\ResourceModel\Vendor');
    }
}


