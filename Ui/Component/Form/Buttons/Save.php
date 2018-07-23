<?php
namespace IdealCode\Banner\Ui\Component\Form\Buttons;

class Save extends GenericButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Banner'),
            'class' => 'primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 50
        ];
    }
}
