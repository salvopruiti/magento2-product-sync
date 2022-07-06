<?php

namespace SalvoPruiti\ProductSync\Block\Adminhtml\Product\Edit\Button;

class SyncProduct extends \Magento\Catalog\Block\Adminhtml\Product\Edit\Button\Generic
{
    public function getButtonData()
    {
        $productId = $this->getProduct()->getId();
        if ($productId)
            return [
                'label' => __('Sync with WMS'),
                'class' => 'action-secondary',
                'on_click' => '',
                'data_attribute' => [
                    'mage-init' => [
                        'SalvoPruiti_ProductSync/js/form/syncbutton-adapter' => [
                            'serviceUrl' => $this->getServiceUrl()
                        ]
                    ]
                ],
                'sort_order' => 10
            ];

    }

    protected function getServiceUrl() : string
    {
        return $this->getUrl('productsync/productsync/log');
    }
}
