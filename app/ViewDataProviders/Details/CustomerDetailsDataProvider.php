<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders\Details;

use App\Entities\Customer;
use App\Repositories\CustomerRepository;
use App\Utilities\OctaUI;
use App\ViewDataProviders\DetailsDataProvider;
use Illuminate\Support\Collection;

/**
 * Class CustomerDetailsDataProvider
 * @package App\ViewDataProviders\Details
 */
class CustomerDetailsDataProvider extends DetailsDataProvider
{
    /**
     * @var CustomerRepository $itemRepository
     */
    private $itemRepository;

    /**
     * @var Customer|null $dataEntity
     */
    protected $dataEntity;

    /**
     * CustomerFormDataProvider constructor.
     * @param CustomerRepository $itemRepository
     */
    public function __construct(CustomerRepository $itemRepository)
    {
        parent::__construct();
        $this->itemRepository = $itemRepository;
    }

    /**
     * @return $this
     */
    public function prepare(?int $id = null): self
    {
        $this
            ->readEntityBy(['id' => $id])
            ->customizeItem();

        return $this;
    }

    /**
     * @return Collection
     */
    public function generate(): Collection
    {
        return $this->providerItem;
    }

    /**
     * @param array $criteria
     * @return CustomerDetailsDataProvider
     */
    public function readEntityBy(array $criteria = []): CustomerDetailsDataProvider
    {
        // TODO: Implement readItemBy() method.
        $this->dataEntity = $this->itemRepository->findOneBy($criteria);

        return $this;
    }

    /**
     * @return CustomerDetailsDataProvider
     */
    private function customizeItem(): self
    {
        $uiHelper = new OctaUI(); //TODO: load with DI

        $this->providerItem->put('ordersCollection', collect([]));
        $this->providerItem->put('commentsCollection', collect([]));

        if($this->dataEntity instanceof Customer && !empty($this->dataEntity->getId())){
            $this->providerItem->put('isNew', false);
            $this->providerItem->put('id', $this->dataEntity->getId());
            $this->providerItem->put('fullName', $this->dataEntity->getFirstName() . ' ' . $this->dataEntity->getLastName()); //TODO: how bout insertion
            $this->providerItem->put('email', $this->dataEntity->getEmail());
            $this->providerItem->put('ageFormatted', '-');
            $this->providerItem->put('isBlockedFormatted', '-');
            $this->providerItem->put('registeredAtFormatted', $this->dataEntity->getCreatedAtFormatted());
            $this->providerItem->put('fullAddress', 'todo'); //TODO: maybe as a relation

            $this->providerItem->put('mainImagePreviewPath', $uiHelper->getDefaultImagePath());
        } else {
            $this->providerItem->put('mainImagePreviewPath', $uiHelper->getDefaultImagePath());
        }

        return $this;
    }
}
