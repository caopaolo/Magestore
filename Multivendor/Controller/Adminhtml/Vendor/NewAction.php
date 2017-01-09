<?php
namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;

use Magento\Framework\Controller\ResultFactory;

class NewAction extends \Magestore\Multivendor\Controller\Adminhtml\Vendor
{
    public function execute()
    {
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        return $resultForward->forward('edit');
    }
}