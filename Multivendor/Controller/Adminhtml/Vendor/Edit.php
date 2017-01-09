<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 08/01/2017
 * Time: 09:30
 */

namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action;
class Edit extends \Magestore\Multivendor\Controller\Adminhtml\Vendor
{
    public function execute()
    {
        // TODO: Implement execute() method.
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        $model = $this->_objectManager->create('Magestore\Multivendor\Model\Vendor');
        $registryObject = $this->_objectManager->get('Magento\Framework\Registry');
        if ($id) {
            $model = $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This vendor no longer exists.'));
                return $resultRedirect->setPath('multivendoradmin/*/', ['_current' => true]);
            }
        }
        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $registryObject->register('current_vendor', $model);
        $resultPage = $this->resultPageFactory->create();
        if (!$model->getId()) {
            $pageTitle = __('New Vendor');
        } else {
            $pageTitle =  __('Edit Vendor %1', $model->getName());
        }
        $resultPage->getConfig()->getTitle()->prepend($pageTitle);
        return $resultPage;
    }
}