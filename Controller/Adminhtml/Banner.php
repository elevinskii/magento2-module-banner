<?php
namespace IdealCode\Banner\Controller\Adminhtml;

abstract class Banner extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'IdealCode_Banner::banner';

    /**
     * Init page
     *
     * @param string $title
     * @param string $itemId item menu id
     * @return \Magento\Framework\Controller\ResultInterface
     */
    protected function initPage($title, $itemId)
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_PAGE
        );

        $resultPage->setActiveMenu($itemId);
        $this->_view->getPage()->getConfig()->getTitle()->prepend(_($title));

        return $resultPage;
    }
}
