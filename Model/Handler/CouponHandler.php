<?php

namespace Springbot\Main\Model\Handler;

use Magento\Sales\Model\Order as MagentoOrder;
use Springbot\Main\Model\Handler;
use Magento\Framework\App\ObjectManager;
use Magento\Catalog\Model\Category as MagentoCategory;

/**
 * Class CouponHandler
 * @package Springbot\Main\Model\Handler
 */
class CouponHandler extends Handler
{
    const API_PATH = 'coupons';

    /**
     * @param int $storeId
     * @param int $couponId
     */
    public function handle($storeId, $couponId)
    {
        $this->api->postEntities($storeId, self::API_PATH, ['id' => $couponId]);
    }

    /**
     * @param int $storeId
     * @param int $categoryId
     */
    public function handleDelete($storeId, $categoryId)
    {
        $this->api->deleteEntity($storeId, self::API_PATH, ['id' => $categoryId]);
    }
}