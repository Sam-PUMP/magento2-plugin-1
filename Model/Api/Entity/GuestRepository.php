<?php

namespace Springbot\Main\Model\Api\Entity;

use Magento\Framework\Model\AbstractModel;
use Springbot\Main\Api\Entity\GuestRepositoryInterface;
use Magento\Framework\App\Request\Http as HttpRequest;

/**
 *  GuestRepository
 * @package Springbot\Main\Api
 */
class GuestRepository extends AbstractRepository implements GuestRepositoryInterface
{

    public function getList($storeId)
    {
        $guest = $this->getSpringbotModel();
        $collection = $guest->getCollection();
        $collection->addFieldToFilter('store_id', $storeId);
        $collection->addFieldToFilter($guest::CUSTOMER_IS_GUEST, true);
        $this->filterResults($collection);
        $guests = [];
        foreach ($collection as $guest) {
            $guests[] = $this->getSpringbotModel()->setData($guest->getData());
        }
        return $guests;
    }

    public function getFromId($storeId, $guestId)
    {
        return $this->getSpringbotModel()->load($guestId);
    }

    /**
     * @return \Springbot\Main\Model\Api\Entity\Data\Guest
     */
    public function getSpringbotModel()
    {
        return $this->objectManager->create('Springbot\Main\Model\Api\Entity\Data\Guest');;
    }
}