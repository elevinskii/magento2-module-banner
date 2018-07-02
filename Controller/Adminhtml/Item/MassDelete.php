<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class MassDelete extends Action
{
    public function execute()
    {
        /** @var \Magento\Framework\Data\Collection\AbstractDb $collection */
        $collection = parent::getFilterCollection();

        $size = $collection->getSize();

        /** @var \IdealCode\Banner\Model\Banner $item */
        foreach ($collection as $item) {
            $this->_bannerResource->delete($item);
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 banner(s) have been delete.', $size)
        );

        $resultRedirect = $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT
        );

        return $resultRedirect->setPath('*/*/');
    }
}
