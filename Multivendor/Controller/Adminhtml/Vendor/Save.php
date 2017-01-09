<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 09/01/2017
 * Time: 14:01
 */

namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;


class Save extends \Magestore\Multivendor\Controller\Adminhtml\Vendor
{
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {


            /** @var \Magento\Cms\Model\Page $model */
            $model = $this->_objectManager->create('MageStore\Multivendor\Model\Vendor');

            $id = $this->getRequest()->getParam('page_id');
            if ($id) {
                $model->load($id);
            }
            \Zend_Debug::dump($data);die;
            $model->setData($data);

            $this->_eventManager->dispatch(
                'save',
                ['vendor' => $model, 'request' => $this->getRequest()]
            );

//            if (!$this->dataProcessor->validate($data)) {
//                return $resultRedirect->setPath('*/*/edit', ['vendor_id' => $model->getId(), '_current' => true]);
//            }

            try {

                $model->save();
                $this->messageManager->addSuccess(__('You saved the vendor.'));
                $this->dataPersistor->clear('vendor');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['vendor_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');

            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the vendor.'));
            }

            //$this->dataPersistor->set('vendor', $data);
            return $resultRedirect->setPath('*/*/edit', ['page_id' => $this->getRequest()->getParam('page_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}