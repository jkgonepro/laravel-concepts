<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders\Lists;

use App\Entities\BaseEntity;
use App\Entities\Customer;
use App\Repositories\BaseEntityRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CustomerRepository;
use App\Utilities\OctaUI;
use App\ViewDataProviders\IListDataProvider;
use Doctrine\Common\Collections\Criteria;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class CustomerListDataProvider
 * @package App\Mediators\Lists
 *
 * @property CategoryRepository   $listRepository
 * @property LengthAwarePaginator $dataPaginator
 * @property Collection           $providerItems
 */
class CustomerListDataProvider extends BaseListDataProvider
{
    /**
     * CustomerListDataProvider constructor.
     * @param CustomerRepository $listRepository
     */
    public function __construct(CustomerRepository $listRepository)
    {
        $this->listRepository = $listRepository;
        $this->providerItems  = collect([]);

        parent::__construct($listRepository);
    }

    /**
     * @return $this
     */
    public function prepare(int $limit = 8, int $page = 1): self
    {
        $this
            ->readItems($limit, $page)
            ->customizeItems();

        return $this;
    }

    /**
     * @return Collection
     */
    public function generate(): Collection
    {
        return $this->providerItems;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginator(): LengthAwarePaginator
    {
        return $this->dataPaginator;
    }

    /**
     * @param int $limit
     * @param int $page
     * @return IListDataProvider
     */
    private function readItems(int $limit = 8, int $page = 1): IListDataProvider
    {
        $criteria = Criteria::create();
        $criteria->andWhere(
            Criteria::expr()->eq('x.active', BaseEntityRepository::ACTIVE_FLAG)
        ); //TODO

        $this->dataPaginator = $this->listRepository->all($limit, $page);
        $items               = collect($this->dataPaginator->items());
        $this->providerItems = $items->map(function(BaseEntity $item){
            return collect($item->getAttributes());
        });

        return $this;
    }

    /**
     * @return IListDataProvider
     */
    public function customizeItems(): IListDataProvider
    {
        // each $this->>dataProvider
        $uiHelper            = new OctaUI();
        $viewItemsCollection = $this->dataPaginator->map(function(Customer $customer) use ($uiHelper){
            return collect([
                'id'              => $customer->getId(),
                'fullName'        => $customer->getFirstName() . " " . $customer->getLastName(), //TODO: how bout insertion
                'email'           => $customer->getEmail(),
                'city'            => $customer->getAddressCity(),
                'registeredAt'    => $customer->getCreatedAtFormatted(),
                'htmlActiveBadge' => 'aaaa',
            ]);
        });

        $this->providerItems = $viewItemsCollection;

        return $this;
    }
}
