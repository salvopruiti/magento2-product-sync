<?php

namespace SalvoPruiti\ProductSync\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use SalvoPruiti\ProductSync\Api\Data\ProductSyncCallLogInterface;

class ProductSyncCallLog extends AbstractDb
{
    const TABLE_NAME = 'sp_ps_call_log';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, ProductSyncCallLogInterface::ENTITY_ID);
    }
}
