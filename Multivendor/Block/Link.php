<?php
/**
 * Created by PhpStorm.
 * User: anhnc
 * Date: 12/01/2017
 * Time: 08:19
 */

namespace Magestore\Multivendor\Block;


class Link extends \Magento\Framework\View\Element\Html\Link
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getHref()
    {
        return $this->_storeManager->getStore()->getUrl('multivendor/vendor/index');
    }
}