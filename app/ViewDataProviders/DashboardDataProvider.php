<?php
/**
 * @project Octashop admin
 *
 * @copyright Copyright (c) 2021. octatech (https://octatech.nl)
 */

namespace App\ViewDataProviders;

use App\Repositories\CategoryRepository;
use App\Repositories\StatisticRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class DashboardDataProvider
 * @package App\ViewDataProviders
 *
 * @property CategoryRepository   $listRepository
 * @property LengthAwarePaginator $dataPaginator
 * @property Collection           $providerItems
 */
class DashboardDataProvider extends BaseViewDataProvider implements IFormDataProvider
{
    use TEntityDataProvider;

    /**
     * @var CategoryRepository $listRepository
     */
    private $listRepository;

    /**
     * @var LengthAwarePaginator $dataPaginator
     */
    private $dataPaginator;

    /**
     * @var Collection $providerItems
     */
    private $providerItems;

    /**
     * DashboardDataProvider constructor.
     * @param StatisticRepository $listRepository
     */
    public function __construct(StatisticRepository $listRepository)
    {
        $this->listRepository = $listRepository;
        $this->providerItems  = collect([]);

        parent::__construct();
    }

    /**
     * @return null
     */
    public function readEntityBy()
    {
        return null;
    }

    /**
     * @return $this|mixed
     */
    public function prepare()
    {
        return $this;
    }

    /**
     * @return Collection|mixed
     */
    public function generate()
    {
        return collect([]);
    }
}
