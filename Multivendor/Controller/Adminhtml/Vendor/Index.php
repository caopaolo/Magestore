<?php

namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;

class Index extends \Magestore\Multivendor\Controller\Adminhtml\Vendor {
    
    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }

}
