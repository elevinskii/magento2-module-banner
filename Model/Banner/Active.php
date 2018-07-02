<?php
namespace IdealCode\Banner\Model\Banner;

class Active extends \Magento\Framework\DataObject implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Banner's statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * Active column
     */
    const COLUMN = 'active';

    public function toOptionArray()
    {
        $options = [];

        $arStatuses = [
            self::STATUS_ENABLED => __('Enabled'),
            self::STATUS_DISABLED => __('Disabled')
        ];

        foreach ($arStatuses as $key => $value) {
            $options[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $options;
    }
}
