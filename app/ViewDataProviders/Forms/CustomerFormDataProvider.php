<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders\Forms;

use App\Entities\Category;
use App\Entities\Customer;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Utilities\OctaUI;
use App\ViewDataProviders\FormDataProvider;
use Illuminate\Support\Collection;

/**
 * Class CustomerFormDataProvider
 * @package App\ViewDataProviders\Forms
 *
 * @property CategoryRepository $itemRepository
 * @property Category|null      $dataEntity
 */
class CustomerFormDataProvider extends FormDataProvider
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
        $this->itemRepository = $itemRepository;
        parent::__construct();
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
     * @return $this
     */
    public function readEntityBy(array $criteria = []): CustomerFormDataProvider
    {
        // TODO: Implement readItemBy() method.
        $this->dataEntity = $this->itemRepository->findOneBy($criteria);

        return $this;
    }

    /**
     * @return CustomerFormDataProvider
     */
    private function customizeItem(): self
    {
        $uiHelper = new OctaUI(); //TODO: load with DI

        if($this->dataEntity instanceof Customer && !empty($this->dataEntity->getId())){
            $this->providerItem->put('isNew', false);
            $this->providerItem->put('id', $this->dataEntity->getId());
            $this->providerItem->put('firstName', $this->dataEntity->getFirstName());
            $this->providerItem->put('lastName', $this->dataEntity->getLastName());
            $this->providerItem->put('email', $this->dataEntity->getEmail());

            $this->providerItem->put('mainImagePreviewPath', 'aaa');
        } else {
            $this->providerItem->put('mainImagePreviewPath', $uiHelper->getDefaultImagePath());
        }

        return $this;
    }
}
