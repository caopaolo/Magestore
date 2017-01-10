<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 09/01/2017
 * Time: 14:01
 */

namespace Magestore\Multivendor\Controller\Adminhtml\Vendor;
use Magento\Framework\App\Filesystem\DirectoryList;

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

            $uploader = $this->_objectManager->create(
                'Magento\MediaStorage\Model\File\Uploader',
                ['fileId' => 'logo']
            );
            $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
            $imageAdapter = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')->create();
            $uploader->addValidateCallback('vendor_image', $imageAdapter, 'validateUploadFile');
            $uploader->setAllowRenameFiles(true);
            $uploader->setFilesDispersion(true);
            /** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
            $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                ->getDirectoryRead(DirectoryList::MEDIA);

            $config = $this->_objectManager->get('MageStore\Multivendor\Model\Vendor');
            $result = $uploader->save($mediaDirectory->getAbsolutePath($config->getBaseTmpMediaPath()));

            $this->_eventManager->dispatch(
                'saveAndContinueEdit',
                ['result' => $result, 'action' => $this]
            );

            unset($result['tmp_name']);
            unset($result['path']);

            $result['url'] = $this->_objectManager->get('MageStore\Multivendor\Model\Vendor')
                ->getTmpMediaUrl($result['file']);
            $data['logo'] = $result['file'];
            \Zend_Debug::dump($data);die;
            $id = $this->getRequest()->getParam('vendor_id');
            if ($id) {
                $model->load($id);
            }

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
            return $resultRedirect->setPath('*/*/edit', ['vendor_id' => $this->getRequest()->getParam('vendor_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}