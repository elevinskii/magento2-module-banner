<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class MassDisable extends Action
{
    public function execute()
    {
        /** @var \Magento\Framework\Data\Collection\AbstractDb $collection */
        $collection = parent::getFilterCollection();

        /** @var \IdealCode\Banner\Model\Item $item */
        foreach ($collection as $item) {
            $item->setActive(\IdealCode\Banner\Model\Item\Active::STATUS_DISABLED);
            $this->_itemResource->save($item);
        }

        $this->messageManager->addSuccessMessage(
            __('A total of %1 item(s) have been disabled.', $collection->getSize())
        );

        $resultRedirect = $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT
        );

        return $resultRedirect->setPath('*/*/');
    }
}
