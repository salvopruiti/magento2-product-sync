<?php

namespace SalvoPruiti\ProductSync\Model;

use Magento\Framework\Model\AbstractModel;
use SalvoPruiti\ProductSync\Api\Data\ProductSyncCallLogInterface;

class ProductSyncCallLog extends AbstractModel implements ProductSyncCallLogInterface
{
    protected function _construct()
    {
        $this->_init(\SalvoPruiti\ProductSync\Model\ResourceModel\ProductSyncCallLog::class);
    }

    public function getSku()
    {
        return $this->_getData(self::SKU);
    }

    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

   public function getResponseStatus()
    {
        return $this->_getData(self::RESPONSE_STATUS);
    }

    public function setResponseStatus($responseStatus)
    {
        return $this->setData(self::RESPONSE_STATUS, $responseStatus);
    }

   public function getQuantity()
    {
        return $this->_getData(self::QUANTITY);
    }

    public function setQuantity($quantity)
    {
        return $this->setData(self::QUANTITY, $quantity);
    }

   public function getErrorMessage()
    {
        return $this->_getData(self::ERROR_MESSAGE);
    }

    public function setErrorMessage($errorMessage)
    {
        return $this->setData(self::ERROR_MESSAGE, $errorMessage);
    }

    public function getCreatedAt()
    {
        return $this->_getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    public function getUpdatedAt()
    {
        return $this->_getData(self::UPDATED_AT);
    }

    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
