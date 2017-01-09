<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 08/01/2017
 * Time: 09:30
 */

namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;


use Magento\Framework\Controller\ResultFactory;

class NewAction extends \Magestore\Multivendor\Controller\Adminhtml\Vendor
{
    public function execute()
    {
        // TODO: Implement execute() method.
        $result_Forward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        return $result_Forward->forward('edit');
    }
}