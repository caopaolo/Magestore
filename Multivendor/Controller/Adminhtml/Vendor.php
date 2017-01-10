<?php  
namespace Magestore\Multivendor\Controller\Adminhtml;
use Magento\Framework\View\Result\LayoutFactory;
abstract class Vendor extends \Magento\Backend\App\Action {
    /**      * @param \Magento\Backend\App\Action\Context $context      */
    protected $resultPageFactory;
    protected $resultLayoutFactory;
    protected $fileUploaderFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        LayoutFactory $resultLayoutFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->resultLayoutFactory = $resultLayoutFactory;
        $this->_coreRegistry = $registry;
        $this->fileUploaderFactory = $fileUploaderFactory;
        parent::__construct($context);
    }
    protected function _isAllowed(){ 
        return $this->_authorization->isAllowed('Magestore_Multivendor::vendor_manage');
        
    }
}
