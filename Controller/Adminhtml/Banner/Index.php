<?php
namespace IdealCode\Banner\Controller\Adminhtml\Banner;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'IdealCode_Banner::banner';

    /**
     * Load the page adminhtml_banner_index.xml
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $bannerPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        $this->_setActiveMenu('IdealCode_Banner::banner');
        $this->_view->getPage()->getConfig()->getTitle()->prepend(_('Banners'));

        return $bannerPage;
    }
}
