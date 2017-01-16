<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 16/01/2017
 * Time: 11:30
 */

namespace Magestore\Multivendor\Controller\Vendor;


class Detail extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $_coreRegistry = null;
    protected $_storeManager;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->_storeManager = $storeManager;
    }
    public function execute() {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}