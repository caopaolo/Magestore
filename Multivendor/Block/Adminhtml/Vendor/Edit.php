<?php
namespace Magestore\Multivendor\Block\Adminhtml\Vendor;


/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 08/01/2017
 * Time: 09:29
 */
class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Magestore_Multivendor';
        $this->_controller = 'adminhtml_vendor';
        parent::_construct();
        $this->buttonList->update('save', 'label', __('Save'));
        $this->buttonList->update('delete', 'label', __('Delete'));
        $this->buttonList->add(
            'saveandcontinue',
            array(
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => array(
                    'mage-init' => array('button' => array('event' => 'saveAndContinueEdit', 'target' => '#edit_form'))
                )
            ),
            -100
        );
    }


}