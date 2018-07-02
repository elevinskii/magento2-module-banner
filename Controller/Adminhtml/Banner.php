<?php
namespace IdealCode\Banner\Controller\Adminhtml;

abstract class Banner extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'IdealCode_Banner::banner';

    /**
     * Init page
     *
     * @param string $title
     * @return \Magento\Framework\Controller\ResultInterface
     */
    protected function initPage($title)
    {
        $resultPage = $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_PAGE
        );

        $resultPage->setActiveMenu('IdealCode_Banner::section');

        $this->_view->getPage()->getConfig()->getTitle()->prepend(_($title));

        return $resultPage;
    }
}
