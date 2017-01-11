<?php  
namespace Magestore\Multivendor\Controller\Adminhtml;
use Magento\Framework\View\Result\LayoutFactory;
abstract class Vendor extends \Magento\Backend\App\Action {
    /**      * @param \Magento\Backend\App\Action\Context $context      */

    public function __construct(
        \Magento\Backend\App\Action\Context $context
    ) {
        parent::__construct($context);
    }
    protected function _isAllowed(){ 
        return $this->_authorization->isAllowed('Magestore_Multivendor::vendor_manage');
        
    }
}
