<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class MassDisable extends Action
{
    public function execute()
    {
        /** @var \Magento\Framework\Data\Collection\AbstractDb $collection */
        $collection = parent::getFilterCollection();

        /** @var \IdealCode\Banner\Model\Banner $item */
        foreach ($collection as $item) {
            $item->setActive(\IdealCode\Banner\Model\Banner\Active::STATUS_DISABLED);
            $this->_bannerResource->save($item);
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 banner(s) have been disabled.', $collection->getSize())
        );

        $resultRedirect = $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT
        );

        return $resultRedirect->setPath('*/*/');
    }
}
