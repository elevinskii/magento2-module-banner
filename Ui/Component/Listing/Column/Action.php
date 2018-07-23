<?php
namespace IdealCode\Banner\Ui\Component\Listing\Column;

class Action extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var \Magento\Framework\Model\ResourceModel\Db\AbstractDb
     */
    protected $_resource;

    /**
     * Action column constructor.
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource,
        array $components = [],
        array $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_resource = $resource;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $idFieldName = $this->_resource->getIdFieldName();

            foreach ($dataSource['data']['items'] as &$item) {
                if (isset($item[$idFieldName])) {
                    $item[$this->getName()] = [
                        'edit' => [
                            'href' => $this->context->getUrl(
                                $this->getUrl().'/edit',
                                [
                                    $idFieldName => $item[$idFieldName]
                                ]
                            ),
                            'label' => __('Edit')
                        ],
                        'delete' => [
                            'href' => $this->context->getUrl(
                                $this->getUrl().'/delete',
                                [
                                    $idFieldName => $item[$idFieldName]
                                ]
                            ),
                            'label' => __('Delete'),
                            'confirm' => [
                                'title' => __('Delete'),
                                'message' => __('Are you sure you want to delete a item?')
                            ]
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
