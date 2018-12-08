<?php
/**
 * Copyright © 2015 Darsh. All rights reserved.
 */

namespace Darsh\Shippingreport\Controller\Adminhtml\Items;

class Index extends \Darsh\Shippingreport\Controller\Adminhtml\Items
{
    /**
     * Items list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {        
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Darsh_Shippingreport::shippingreport');
        $resultPage->getConfig()->getTitle()->prepend(__('PCA Express Report'));        
        return $resultPage;
    }
}
