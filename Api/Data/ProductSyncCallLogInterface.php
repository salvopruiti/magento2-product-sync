<?php

namespace SalvoPruiti\ProductSync\Api\Data;

interface ProductSyncCallLogInterface
{
    const ENTITY_ID = 'entity_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const SKU = 'sku';
    const RESPONSE_STATUS = 'response_status';
    const QUANTITY = 'quantity';
    const ERROR_MESSAGE = 'error_message';

    /**
     * @return int
     */
    public function getEntityId();

    /**
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * @return int
     */
    public function getResponseStatus();

    /**
     * @param int $responseStatus
     * @return $this
     */
    public function setResponseStatus($responseStatus);

    /**
     * @return float|null
     */
    public function getQuantity();

    /**
     * @param float|null $quantity
     * @return $this
     */
    public function setQuantity($quantity);

    /**
     * @return string|null
     */
    public function getErrorMessage();

    /**
     * @param string|null $errorMessage
     * @return $this
     */
    public function setErrorMessage($errorMessage);

    /**
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
}
