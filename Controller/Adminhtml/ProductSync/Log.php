<?php

namespace SalvoPruiti\ProductSync\Controller\Adminhtml\ProductSync;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Phrase;
use SalvoPruiti\ProductSync\Model\ProductSyncCallLog;
use SalvoPruiti\ProductSync\Model\ResourceModel\ProductSyncCallLog as ProductSyncCallLogResource;
use SalvoPruiti\ProductSync\Model\ProductSyncCallLogFactory;

class Log extends \Magento\Framework\App\Action\Action implements HttpGetActionInterface
{
    protected $jsonFactory;
    protected $logFactory;
    protected $logResource;

    public function __construct(Context $context, JsonFactory $jsonFactory, ProductSyncCallLogFactory $logFactory, ProductSyncCallLogResource $logResource)
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->logFactory = $logFactory;
        $this->logResource = $logResource;
    }

    public function execute()
    {
        try {
            $sku = $this->getRequest()->getParam('sku');

            $response = $this->getAvailableQty($sku);

            /** @var ProductSyncCallLog $model */
            $model = $this->logFactory->create($response);
            $model->setData($response);

            $this->logResource->save($model);

        } catch (\Exception|LocalizedException $e) {

            $response = [
                'sku' => $sku,
                'response_status' => 500,
                'error_message' => $e->getMessage(),
                'quantity' => 0
            ];

        }

        $resultJson = $this->jsonFactory->create();
        return $resultJson->setData($response);
    }

    protected function getAvailableQty(string $sku)
    {
        $status = [200, 200, 404, 500, 200, 200, 200, 200, 500, 500][random_int(0, 9)];
        $messages = [
            200 => null,
            404 => __('Product not found (404)'),
            500 => __('Remote Server Error (500)')
        ];

        $response = [
            'sku' => $sku,
            'response_status' => $status,
            'error_message' => $messages[$status],
            'quantity'=> $status === 200 ? random_int(0, 100) : 0
        ];

        return $response;
    }
}
